<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use View;
use Maatwebsite\Excel\Facades\Excel;
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;

class UploadController extends Controller {

	public function view() {
		return view('imageUpload');
	}

	public function upload(Request $request) {
		$this->validate($request, [
	    	'csvfile' => 'required|mimes:csv,txt', //only allow this type extension file.
		]);

		$file = $request->file('csvfile');
		$reader = ReaderFactory::create(Type::CSV); // for CSV files
		$reader->setFieldDelimiter(',');
		$reader->setFieldEnclosure('@');
		$reader->setEndOfLineCharacter("\r");
		$reader->setEncoding('UTF-8');
		$reader->open($file);

		foreach ($reader->getSheetIterator() as $sheet) {
			// var_dump($sheet);
			foreach ($sheet->getRowIterator() as $rowNumber => $row) {
				if($rowNumber == 1){

					echo '<pre>';
					print_r($row);
					echo '</pre>';
				}
			}
		}

		$reader->close();
		$columnnames = $request->input('columnnames');
		//$csv = array_map('str_getcsv', file($file ));
		//$keys = array_shift($csv);
		// image upload in public/upload folder.
		//$file->move('uploads', $file->getClientOriginalName()); 
		echo 'File Uploaded Successfully';
		//return view('imageUpload', compact('keys','columnnames'));
		// echo "<pre>";
		// print_r($csv);
		// echo "</pre>";
	}
}