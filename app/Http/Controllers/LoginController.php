<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    // user authentication function
    public function authenticate(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('account.login')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('account.dashboard');
            } elseif ($user->role == 'user') {
                return redirect()->route('user.dashboard');
            } else {
                Auth::logout();
                return redirect()->route('account.login')->with('error', 'Unauthorized user role.');
            }
        }

        return redirect()->route('account.login')
            ->with('error', 'The provided credentials do not match our records.')
            ->withInput();
}
    

public function register(){
        return view('register');
    }

    public function prossesRegister(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'name' => 'required'
        ]);

        if($validator->passes()){

           $user = new User();
           $user->name = $request->name;
           $user->email = $request->email;
           $user->password = Hash::make($request->password);
           $user->role = 'user';
           $user->save();
           return redirect()->route('account.login')->with('success', 'Registration completed!');
            
        } else {
            return redirect()->route('account.register')
            ->withInput()
            ->withErrors($validator);
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('account.login')->with('success', 'Logout completed!');
    }
}
