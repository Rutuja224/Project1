<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Session;


class CustomLoginController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function register(){
        return view("auth.register");
    }
    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if($res){
            return back()->with('success', 'you have registered successfully');
        }
        else{
            return back()->with('fail');

        }
    }

    public function loginUser(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email' , '=', $request->email)->first();
                // dd($user);

        if($user){
        
            if(Hash::check($request->password , $user->password)){
                Session::put('loginId', $user->id);
                // $request->session()->put('loginID', $user->id);

                // \Log::error('User failed: ' ,);
                return redirect('viewpage');
            }
            else{
                return back()->with('fail', 'incorrect password');
            }
        }
        else{
            return back()->with('fail');
        }

    }
    public function viewpage(){
        return view('viewpage');
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
