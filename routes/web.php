<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

Route::get('/', function () {
    return view('welcome');
});


Route::view('superAdminLogin','super-admin-login');

Route::post('superform',[MyController::class,'superlogin']);

Route::get('super-dashboard',[MyController::class,'dashboard_s']);

Route::get('super-profile',[MyController::class,'profile_s']);

Route::get('super-edit',[MyController::class,'super_profile_edit']);

Route::post('superadminprofileeditform',[MyController::class,'super_admin_profile_update']);

Route::view('superProfileChangepassword','super-profile-changepassword');

Route::put('superadminprofilechangepasswordform/{id}',[MyController::class,'super_admin_profile_changepassword']);

Route::get('superAdminLogout',[MyController::class,'superLogout']);

/////////////admin

Route::get('adminList',[MyController::class,'admin_list']);

Route::view('addAdmin','add-admin');

Route::post('addadminform',[MyController::class,'add_new_admin']);

Route::get('editAdmin/{id}',[MyController::class,'edit_new_admin']);

Route::put('admin-update/{id}',[MyController::class,'adminUpadate']);

Route::get('deleteAdmin/{id}',[MyController::class,'adminDelete']);

///////////////employee

Route::get('employeeList',[MyController::class,'employee_list']);

Route::view('addEmployee','add-employee');

Route::post('addemployeeform',[MyController::class,'add_new_employee']);

Route::get('editEmployee/{id}',[MyController::class,'edit_new_employee']);

Route::put('employee-update/{id}',[MyController::class,'employeeUpadate']);

Route::get('deleteEmployee/{id}',[MyController::class,'employeeDelete']);

Route::view('ok','welcome');

///////////////////////Super admin work finished///////////////////////


////////////////////////Admin work start//////////////////////////////////////////////////

Route::view('adminLogin','admin-login');

Route::post('adminform',[MyController::class,'adminlogin']);

Route::get('admin-profile',[MyController::class,'profile_a']);

Route::get('admin-edit',[MyController::class,'admin_profile_edit']);

Route::post('adminprofileeditform',[MyController::class,'admin_profile_update']);


Route::view('adminProfileChangepassword','admin-profile-changepassword');

Route::put('adminprofilechangepasswordform/{id}',[MyController::class,'admin_profile_changepassword']);


Route::get('adminLogout',[MyController::class,'adminLogout']);

///////////super admin

Route::get('superList',[MyController::class,'super_list']);


////////////////////////Admin work finished//////////////////////////////////////////////////////////////////


////////////////////////Employee Word Start///////////////////////////////////////////////////////////////////

Route::view('employeeLogin','employee-login');

Route::post('employeeform',[MyController::class,'employeelogin']);



Route::get('employee-profile',[MyController::class,'profile_e']);



Route::get('employee-edit',[MyController::class,'employee_profile_edit']);

Route::post('employeeprofileeditform',[MyController::class,'employee_profile_update']);



Route::view('employeeProfileChangepassword','employee-profile-changepassword');
Route::put('employeeprofilechangepasswordform/{id}',[MyController::class,'employee_profile_changepassword']);

Route::get('employeeLogout',[MyController::class,'employeeLogout']);

////////////////////////Employee Word finished/////////////////////////////////////////////////////////////////