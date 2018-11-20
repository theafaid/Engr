<?php

namespace App\Http\Controllers;

use App\Tag;
class TagsController extends Controller
{
    public function index(Tag $tag){

    	return view('tag', [
    		'name' => $tag->name,
    		'posts' => $tag->posts
    	]);
    }
}
