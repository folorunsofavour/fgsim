<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\About;
use App\PermissionRole;

class AboutController extends Controller
{
  public function __construct() {
    $this->middleware('auth:admin');
  }

    public function index() {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 5)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $abouts = About::all();
        return view('admin.about_us.about.about_index', compact('abouts'));
    }

    public function store(Request $request) {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 6)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $this->validate($request, [
            "about"  => "required",
        ]);

        $about = new About;
        $about->name = $request->about;

        if($about->save() == true){
            Session::flash('success', 'About has been added successfully');
        }else{
            Session::flash('error', 'Could not add About');
        }
        return redirect(route('admin.about'));
    }

    public function updateAbout(Request $request){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 6)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $aboutId = $request->about_id;

        $about = About::find($aboutId);

        $about->name = $request->about_name;

        if ($about->update() == true) {
            Session::flash('success', 'About Updated Successfully');
        }else{
            Session::flash('failed', 'Error while Updating About');
        }
        return redirect(route('admin.about'));
    }

    public function aboutStatus($id) {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 6)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $aboutID = About::find($id);

        if ($aboutID->status == true) {
            $aboutID->status = false;
            $aboutID->update();
                
            $abouts = About::where('id', '!=', $id)->get();
            if($abouts){
                foreach($abouts as $about){
                    $about->status = true;
                    $about->update();
                }
            }
            Session::flash('success', strtoupper($aboutID->name).' disabled successfully!');
        }
        else{
            $aboutID->status = true;
            $aboutID->update();
                
            $abouts = About::where('id', '!=', $id)->get();
            if($abouts){
                foreach($abouts as $about){
                    $about->status = false;
                    $about->update();
                }
            }
            Session::flash('success', strtoupper($aboutID->name).' activated successfully!');
        }
        return back();
    }
}