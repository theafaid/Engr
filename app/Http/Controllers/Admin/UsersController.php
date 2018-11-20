<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Profile;
class UsersController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
    	$users = User::orderBy('id', 'desc')->get();
    	return view('admin.users.index', ['users' => $users]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(){
        // validate form
    	$data = request()->validate([
    		'name' => 'required|string|max:255',
    		'email' => 'required|string|email|max:255|unique:users,email',
    		'password' => 'required|string|max:255|min:6'
    	]);

    	$data['password'] = bcrypt($data['password']);
        // create user
    	$user = User::create($data);

    	//success create
    	session()->flash('success', 'User Created Successfully');

    	// redirect to users page
    	return redirect(route('users.index'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * show create user form
     */
    public function create(){
    	return view('admin.users.create');
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * make a user and admin or remove admin privileges
     */
    public function admin(User $user){
        // update admin field
    	$user->admin = ! $user->admin;
    	$user->save();
    	// success
    	session()->flash('success', "Admin Privileges has been edited!");
    	// redirect to users page
    	return redirect(route('users.index'));
    }

    public function destroy(User $user){
        // delete user
        $user->delete();
        // success
        session()->flash('success', 'User Deleted Sucessfully');
        // redirect to users page
        return redirect(route('users.index'));

    }
}
