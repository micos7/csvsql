<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use View;

class UploadController extends Controller {

	public function view() {
		return view('imageUpload');
	}

	public function upload(Request $request) {
		$this->validate($request, [
	    	'image' => 'mimes:jpeg,bmp,jpg,png', //only allow this type extension file.
		]);

		$file = $request->file('image');
		// image upload in public/upload folder.
		$file->move('uploads', $file->getClientOriginalName()); 
		echo 'Image Uploaded Successfully';
	}
}