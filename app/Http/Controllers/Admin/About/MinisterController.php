<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Minister;
use App\PermissionRole;

class MinisterController extends Controller
{
    public function __construct() {

        $this->middleware('auth:admin');
    }
    
    public function index() {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 9)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $ministers = Minister::all();
        return view('admin.about_us.minister.minister_index', compact('ministers'));
    }

    public function storeMinister(Request $request){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 10)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $this->validate($request, [
            "firstname"  => "required",
            "lastname"  => "required",
            "position"  => "required",
            "minister_image"  => "required",
            "category"  => "required",
        ]);

        $image = $request->file('minister_image');

        if($image){
            $filename = time().'-'.$image->getClientOriginalName();
            $destinationPath = public_path().'/storage/images/minister/document';
            $image->move($destinationPath, $filename);
        }
        else{
            $filename = "avatar.png";
        }
  
        $minister = new Minister;
  
        $minister->firstname = $request->firstname;
        $minister->lastname = $request->lastname;
        $minister->othername = $request->othername;
        $minister->position = $request->position;
        $minister->category = $request->category;
        $minister->minister_image = $filename;
  
        if($minister->save() == true){
          Session::flash('success', 'Record has been added successfully');
        }else{
          Session::flash('error', 'Could not add Record');
        }
        return back();
    }

    public function ministerStatus($id) {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 10)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $ministerID = Minister::find($id);

        if ($ministerID->status == true) {
            $ministerID->status = false;
            $ministerID->update();
                
            Session::flash('success', strtoupper($ministerID->lastname).' disabled successfully!');
        }
        else{
            $ministerID->status = true;
            $ministerID->update();
                
            Session::flash('success', strtoupper($ministerID->lastname).' activated successfully!');
        }
        return back();
    }

    public function editMinister($id){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 10)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $ministers = Minister::find($id);
        return view('admin.about_us.minister.minister_edit', compact('ministers'));
    }

    public function updateMinister(Request $request){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 10)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $ministerId = $request->minister_id;
        $image = $request->file('minister_image');

        $minister = Minister::find($ministerId);

        if($image){
            $filename = time().'-'.$image->getClientOriginalName();
            $destinationPath = public_path().'/storage/images/minister/document';
            $image->move($destinationPath, $filename);

            $minister->minister_image = $filename;
        }

        $minister->firstname = $request->firstname;
        $minister->lastname = $request->lastname;
        $minister->othername = $request->othername;
        $minister->position = $request->position;
        $minister->category = $request->category;

        if ($minister->update() == true) {
            Session::flash('success', 'Record Updated Successfully');
        }else{
            Session::flash('failed', 'Error while Updating Record');
        }
        return redirect(route('admin.minister'));
    }
    
    public function deleteMinister($id){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 10)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission
        
        if(Minister::where('id', '=', $id)->delete()){
            Session::flash('success', 'Record Deleted Successfully');
        }else{
            Session::flash('error', 'Error while Deleting Record');
        }
        return back();
    } 
}