<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\History;
use App\PermissionRole;

class HistoryController extends Controller
{
  public function __construct() {
    $this->middleware('auth:admin');
  }

    public function index() {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 7)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $histories = History::all();
        return view('admin.about_us.history.history_index', compact('histories'));
    }

    public function store(Request $request) {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 8)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $this->validate($request, [
            "year"  => "required",
            "theme"  => "required",
        ]);

        $history = new History;

        $history->year = $request->year;
        $history->theme = $request->theme;

        if($history->save() == true){
            Session::flash('success', 'History has been added successfully');
        }else{
            Session::flash('error', 'Could not add History');
        }
        return redirect(route('admin.history'));
    }

    public function updateHistory(Request $request){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 8)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $historyId = $request->history_id;

        $history = History::find($historyId);

        $history->year = $request->history_year;
        $history->theme = $request->history_theme;

        if ($history->update() == true) {
            Session::flash('success', 'History Updated Successfully');
        }else{
            Session::flash('failed', 'Error while Updating History');
        }
        return redirect(route('admin.history'));
    }

    public function historyStatus($id) {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 8)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $historyID = History::find($id);

        if ($historyID->status == true) {
            $historyID->status = false;
            $historyID->update();
                
            $histories = History::where('id', '!=', $id)->get();
            if($histories){
                foreach($histories as $history){
                    $history->status = true;
                    $history->update();
                }
            }
            Session::flash('success', strtoupper($historyID->name).' disabled successfully!');
        }
        else{
            $historyID->status = true;
            $historyID->update();
                
            $histories = history::where('id', '!=', $id)->get();
            if($histories){
                foreach($histories as $history){
                    $history->status = false;
                    $history->update();
                }
            }
            Session::flash('success', strtoupper($historyID->name).' activated successfully!');
        }
        return back();
    }
}