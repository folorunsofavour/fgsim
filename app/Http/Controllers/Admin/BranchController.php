<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Branch;
use App\BranchService;
use App\PermissionRole;

class BranchController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }
    
    public function index() { 
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 13)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $branch_services = BranchService::with(['branch'])->get();
        $branches = Branch::all();
        return view('admin.branch.branch_index', compact('branches', 'branch_services'));
    }
    
    public function storeBranchService(Request $request){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 14)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $this->validate($request, [
            "country"  => "required",
            "service_name"  => "required",
            "service_day"  => "required",
            "service_time"  => "required",
        ]);

        $service_name = $request->service_name;

        foreach($service_name as $key => $value){

            $branch = new BranchService;

            
            $branch->country_id = $request->country;
            $branch->service_name = $value;
            $branch->service_day = $request->service_day[$key];
            $branch->service_time = $request->service_time[$key];

            $branch->save();
        }
  
        if($branch->save() == true){
          Session::flash('success', 'Branch has been added successfully');
        }else{
          Session::flash('error', 'Could not add Branch');
        }
        return redirect(route('admin.branch_service'));
    }

    public function editBranchService($id){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 14)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $branch_service = BranchService::with(['branch',])->find($id);
        $branches = Branch::all();
        return view('admin.branch.branch_edit', compact('branches', 'branch_service'));
    }

    public function updateBranchService(Request $request){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 14)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $branchId = $request->branchservice_id;

        $branch = BranchService::find($branchId);

        $branch->country_id = $request->country;
        $branch->service_name = $request->service_name;
        $branch->service_day = $request->service_day;
        $branch->service_time = $request->service_time;

        if ($branch->update() == true) {
            Session::flash('success', 'Branch Updated Successfully');
        }else{
            Session::flash('failed', 'Error while Updating Branch');
        }
        return redirect(route('admin.branch_service'));
    }

    public function deleteBranchService($id){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 14)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission
        
        if(Branch::where('id', '=', $id)->delete()){
            Session::flash('success', 'Branch Deleted Successfully');
        }else{
            Session::flash('error', 'Error while Deleting Branch');
        }
        return back();
    } 


    public function storeBranch(Request $request){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 14)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $this->validate($request, [
            "branch"  => "required",
            "address"  => "required",
        ]);

            $branch = new Branch;
            
            $branch->country = $request->branch;
            $branch->address = $request->address;

            $branch->save();
  
        if($branch->save() == true){
          Session::flash('success', 'Branch has been added successfully');
        }else{
          Session::flash('error', 'Could not add Branch');
        }
        return redirect(route('admin.branch_service'));
    }

    public function updateBranch(Request $request){
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 14)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $branchId = $request->branch_id;

        $branch = Branch::find($branchId);

        $branch->country = $request->branch_country;
        $branch->address = $request->branch_address;

        if ($branch->update() == true) {
            Session::flash('success', 'Branch Updated Successfully');
        }else{
            Session::flash('failed', 'Error while Updating Branch');
        }
        return redirect(route('admin.branch_service'));
    }
    
    public function branchStatus($id) {
        // Permission
        $user = Auth::guard('admin')->user();
        $permission = PermissionRole::where('role_id', $user->role_id)->where('permission_id', '=', 14)->first();
        if ($permission == null) { return view('admin.errors.unauthorized'); }
        // End of Permission

        $branchID = Branch::find($id);

        if ($branchID->status == true) {
            $branchID->status = false;
            $branchID->update();
                
            Session::flash('success', strtoupper($branchID->country).' disabled successfully!');
        }
        else{
            $branchID->status = true;
            $branchID->update();
                
            Session::flash('success', strtoupper($teamID->country).' activated successfully!');
        }
        return back();
    }

}