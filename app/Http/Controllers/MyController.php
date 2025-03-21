<?php

namespace App\Http\Controllers;

use App\Models\Super;

use App\Models\Admin;

use App\Models\Employee;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class MyController extends Controller
{
    //

    /* function superlogin(Request $request){
        $sa = Super::where('email',$request->email)->first();

        if($sa){

            if($sa->password == $request->password){

                // $request->session()->put('super',$request->input('id'));
                $request->session()->put('super',$sa->id);

                return view('super-admin-dashboard',['data'=>$sa]);
     
             
             }
             else{
                $request->session()->flash('password-wrong','Password incorrect');
                 return redirect('superAdminLogin');
             }
        }
        else{
                 $request->session()->flash('email-wrong','Email Id incorrect');
                 return redirect('superAdminLogin');
        }
        
    } */


    function superlogin(Request $request){
        $sa = Super::where('email',$request->email)->first();

        if($sa){

            if($sa->password == $request->password){

                // $request->session()->put('super',$request->input('id'));
                $request->session()->put('super',$sa->id);

                $admin = Admin::all();

                $employee = Employee::all();

                return view('super-admin-dashboard',['data'=>$sa,'admins'=>$admin,'employees'=>$employee]);
     
             
             }
             else{
                $request->session()->flash('password-wrong','Password incorrect');
                 return redirect('superAdminLogin');
             }
        }
        else{
                 $request->session()->flash('email-wrong','Email Id incorrect');
                 return redirect('superAdminLogin');
        }
        
    }





    /* function dashboard_s(){
       $s = Super::where('id',session('super')) ->first();

       return view('super-admin-dashboard',['data'=>$s]);
    } */

    function dashboard_s(){
        $s = Super::where('id',session('super')) ->first();

        
        $admin = Admin::all();

        $employee = Employee::all();
        
 
        return view('super-admin-dashboard',['data'=>$s,'admins'=>$admin,'employees'=>$employee]);
     }


    function profile_s(){
        $p = Super::where('id',session('super')) ->first();

       return view('super-admin-profile',['data'=>$p]);
    }

    function super_profile_edit(){
        $q = Super::where('id',session('super')) ->first();
        return view('super-profile-edit',['data'=>$q]);
    }

    function super_admin_profile_update(Request $request){

        $super = Super::find(session('super'));

        $super->name = $request->name;
        $super->email = $request->email;
        $super->phone = $request->phone;
        $super->position = $request->position;

        if($super->save()){
            $request->session()->flash('successMsg','Data updated successfully');
            return redirect('super-profile');
        }
        else{
            $request->session()->flash('errorMsg','Data not update due to some reason');
            return redirect('super-profile');

        }
        
    }

    function super_admin_profile_changepassword(Request $request, $id){
            $super = Super::find($id);
                
            if($super->password == $request->password){
                if($request->newpassword == $request->retypepassword){
                    $super->password = $request->newpassword;

                    if($super->save()){
                        $request->session()->flash('changedMsg','Password Changed Successfully');
                        return redirect('super-profile');
                    }
                    else{
                        $request->session()->flash('noChangeMsg','Password not Changed Due to some reason');
                        return redirect('super-profile');
    
                    }
                    
                }
                else{
                    $request->session()->flash('missMatchMsg','Password Miss Match');
                    return redirect('superProfileChangepassword');

                }
                    

            }
            else{
                 $request->session()->flash('incorrectMsg','Incorrect Password');
                 return redirect('superProfileChangepassword');
            }
    }


    function superLogout(){

        session()->pull('super');
        return redirect('/');
    }
    //////// admin

    /* function admin_list(){
        $super = Super::find(session('super'));

        $admin = Admin::all();
        return view('list-admin',['data'=>$super,'admins'=>$admin]);
    } */

    function admin_list(){

        if(session('super')){
            $da = Super::find(session('super'));
        }
        if(session('employee')){
            $da = Employee::find(session('employee'));
        }
        

        $admin = Admin::all();
        return view('list-admin',['data'=>$da,'admins'=>$admin]);
    }

    function add_new_admin(Request $request){

        $admin = new Admin();

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->phone = $request->phone;
        $admin->position = $request->position;

        $admin->save();

        if($admin){
            $request->session()->flash('addedAdminMsg','New Admin Added Successfully');
            return redirect('adminList');
        }
        else{
            $request->session()->flash('faildAdminMsg','New Admin Not Added Due To Some Reason Successfully');
            return redirect('adminList');
        }
    }

    function edit_new_admin($id){

        $admin = Admin::find($id);


        return view('edit-new-admin',['data'=>$admin]);

    }

    function adminUpadate(Request $request, $id){
        $admin = Admin::find($id);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->position = $request->position;



                if($admin->save()){
                    $request->session()->flash('editedAdminMsg','Admin Data Edited Successfully');
                    return redirect('adminList');
                }
                else{
                    $request->session()->flash('noteditAdminMsg','Admin Data Not Edite Due To Some Reasion');
                    return redirect('adminList');
                }

            
    }


    function adminDelete(Request $request, $id){

        $isDeleted = Admin::destroy($id);
        
        if($isDeleted){
            $request->session()->flash('deletedAdminMsg','Admin Deleted Successfully');
            return redirect('adminList');
        }
        else{
            $request->session()->flash('notDeleteAdminMsg','Admin Not Delete Due To Some Reasion');
            return redirect('adminList');
        }
    }

    ///// employee

    /* function employee_list(){
        $super = Super::find(session('super'));

        $employee = Employee::all();
        return view('list-employee',['data'=>$super,'employees'=>$employee]);
    }  */

    function employee_list(){
        if(session('super')){
          $da = Super::find(session('super'));
        }
        if(session('admin')){

            $da = Admin::find(session('admin'));

        }
        if(session('employee')){

            $da = Employee::find(session('employee'));

        }

        $employee = Employee::all();
        return view('list-employee',['data'=>$da,'employees'=>$employee]);
    } 

    

    function add_new_employee(Request $request){

        $employee = new Employee();

        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->password = $request->password;
        $employee->phone = $request->phone;
        $employee->position = $request->position;

        $employee->save();

        if($employee){
            $request->session()->flash('addedEmployeeMsg','New Employee Added Successfully');
            return redirect('employeeList');
        }
        else{
            $request->session()->flash('faildAEmployeeMsg','New Employee Not Added Due To Some Reason Successfully');
            return redirect('employeeList');
        }
    }

    function edit_new_employee($id){

        $employee = Employee::find($id);

        return view('edit-new-employee',['data'=>$employee]);
    }
    

    function employeeUpadate(Request $request, $id){
        $employee = Employee::find($id);

        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->position = $request->position;

        if($employee->save()){
            $request->session()->flash('editedEmployeeMsg','Employee Data Edited Successfully');
            return redirect('employeeList');
        }
        else{
            $request->session()->flash('notEditEmployeeMsg','Employee Data Not Edite Due To Some Reasion');
            return redirect('employeeList');
        }
    }


    function employeeDelete(Request $request, $id){

        $isDeleted = Employee::destroy($id);
        
        if($isDeleted){
            $request->session()->flash('deletedEmployeenMsg','Employee Deleted Successfully');
            return redirect('employeeList');
        }
        else{
            $request->session()->flash('notDeleteEmployeeMsg','Employee Not Delete Due To Some Reasion');
            return redirect('employeeList');
        }
    }


    
///////////////////////Super admin work finished///////////////////////


////////////////////////Admin work start//////////////////////////////////////////////////

function adminlogin(Request $request){
    $sa = Admin::where('email',$request->email)->first();

    if($sa){

        if($sa->password == $request->password){

            // $request->session()->put('super',$request->input('id'));
            $request->session()->put('admin',$sa->id);

            return view('admin-profile',['data'=>$sa]);
 
         
         }
         else{
            $request->session()->flash('password-wrong','Password incorrect');
             return redirect('adminLogin');
         }
    }
    else{
             $request->session()->flash('email-wrong','Email Id incorrect');
             return redirect('adminLogin');
    }
    
}


function profile_a(){
    $p = Admin::where('id',session('admin')) ->first();

   return view('admin-profile',['data'=>$p]);
}

function admin_profile_edit(){
    $q = Admin::where('id',session('admin')) ->first();
    return view('admin-profile-edit',['data'=>$q]);
}


function admin_profile_update(Request $request){

    $admin = Admin::find(session('admin'));

    $admin->name = $request->name;
    $admin->email = $request->email;
    $admin->phone = $request->phone;
    $admin->position = $request->position;

    if($admin->save()){
        $request->session()->flash('successMsg','Data updated successfully');
        return redirect('admin-profile');
    }
    else{
        $request->session()->flash('errorMsg','Data not update due to some reason');
        return redirect('admin-profile');

    }
    
}



function admin_profile_changepassword(Request $request, $id){
    $admin = Admin::find($id);
        
    if($admin->password == $request->password){
        if($request->newpassword == $request->retypepassword){
            $admin->password = $request->newpassword;

            if($admin->save()){
                $request->session()->flash('changedMsg','Password Changed Successfully');
                return redirect('admin-profile');
            }
            else{
                $request->session()->flash('noChangeMsg','Password not Changed Due to some reason');
                return redirect('admin-profile');

            }
            
        }
        else{
            $request->session()->flash('missMatchMsg','Password Miss Match');
            return redirect('adminProfileChangepassword');

        }
            

    }
    else{
         $request->session()->flash('incorrectMsg','Incorrect Password');
         return redirect('adminProfileChangepassword');
    }
}

function adminLogout(){

    session()->pull('admin');
    return redirect('/');
}

///////// super admin

function super_list(){
    $admin = Admin::find(session('admin'));

    $super = Super::all();
    return view('list-super',['data'=>$admin,'supers'=>$super]);
}


////////////////////////Admin work finished//////////////////////////////////////////////////////////////////


////////////////////////Employee work start/////////////////////////////////////////////////////////////////



function employeelogin(Request $request){
    $sa = Employee::where('email',$request->email)->first();

    if($sa){

        if($sa->password == $request->password){

            // $request->session()->put('employee',$request->input('id'));
            $request->session()->put('employee',$sa->id);

            return view('employee-profile',['data'=>$sa]);
 
         
         }
         else{
            $request->session()->flash('password-wrong','Password incorrect');
             return redirect('employeeLogin');
         }
    }
    else{
             $request->session()->flash('email-wrong','Email Id incorrect');
             return redirect('employeeLogin');
    }
    
}

function profile_e(){
    $p = Employee::where('id',session('employee')) ->first();

   return view('employee-profile',['data'=>$p]);
}


function employee_profile_edit(){
    $q = Employee::where('id',session('employee')) ->first();
    return view('employee-profile-edit',['data'=>$q]);
}


function employee_profile_update(Request $request){

    $employee = Employee::find(session('employee'));

    $employee->name = $request->name;
    $employee->email = $request->email;
    $employee->phone = $request->phone;
    $employee->position = $request->position;

    if($employee->save()){
        $request->session()->flash('successMsg','Data updated successfully');
        return redirect('employee-profile');
    }
    else{
        $request->session()->flash('errorMsg','Data not update due to some reason');
        return redirect('employee-profile');

    }
    
}


function employee_profile_changepassword(Request $request, $id){
    $employee = Employee::find($id);
        
    if($employee->password == $request->password){
        if($request->newpassword == $request->retypepassword){
            $employee->password = $request->newpassword;

            if($employee->save()){
                $request->session()->flash('changedMsg','Password Changed Successfully');
                return redirect('employee-profile');
            }
            else{
                $request->session()->flash('noChangeMsg','Password not Changed Due to some reason');
                return redirect('employee-profile');

            }
            
        }
        else{
            $request->session()->flash('missMatchMsg','Password Miss Match');
            return redirect('employeeProfileChangepassword');

        }
            

    }
    else{
         $request->session()->flash('incorrectMsg','Incorrect Password');
         return redirect('employeeProfileChangepassword');
    }
}


function employeeLogout(){

    session()->pull('employee');
    return redirect('/');
}

////////////////////////Employee work finished/////////////////////////////////////////////////////////////////

}
 