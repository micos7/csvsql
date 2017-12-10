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
	    	'csvfile' => 'required|mimes:csv,txt', //only allow this type extension file.
		]);

		$file = $request->file('csvfile');
		// image upload in public/upload folder.
		$file->move('uploads', $file->getClientOriginalName()); 
		echo 'File Uploaded Successfully';
	}
}