<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\User::count();
        $categories = \App\Category::count();
        $published = \App\Post::count();
        $trashed = \App\Post::onlyTrashed()->count();
        return view('admin.home', [
            'users' => $users,
            'categoriesCount' => $categories,
            'published' => $published,
            'trashed' => $trashed
        ]);
    }
}
