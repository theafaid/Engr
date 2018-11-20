<?php

namespace App\Http\Controllers;

class FrontendController extends Controller
{
    public function index(){
    	return view('welcome', [
    		'latestPosts'   => \App\Post::withoutGlobalScope('user')->latest()->take(3)->get()
    	]);
    }
}
