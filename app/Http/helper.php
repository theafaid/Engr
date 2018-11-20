<?php
if(!function_exists('up')){
	function up(){
		return new \App\Upload\Upload;
	}
}

if(!function_exists('settings')){
	function settings(){
		return  \App\Setting::first();
	}
}