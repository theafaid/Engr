<?php
namespace App\Upload;
use Storage; 
class Upload {
	public function upload($file, $place){
		if(request()->hasFile($file)){
			return request()->file($file)->store($place);
		}
		return null;
	}
}