<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('log');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/companies', 'CompanyController@listCompanies')->name('company.list');

Auth::routes();

Route::get('/companies/create', 'CompanyController@createCompany')->name('company.create');
Auth::routes();

Route::post('/companies/store', 'CompanyController@storeCompany')->name('company.store');

Auth::routes();
Route::get('/companies/edit/{id}', 'CompanyController@editCompany')->where(['id' => '[A-Za-z0-9]+'])->name('company.edit');

Auth::routes();
Route::post('/companies/update', 'CompanyController@updateCompany')->name('company.update');

Auth::routes();
Route::get('/companies/delete/{id}', 'CompanyController@deleteCompany')->where(['id' => '[A-Za-z0-9]+'])->name('company.delete');



//Employee Routes
Auth::routes();

Route::get('/employee', 'EmployeeController@listEmployee')->name('employee.list');

Auth::routes();

Route::get('/employee/create', 'EmployeeController@createEmployee')->name('employee.create');
Auth::routes();

Route::post('/employee/store', 'EmployeeController@storeEmployee')->name('employee.store');
Auth::routes();
Route::get('/employee/edit/{id}', 'EmployeeController@editEmployee')->where(['id' => '[A-Za-z0-9]+'])->name('employee.edit');

Auth::routes();
Route::post('/employee/update', 'EmployeeController@updateEmployee')->name('employee.update');

Auth::routes();
Route::get('/employee/delete/{id}', 'EmployeeController@deleteEmployee')->where(['id' => '[A-Za-z0-9]+'])->name('employee.delete');
