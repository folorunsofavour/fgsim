<?php

namespace App\Http\Controllers\Admin\Administrative;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Role;
use App\Permission;
use App\PermissionRole;

class RoleController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function roles(Request $request) {

        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 17)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $fil_role = Role::with(['permissions'])->get();
        $permissions = Permission::get(['id','name']);
        if (isset($request->selection_menu)) {
            $selected_role = Role::with(['permissions'])->where('id','=', $request->role_id)->get();
            return view('admin.role.role_index', compact('selected_role', 'fil_role', 'permissions'));
        }
        return view('admin.role.role_index', compact('fil_role', 'permissions'));
    }

    public function add_role(Request $request) {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 18)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:255', 'unique:roles'],
        ]);

        $new_role = Role::create($request->all());

        $permissions = $request->permission;

        if ($permissions !== NULL) {
            foreach ($permissions as $permission_id => $permission) {
                PermissionRole::create([
                    'role_id' => $new_role->id,
                    'permission_id' => $permission_id,
                ]);
            }
        }
        return redirect()->back()->with('success', 'Role created successfully.');
    }

    public function roleStatus($id) {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 18)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $roleID = role::find($id);

        if ($roleID->status == true) {
            $roleID->status = false;
            $roleID->update();
                
            Session::flash('success', strtoupper($roleID->name).' disabled successfully!');
        }
        else{
            $roleID->status = true;
            $roleID->update();
            
            Session::flash('success', strtoupper($roleID->name).' activated successfully!');
        }
        return back();
    }

    public function edit_role($role_id) {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 18)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $role = Role::with(['permissions'])->where('id','=', $role_id)->first(['id','name']);
        $all_permissions = Permission::all();
        return view('admin.role.role_edit', compact('role', 'all_permissions'));
    }

    public function update_role(Request $request) {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 18)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:255'],
        ]);

        //updating roles table
        $role = Role::where('id', '=', $request->role_id)->first();
        $role->update([
            $role->name = $request->name,
        ]);

        //updating permissions with roles (permission_role) table
        $permissions = $request->permission;

        $get_permissions = PermissionRole::where('role_id', '=', $request->role_id);
        $get_permissions->delete();

        if ($permissions !== NULL) {
            foreach ($permissions as $permission_id => $permission) {
                PermissionRole::updateOrCreate([
                    'role_id' => $request->role_id,
                    'permission_id' => $permission_id,
                ]);
            }
        }

        return redirect(route('admin.roles'))->with('success', 'Role successfully updated.');
    }

}