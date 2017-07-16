<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;
use Image;

class UserController extends Controller
{
    public function getSignin(){
        return view('welcome');
    }

    public function postSignup(Request $request){

    	$this->validate($request, [
    		'name'		=> 'required',
    		'email'		=> 'required|email|unique:users',
    		'password'	=> 'required|min:6|confirmed'
    	]);

    	$user = new User;
    	$user->name = $request->input('name');
    	$user->password = bcrypt($request->input('password'));
    	$user->email = $request->input('email');
        $user->save();
        auth()->login($user);
        return redirect()->route('home');
    }

    public function postSignin(Request $request){
    	$this->validate($request, [
    		'login-email' 	=> 'required|email',
    		'login-password'	=> 'required'
    	]);

        if(auth()->attempt(['email' => $request->input('login-email'), 'password' => $request->input('login-password')])){
            return redirect()->route('home');
        }
        return back();
    }

    public function home(){
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('pages.home', compact('posts'));
    }
    public function my_account($id, $profile){
       $user_data = User::find($id);
       return view('pages.profile', compact('user_data'));
    }
    public function updata_avatar(Request $request){
        if(request()->file('imp_path')){
            $avatar = $request->file('imp_path');
            $filename = time() .'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->save(public_path('/img/'.$filename));
            $user = Auth::user();
            $user->imp_path = $filename;
            $user->save();
        }
        return back();
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('user-login');
    }
}
