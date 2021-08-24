<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Branch;
use App\Message;
use App\Minister;
use App\Media;
use App\Announcement;


class DashboardController extends Controller
{
  public function __construct() {
    $this->middleware('auth:admin');
  }

  public function dashboard() {

    $branches = Branch::where('status',true)->count();
    $prayer_request = Message::where('message_type', 'Prayer Request')->count();
    $ministers = Minister::where('category', 'Minister')->where('status', true)->count();
    $medias = Media::latest()->take(4)->get();
    $announcement = Announcement::where('status',true)->first();
      
    return view('admin.index', compact('branches', 'prayer_request', 'ministers', 'medias', 'announcement'));
  }
}