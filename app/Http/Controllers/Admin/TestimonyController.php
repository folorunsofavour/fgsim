<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Testimony;
use App\PermissionRole;

class TestimonyController extends Controller
{
  public function __construct() {
    $this->middleware('auth:admin');
  }

    public function index() {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 15)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $testimonies = Testimony::all();
        return view('admin.message.testimony_index', compact('testimonies'));
    }

    public function store(Request $request) {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 16)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $this->validate($request, [
            "testimony"  => "required",
            "fullname"  => "required",
            "picture"  => "required",
            "subject"  => "required",
        ]);

        $image = $request->file('picture');

        if($image){
            $filename = time().'-'.$image->getClientOriginalName();
            $destinationPath = public_path().'/storage/images/testimony/document';
            $image->move($destinationPath, $filename);
        }
        else{
            $filename = "avatar.png";
        }

        $testimony = new Testimony;

        $testimony->fullname = $request->fullname;
        $testimony->subject = $request->subject;
        $testimony->testimony = $request->testimony;
        $testimony->picture = $filename;

        if($testimony->save() == true){
            Session::flash('success', 'Testimony has been added successfully');
        }else{
            Session::flash('error', 'Could not add Testimony');
        }
        return redirect(route('admin.testimony'));
    }

    public function editTestimony($id){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 16)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $testimony = Testimony::find($id);
        return view('admin.message.testimony_edit', compact('testimony'));
    }

    public function updateTestimony(Request $request){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 16)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $testimonyId = $request->testimony_id;
        
        $image = $request->file('picture');

        $testimony = Testimony::find($testimonyId);

        if($image){
            $filename = time().'-'.$image->getClientOriginalName();
            $destinationPath = public_path().'/storage/images/testimony/document';
            $image->move($destinationPath, $filename);

            $testimony->picture = $filename;
        }

        $testimony->fullname = $request->fullname;
        $testimony->subject = $request->subject;
        $testimony->testimony = $request->testimony;

        if ($testimony->update() == true) {
            Session::flash('success', 'Testimony Updated Successfully');
        }else{
            Session::flash('failed', 'Error while Updating Testimony');
        }
        return redirect(route('admin.testimony'));
    }

    public function deleteTestimony($id) {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 16)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $testimony = Testimony::find($id);

        if ($testimony->delete() == true) {
            Session::flash('success', 'Testimony Deleted Successfully');
        }else{
            Session::flash('failed', 'Error while Deleting Testimony');
        }
        return redirect(route('admin.testimony'));
    }
}