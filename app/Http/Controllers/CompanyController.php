<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


use App\User;
Use App\Companies;
class CompanyController extends Controller{
     /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /*
    * @return compny list view
    *
    */
    public function listCompanies(){
       $Companies=Companies::paginate(5);
       return view('company.list',compact('Companies'));
    }
     /*
     * @return create new company view
     *
     */
     public function createCompany(){
        return view('company.create');
     }
     /*
     * @param Request $request
     * @return void
     *
     */
     public function storeCompany(Request $request){
          $validator = Validator::make($request->all(),[
                           'txtCompanyName' => 'required|max:255',
                           'txtComapanyEmail' => 'required|email',
                           'txtComapanyWebsite' => 'required',
                           'fileCompanyLogo' =>'required|file|mimes:jpeg,bmp,png|dimensions:max_width=100,max_height=100'
                       ]);
          if ($validator->fails()) {
            return redirect()->route('company.create')
                        ->withErrors($validator)
                        ->withInput();
          }else{
              $ext=explode(".",$request->fileCompanyLogo->getClientOriginalName());
              $url=$request->fileCompanyLogo->storeAs('company/logos',time().".".$ext[1]);
              $companies=new Companies();
              $companies->name=$request->txtCompanyName;
              $companies->email=$request->txtComapanyEmail;
              $companies->website=$request->txtComapanyWebsite;
              $companies->logo=$url;
              $companies->save();
              return redirect()->route('company.list');
         }

     }

     /*
     * @return edit company view
     *
     */
     public function editCompany($id){
        $id=$id."==";
        $companyId=base64_decode(trim($id));
        $company=Companies::where('id','=',$companyId)->get()->first();

        if(empty($company)){
           abort(404);
        }
        return view('company.edit',compact('company'));
     }
     /*
     * @param Request $request
     * @return void
     *
     */
     public function updateCompany(Request $request){
          $validator = Validator::make($request->all(),[
                           'txtCompanyName' => 'required|max:255',
                           'txtComapanyEmail' => 'required|email',
                           'txtComapanyWebsite' => 'required',
                           'fileCompanyLogo' =>'file|mimes:jpeg,bmp,png|dimensions:max_width=100,max_height=100'
                       ]);
          if ($validator->fails()) {
            return redirect()->route('company.edit',array('id'=>trim($request->txtHiddenCompanyId)))
                        ->withErrors($validator)
                        ->withInput();
          }else{
              try{
                  $id=trim($request->txtHiddenCompanyId);
                  $id=$id."==";
                  $companyId=base64_decode(trim($id));
                  $company=Companies::where('id','=',$companyId)->get()->first();
                  if(empty($company)){
                     abort(404);
                  }
                  $company->name=$request->txtCompanyName;
                  $company->email=$request->txtComapanyEmail;
                  $company->website=$request->txtComapanyWebsite;
                  if(isset($request->fileCompanyLogo)){
                      $ext=explode(".",$request->fileCompanyLogo->getClientOriginalName());
                      $url=$request->fileCompanyLogo->storeAs('company/logos',time().".".$ext[1]);
                      $company->logo=$url;
                  }
                  $company->save();
                  return redirect()->route('company.list')->with('success_message', "company  updated successfully.");
             }catch(\Illuminate\Database\QueryException $ex){
                  abort(404);
             }
         }

     }
     /*
     * @param $id
     * @return void
     *
     */
     public function deleteCompany($id){
         try{
             $id=trim($id);
             $id=$id."==";
             $companyId=base64_decode(trim($id));
             $company=Companies::where('id','=',$companyId)->get()->first();
             if(empty($company)){
                abort(404);
             }
             $company->delete();
             return redirect()->route('company.list')->with('success_message', "company  deleted successfully.");
        }catch(\Illuminate\Database\QueryException $ex){
             abort(404);
        }
     }

}
