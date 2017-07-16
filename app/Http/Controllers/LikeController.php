<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
use App\User;

class LikeController extends Controller
{
    public function like_ajax(){
    	$post_id = $_POST['post_id'];
    	$user_id = $_POST['user_id'];
    	$like = new Like;
    	$user = $like->where('post_id', $post_id)->where('user_id', $user_id)->first();
    	if($user == ''){
    		$user_like = new Like([
    			'user_id' 	=> $user_id,
    			'post_id'	=> $post_id,
    			'like'		=> 1
    		]); 
    		$user_like->save();
    		return 'Liked';
    	}else{
    		$like->where('post_id', $post_id)->where('user_id', $user_id)->delete();
    		return 'Like';
    	}
    }
}
