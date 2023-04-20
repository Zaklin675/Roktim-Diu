<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class DonorLoginController extends Controller
{
  
    // public function __construct()
    // {
    //     $this->middleware('guest:donor')->except('logout');
    // }
    public function showdonorLoginForm()
    {
        $pageTitle = "Donor Login";
        return view('admin.auth.donor_login', compact('pageTitle'));
    }
    public function donorLogin(Request $request)
    {
        // dd($userdata);
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required'
        ]);
        // dd($request->all());
        // if (Auth::guard('donor')->attempt(['username' => $request->unsername, 'password' => $request->password], $request->get('remember'))) {
        //     dd(1);
        //     // return redirect()->intended('/admin/dashboard');
        //     return Auth::guard('donor');
        // }
        // dd(3);
        // return back()->withInput($request->only('email', 'remember'));
        $userdata = array(
            
            'password'  => $request->password,
            'username'     => $request->username
        );
       
        if(Auth::guard('donor')->attempt($userdata)){
                // dd(Auth::guard('donor'));
               return redirect()->to('donor/dashboard');

        }else{
            return back()->withInput($request->only('email', 'remember'))->with('failed','Login Failed');
        };
    }
    public function donorLogout(Request $request)
    {
       Auth::guard('donor')->logout();
       return redirect('/donor-login');
    }

}