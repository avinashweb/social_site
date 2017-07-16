<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;

class PostController extends Controller
{
    public function postContent(){
    	$post = Post::create([
    		'user_id'	=> auth()->user()->id,
    		'content'	=> request()->input('content')
    	]);
    	$post->save();
    	return back();
    }

    public function getDelete($post_id){
    	$post = Post::find($post_id);
    	if(Auth::user() != $post->user){
    		return redirect()->route('home');
    	}
    	$post->delete();
    	return redirect()->route('home');
    }

    public function edit_ajax(Request $request){
        $content = $_POST['content'];
        $post_id = $_POST['postId'];
        $update_post = Post::find($post_id);
        $update_post->content = $content;
        $update_post->update();
        return $update_post->content;
    }
}
