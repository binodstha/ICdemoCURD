<?php 
namespace Icdemo\Validator;

use Input;

class ValidateInfo
{
	public function infoValidate(){
		$filterinfo =  new \Icdemo\Filter\filterinfo;
			$info = $filterinfo->readinfo();
			
		foreach ($info as $infos){
			if ($infos[2] == Input::get('phonenum') OR $infos[3] == Input::get('email'))
				return true;
		}
		return false;
	}
} ?>