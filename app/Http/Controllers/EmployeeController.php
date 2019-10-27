<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;



use App\User;
Use App\Employee;
Use App\Companies;
class EmployeeController extends Controller{
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
    * @return list employee view
    *
    */
    public function listEmployee(){
       $Employee=Employee::paginate(5);
       return view('employee.list',compact('Employee'));
    }
     /*
     * @return create new employee view
     *
     */
     public function createEmployee(){
        $Companies=Companies::all();
        return view('employee.create',compact('Companies'));
     }
     /*
     * @param Request $request
     * @return void
     *
     */
     public function storeEmployee(Request $request){
          $validator = Validator::make($request->all(),[
                           'txtEmployeeFirstName' => 'required|max:255',
                           'txtEmployeeLastName' => 'required',
                           'txtEmployeeEmail' => 'required',
                           'txtEmployeePhone' => 'required',
                           'selEmployeeCompany' => 'required',
                       ]);
          if ($validator->fails()) {
            return redirect()->route('employee.create')
                        ->withErrors($validator)
                        ->withInput();
          }else{
              $employee=new Employee();
              $employee->company_id=$request->selEmployeeCompany;
              $employee->first_name=$request->txtEmployeeFirstName;
              $employee->last_name=$request->txtEmployeeLastName;
              $employee->email=$request->txtEmployeeEmail;
              $employee->phone=$request->txtEmployeePhone;
              $employee->save();
              return redirect()->route('employee.list');
         }

     }

     /*
     * @param $id
     * @return edit employee view
     *
     */
     public function editEmployee($id){

        $id=$id."==";
        $employeeId=base64_decode(trim($id));
        $employee=Employee::where('id','=',$employeeId)->get()->first();

        if(empty($employee)){
           abort(404);
        }
        $Companies=Companies::all();
        return view('employee.edit',compact('employee','Companies'));
     }
     /*
     * @param Request $request
     * @return void
     *
     */
     public function updateEmployee(Request $request){
          $validator = Validator::make($request->all(),[
                           'txtEmployeeFirstName' => 'required|max:255',
                           'txtEmployeeLastName' => 'required',
                           'txtEmployeeEmail' => 'required',
                           'txtEmployeePhone' => 'required',
                           'selEmployeeCompany' => 'required',
                       ]);
          if ($validator->fails()) {
            return redirect()->route('employee.create')
                        ->withErrors($validator)
                        ->withInput();
          }else{
            try{
                $id=trim($request->txtHiddenEmployeeId);
                $id=$id."==";
                $employeeId=base64_decode(trim($id));
                $employee=Employee::where('id','=',$employeeId)->get()->first();
                if(empty($employee)){
                   abort(404);
                }
                $employee->company_id=$request->selEmployeeCompany;
                $employee->first_name=$request->txtEmployeeFirstName;
                $employee->last_name=$request->txtEmployeeLastName;
                $employee->email=$request->txtEmployeeEmail;
                $employee->phone=$request->txtEmployeePhone;
                $employee->save();
                return redirect()->route('employee.list')->with('success_message', "employee  updated successfully.");;
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
     public function deleteEmployee($id){
         try{
             $id=trim($id);
             $id=$id."==";
             $employeeId=base64_decode(trim($id));
             $employee=Employee::where('id','=',$employeeId)->get()->first();
             if(empty($employee)){
                abort(404);
             }
             $employee->delete();
             return redirect()->route('employee.list')->with('success_message', "employee  deleted successfully.");
        }catch(\Illuminate\Database\QueryException $ex){
             abort(404);
        }
     }
}
