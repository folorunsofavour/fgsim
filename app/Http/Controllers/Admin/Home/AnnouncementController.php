<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Announcement;
use App\PermissionRole;

class AnnouncementController extends Controller
{
  public function __construct() {
    $this->middleware('auth:admin');
  }

    public function index() {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 3)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission
        
        $announcements = Announcement::all();
        return view('admin.home.announcement_index', compact('announcements'));
    }

    public function store(Request $request) {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 4)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $this->validate($request, [
            "announcement"  => "required",
        ]);

        $announcement = new Announcement;

        $announcement->announcement = $request->announcement;

        if($announcement->save() == true){
            Session::flash('success', 'Announcement has been added successfully');
        }else{
            Session::flash('error', 'Could not add Announcement');
        }
        return redirect(route('admin.announcement'));
    }

    public function updateAnnouncement(Request $request){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 4)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $announcementId = $request->announcement_id;

        $announcement = Announcement::find($announcementId);

        $announcement->announcement = $request->announcement_name;

        if ($announcement->update() == true) {
            Session::flash('success', 'Announcement Updated Successfully');
        }else{
            Session::flash('failed', 'Error while Updating Announcement');
        }
        return redirect(route('admin.announcement'));
    }

    public function announcementStatus($id) {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 4)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $announcementID = Announcement::find($id);

        if ($announcementID->status == true) {
            $announcementID->status = false;
            $announcementID->update();
                
            $announcements = Announcement::where('id', '!=', $id)->get();
            if($announcements){
                foreach($announcements as $announcement){
                    $announcement->status = true;
                    $announcement->update();
                }
            }
            Session::flash('success', 'Announcement disabled successfully!');
        }
        else{
            $announcementID->status = true;
            $announcementID->update();
                
            $announcements = Announcement::where('id', '!=', $id)->get();
            if($announcements){
                foreach($announcements as $announcement){
                    $announcement->status = false;
                    $announcement->update();
                }
            }
            Session::flash('success', 'Announcement activated successfully!');
        }
        return back();
    }
}