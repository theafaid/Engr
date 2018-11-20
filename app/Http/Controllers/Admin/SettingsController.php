<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
class SettingsController extends Controller
{
    public function index(){
    	return view('admin.settings.index');
    }

    public function update(){
    	$data = request()->validate([
    		'site_name' => 'string|required|max:255',
    		'contact_number'=> 'string|max:13|required',
    		'contact_email' => 'string|email|max:255|required',
    		'address' => 'string|max:255|required'
    	]);

    	Setting::first()->update($data);
    	session()->flash('success', 'Settings Updated Successfully');
    	return back();
    }
}
