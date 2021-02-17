<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{   
    public function index(){
        return view('auth.login');
    }

    public function guest(){
        return view('guest');
    }

    public function admin(){
        return view('admin');
    }

    public function user(){
        return view('user');
    }

    public function login(Request $request){
        $user = User::where('email', $request->email)->first();
        
        if(!$user){
            redirect()->route('home');
        }

        if (!$user &&
            !Hash::check($request->password, $user->password)) {
            return view('login')->with('error', 'Username Or Password Wrong');
        }
        
        Auth::login($user);

        if($user->role == 'admin'){
            return redirect()->route('admin');
        }else if($user->role == 'user'){
            return redirect()->route('user');
        }else{
            return redirect()->route('guest');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
      }
}
