<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\ConfessionOfFaith;
use App\PermissionRole;

class ConfessionController extends Controller
{
  public function __construct() {
    $this->middleware('auth:admin');
  }

    public function index() {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 1)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $confessions = ConfessionOfFaith::all();
        return view('admin.home.confession_index', compact('confessions'));
    }

    public function store(Request $request) {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 2)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $this->validate($request, [
            "year"  => "required",
            "confession"  => "required",
        ]);

        $confession = new ConfessionOfFaith;

        $confession->year = $request->year;
        $confession->confession = $request->confession;

        if($confession->save() == true){
            Session::flash('success', 'Confession has been added successfully');
        }else{
            Session::flash('error', 'Could not add Confession');
        }
        return redirect(route('admin.confession'));
    }

    public function updateConfession(Request $request){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 2)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $confessionId = $request->confession_id;

        $confession = ConfessionOfFaith::find($confessionId);

        $confession->year = $request->confession_year;
        $confession->confession = $request->confession_name;

        if ($confession->update() == true) {
            Session::flash('success', 'Confession Updated Successfully');
        }else{
            Session::flash('failed', 'Error while Updating Confession');
        }
        return redirect(route('admin.confession'));
    }

    public function confessionStatus($id) {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 2)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $confessionID = ConfessionOfFaith::find($id);

        if ($confessionID->status == true) {
            $confessionID->status = false;
            $confessionID->update();
                
            $confessions = ConfessionOfFaith::where('id', '!=', $id)->get();
            if($confessions){
                foreach($confessions as $confession){
                    $confession->status = true;
                    $confession->update();
                }
            }
            Session::flash('success', 'Confession disabled successfully!');
        }
        else{
            $confessionID->status = true;
            $confessionID->update();
                
            $confessions = ConfessionOfFaith::where('id', '!=', $id)->get();
            if($confessions){
                foreach($confessions as $confession){
                    $confession->status = false;
                    $confession->update();
                }
            }
            Session::flash('success', 'Confession activated successfully!');
        }
        return back();
    }
}