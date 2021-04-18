<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    function login() {
        return view('auth.login');
    }
    function register() {
        return view('auth.register');
    }
    function save(Request $request) {

        # validate request
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users',
            'pswd'  => 'required|min:6|max:20'
        ]);

        #insert user into databse
        $user = new User;
        $user->first_name = $request->fname;
        $user->last_name = $request->lname;
        $user->email = $request->email;
        $user->password = Hash::make($request->pswd);
        $save = $user->save();

        if($save){
            return back()->with('success','New User has been successfuly added to database');
        }else{
            return back()->with('fail','Something went wrong, try again later');
        }
    }

    function checkLogin(Request $request) {

        # validate request
        $request->validate([
            'uname' => 'required|email',
            'pswd'  => 'required|min:6|max:20'
        ]);

        #insert user into databse
        $user = User::where('email','=',$request->uname)->first();

        if(!$user){
            return back()->with('fail','We could not find your email address in our Customer List.');
        }else{
            //check password
            if(Hash::check($request->pswd, $user->password)){
                $request->session()->put('UserID', $user->id);
                if(strcmp($request->uname, env('ADMIN_USER','sh.farzam@hotmail.com')) == 0) {
                    return redirect('admin/dashboard');
                } else {
                    return redirect('shop/products'.env('ADMIN_USER'));
                }


            }else{
                return back()->with('fail','Your password is not correct.');
            }
        }
    }

    function logout(){
        if(session()->has('UserID')){
            session()->pull('UserID');
            return redirect('/auth/login');
        }
    }

    function dashboard(){
        $data = ['UserInfo'=>User::where('id','=', session('UserID'))->first()];
        return view('admin.dashboard', $data);
    }

    function settings(){
        $data = ['UserInfo'=>User::where('id','=', session('UserID'))->first()];
        return view('admin.settings', $data);
    }

    function profile(){
        $data = ['UserInfo'=>User::where('id','=', session('UserID'))->first()];
        return view('admin.profile', $data);
    }
    function staff(){
        $data = ['UserInfo'=>User::where('id','=', session('UserID'))->first()];
        return view('admin.staff', $data);
    }

}
