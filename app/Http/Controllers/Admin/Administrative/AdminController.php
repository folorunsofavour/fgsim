<?php

namespace App\Http\Controllers\Admin\Administrative;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Admin;
use App\Role;
use App\PermissionRole;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function index() { 
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 17)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission
        
        $admins = Admin::with(['role',])->get();
        $roles = Role::where('status', true)->get();
        return view('admin.user.admin_index', compact('admins', 'roles'));
    }
    
    public function storeAdministrative(Request $request){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 18)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission
        // $log_admin = Auth::guard('admin')->user();

        $this->validate($request, [
            "firstname"  => "required",
            "lastname"  => "required",
            "email"  => "required",
            "role"  => "required",
            "gender"  => "required",
            "phone_no"  => "required",
        ]);
  
        $hash_password = bcrypt('password');

        $admin = new Admin;
  
        $admin->firstname = $request->firstname;
        $admin->lastname = $request->lastname;
        $admin->othername = $request->othername;
        $admin->email = $request->email;
        $admin->role_id = $request->role;
        $admin->gender = $request->gender;
        $admin->phone_no = $request->phone_no;
        // $admin->reg_by_id = $log_admin->id;
        $admin->password = $hash_password;
  
        if($admin->save() == true){
          Session::flash('success', 'Admin has been added successfully');
        }else{
          Session::flash('error', 'Could not add Admin');
        }
        return redirect(route('admin.administrative'));
    }

    public function editAdministrative($id){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 18)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $admin = Admin::find($id);
        $roles = Role::all();
        return view('admin.user.admin_edit', compact('admin', 'roles'));
    }

    public function updateAdministrative(Request $request){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 18)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $this->validate($request, [
            "firstname"  => "required",
            "lastname"  => "required",
            "email"  => "required",
            "gender"  => "required",
            "role"  => "required",
            "phone_no"  => "required",
        ]);

        $log_admin = Auth::guard('admin')->user();

        $adminId = $request->admin_id;

        $admin = Admin::find($adminId);

        $admin->firstname = $request->firstname;
        $admin->lastname = $request->lastname;
        $admin->othername = $request->othername;
        $admin->email = $request->email;
        $admin->role_id = $request->role;
        $admin->gender = $request->gender;
        $admin->phone_no = $request->phone_no;
        $admin->reg_by_id = $log_admin->id;

        if ($admin->update() == true) {
            Session::flash('success', 'Admin Updated Successfully');
        }else{
            Session::flash('failed', 'Error while Updating Admin');
        }
        return redirect(route('admin.administrative'));
    }

    public function administrativeStatus($id) {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 18)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $adminID = Admin::find($id);

        if ($adminID->status == true) {
            $adminID->status = false;
            $adminID->update();
                
            Session::flash('success', strtoupper($adminID->lastname).' disabled successfully!');
        }
        else{
            $adminID->status = true;
            $adminID->update();
                
            Session::flash('success', strtoupper($adminID->lastname).' activated successfully!');
        }
        return back();
    }

    public function profile(){
        $admin_log = Auth::guard('admin')->user();

        $admin_role = Admin::with(['role',])->find($admin_log->id);
        return response()->json(['data'=>$admin_role]);
    }

    public function updateProfile(Request $request){

        $admin_log = Auth::guard('admin')->user();

        $admin = Admin::find($admin_log->id);

        $admin->phone_no = $request->phone_no;

        if ($admin->update() == true) {
            Session::flash('success', strtoupper($admin->email).' Profile Updated Successfully');
        }else{
            Session::flash('failed', 'Error while Updating '.strtoupper($admin->email).' Profile');
        }
        return back();
    }

    public function updatePassword(Request $request){

        $admin_log = Auth::guard('admin')->user();
        
        $hash_password = bcrypt('password');

        $admin = Admin::find($admin_log->id);

        $admin->password = $hash_password;

        if ($admin->update() == true) {
            Session::flash('success', ' Password Updated Successfully');
        }else{
            Session::flash('failed', 'Error while Updating Password');
        }
        return redirect(route('admin.user.admin.index'));
    }

}