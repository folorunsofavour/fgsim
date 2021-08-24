<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Validator;
use Session;
use Auth;
use App\Admin;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function guard(){
        return Auth::guard('admin');
    }

    public function showLoginPage() {
        return view('auth.login');
    }

    public function login(Request $request) {
        
        $validator = Validator::make($request->all(), [
            "email"    => "required",
            "password" => "required",

        ]); 

        if ($validator->fails()) {
            return response()->json(['error' => true, 'msg' => 'Something is wrong with your form.']);
        }

        $admin = Admin::where('email', '=', $request->email)->first();


        if (!isset($admin)) {
            return response()->json(['error' => true, 'msg' => 'This admin does not exist']);
        }

        if ($admin->status == false) {
            return response()->json(['error' => true, 'msg' => 'Admin is not active']);
        }

        if(Auth::guard('admin')->attempt($request->only('email','password'))){
            // if($admin && $admin->password = $request->password && $admin->status == true){

            $updateLogin = $admin->update(['last_login' => date('Y-m-d H:i:s')]);


            return response()->json(['success' => true, 'msg' => 'Login successful', 'redirectPage' => '/admin/dashboard']);
        }


        return response()->json(['error' => true, 'msg' => 'Wrong username/password']);


    }

    public function logout(Request $request) {

        Auth::guard("admin")->logout();
        // $request->session()->flush();
        // $request->session()->regenerate();

        return redirect(route('auth.admin_login_form'));

    }
}
