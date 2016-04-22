<?php 
namespace Icdemo\Store;

use Input;

class StoreInfo
{
	public function addInfo()
	{
		$text = Input::get('name') . ',' . 
				Input::get('gender') . ',' . 
				Input::get('phonenum') . ',' . 
				Input::get('email') . ',' . 
				Input::get('address') . ',' . 
				Input::get('nationality') . ',' . 
				Input::get('dob') . ',' .
				Input::get('education') . ',' .
				Input::get('percentage') . ',' .
				Input::get('modeofcont');
		$list = array($text);
		$file = fopen(public_path() . "/info.csv", "a");
		foreach ($list as $line) {
			fputcsv($file,explode(',', $line));
		}
		fclose($file); 
		return true;
	}
} 
