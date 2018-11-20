<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.profile', ['user' => auth()->user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        // validate form
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->id(),
            'avatar' => 'sometimes|nullable|image|mimes:jpg,jpeg,png',
            'facebook' => 'sometimes|nullable|string|url|max:255',
            'youtube' => 'sometimes|nullable|string|url|max:255',
            'about' => 'sometimes|nullable|string|max:1000',
            'password' => 'sometimes|nullable|string|min:6|max:255',
        ]);

        if(request()->hasFile('avatar')){
            // remove old image
            Storage::delete(auth()->user()->profile->avatar);
        }

        // update user data
        auth()->user()->update([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request()->has('password') ? bcrypt(request('password')) : auth()->user()->password
        ]);

        // update user profile
        auth()->user()->profile()->update([
            'avatar' => up()->upload('avatar', 'users'),
            'facebook' => request('facebook'),
            'youtube' => request('youtube'),
            'about' => request('about')
        ]);

        // success
        session()->flash('success', 'Your Profile Updated Successfully');
        return back();
    }

}
