<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
    public function showUserLoginForm()
    {
        $pageTitle = "User Login";
        return view('admin.auth.user_login', compact('pageTitle'));
    }
    public function showUserRegisterForm()
    {
        $pageTitle = "User Register";
        return view('admin.auth.user_register', compact('pageTitle'));
    }
    public function userLogin(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required'
        ]);
       
        $userdata = array(
            
            'password'  => $request->password,
            'username'     => $request->username
        );
        
        if(Auth::guard('user')->attempt($userdata)){
                // dd(Auth::guard('user'));
               return redirect()->to('/');

        }else{
            return back()->withInput($request->only('email', 'remember'))->with('failed','Login Failed');
        };
    }
    public function userRegister(Request $request){
        // return $request->all();
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required'
        ]);
        $userdata = array(
            
            'password'  =>Hash::make($request->password) ,
            'username'     => $request->username,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'address'     => $request->address,
            'name'     => $request->name,
        );
        User::create($userdata);
        $userlogin = array(
            
            'password'  => $request->password,
            'username'     => $request->username
        );
        if(Auth::guard('user')->attempt($userlogin)){
            // dd(Auth::guard('donor'));
           return redirect()->to('/');
        }else{
            return back()->withInput($request->only('email', 'remember'))->with('failed','Login Failed');
        };

    }
    public function UserLogout(){
        
        Auth::guard('user')->logout();

       return redirect('/user-login');
    }

    
}
