<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Message;
use App\PermissionRole;

class MessageController extends Controller
{
  public function __construct() {
    $this->middleware('auth:admin');
  }

    public function prayer_request() {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 15)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $prayer_requests = Message::where('message_type', 'Prayer Request')->get();
        return view('admin.message.prayer_request', compact('prayer_requests'));
    }

    public function counselling_index() {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 15)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $counsellings = Message::where('message_type', 'Counselling')->get();
        return view('admin.message.counselling_index', compact('counsellings'));
    }

}