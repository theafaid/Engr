<?php

namespace App\Http\Controllers;

use App\Post;
class SearchController extends Controller
{
    public function get(){
    	if(request()->has('q')){
    		return view('search', [
    			'name' => request('q'),
    			'posts' => Post::where('title', 'like', "%".request('q')."%")->get(),
    		]);
    	}

    	return abort(404);
    }
}
