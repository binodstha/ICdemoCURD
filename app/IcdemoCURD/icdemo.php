<?php 
namespace Icdemo;
class Icdemo
{
	public function __construct()
	{
		echo file_exists(public_path() . '/info.csv');
	}
	

} 
?>