<?php
namespace App\Http\Controllers;

use Input;
use App\Http\Requests;
use Illuminate\Http\Request;

class ICdemoController extends Controller
{

	var $info= array();
	var $searchlist = array();
	var $edu = array();
	public function __construct()
	{
		if (file_exists(public_path() . '/info.csv')) {
			if (($handle = fopen(public_path() . '/info.csv','r')) !== false) {
				while (($data = fgetcsv($handle, 1000, ',')) !== false) {
					$this->info[] = $data;
				}
				fclose($handle);
			}
		}
		if (Input::get('entry') !== "")
			if (file_exists(public_path() . '/info.csv')) {
				$search = Input::get('entry');
				if (($handle = fopen(public_path() . '/info.csv','r')) !== false) {
					while (($data = fgetcsv($handle, 1000, ',')) !== false) {
						if ((strpos($data[0], $search) !== false ) OR $data[2] == $search OR $data[3] == $search)
							$this->searchlist[] = $data;
					}
					fclose($handle);
				}
			}
		}

		public function index($count = 1) 
		{
			return view('home', array('title'=>'Welcome', 
				'infolist' => $this->info, 
				'page' => $count));
		}

		public function search($search = '') 
		{
			return view('home', array('title'=>'Welcome', 
									  'infolist' => $this->searchlist, 
									  'search' => $search ));
		}

		public function info($email = 1) 
		{
			return view('info', array('title'=>'Welcome', 
									  'infolist' => $this->info, 
									  'email' => $email ));
		}
		public function create($error = null) 
		{
			return view('addinfo', array('error' => $error));
		}

		public function store()
		{
			foreach ($this->info as $infos){
				if ($infos[2] == Input::get('phonenum') OR $infos[3] == Input::get('email'))
					return redirect()->action('ICdemoController@create', ['matched']);
			}
			$text = Input::get('name') . "," . 
					Input::get('gender') . "," . 
					Input::get('phonenum') . "," . 
					Input::get('email') . "," . 
					Input::get('address') . "," . 
					Input::get('nationality') . "," . 
					Input::get('dob') . "," .
					Input::get('education') . "," .
					Input::get('percentage') . "," .
					Input::get('modeofcont');

			$list = array($text);
			$file = fopen(public_path() . "info.csv", "a");
			foreach ($list as $line) {
				fputcsv($file,explode(',',$line));
			}
			fclose($file); 
			return redirect()->action('ICdemoController@create', ['Added']);

		}
	}
