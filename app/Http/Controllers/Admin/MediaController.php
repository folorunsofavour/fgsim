<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Media;
use App\PermissionRole;

class MediaController extends Controller
{
    public function __construct() {

        $this->middleware('auth:admin');
    }
    
    public function index() {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 11)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $medias = Media::all();
        return view('admin.media.media_index', compact('medias'));
    }

    public function storeMedia(Request $request){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 12)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $this->validate($request, [
            "subject"  => "required",
            "media_image"  => "required",
            "category"  => "required",
        ]);

        $image = $request->file('media_image');

        if($image){
            $filename = time().'-'.$image->getClientOriginalName();
            $destinationPath = public_path().'/storage/images/media/document';
            $image->move($destinationPath, $filename);
        }
        else{
            $filename = "avatar.png";
        }
  
        $media = new Media;
  
        $media->subject = $request->subject;
        $media->category = $request->category;
        $media->media_image = $filename;
  
        if($media->save() == true){
          Session::flash('success', 'Record has been added successfully');
        }else{
          Session::flash('error', 'Could not add Record');
        }
        return back();
    }

    public function editMedia($id){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 12)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $medias = Media::find($id);
        return view('admin.media.media_edit', compact('medias'));
    }

    public function updateMedia(Request $request){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 12)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $mediaId = $request->media_id;
        $image = $request->file('media_image');

        $media = Media::find($mediaId);

        if($image){
            $filename = time().'-'.$image->getClientOriginalName();
            $destinationPath = public_path().'/storage/images/media/document';
            $image->move($destinationPath, $filename);

            $media->media_image = $filename;
        }

        $media->subject = $request->subject;
        $media->category = $request->category;

        if ($media->update() == true) {
            Session::flash('success', 'Record Updated Successfully');
        }else{
            Session::flash('failed', 'Error while Updating Record');
        }
        return redirect(route('admin.media'));
    }
    
    public function deleteMedia($id){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 12)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission
        
        if(Media::where('id', '=', $id)->delete()){
            Session::flash('success', 'Record Deleted Successfully');
        }else{
            Session::flash('error', 'Error while Deleting Record');
        }
        return back();
    } 
}