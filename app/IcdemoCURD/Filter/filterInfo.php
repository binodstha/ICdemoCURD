<?php 
namespace Icdemo\Filter; 

Use Input;

class FilterInfo
{
	var $info = array();
	var $searchlist = array();

	public function readinfo()
	{
		if (file_exists(public_path() . '/info.csv')) {
			if (($handle = fopen(public_path() . '/info.csv','r')) !== false) {
				while (($data = fgetcsv($handle, 1000, ',')) !== false) {
					$this->info[] = $data;
				}
				fclose($handle);
			}
		}
		return $this->info;
	}

	public function searchinfo($search)
	{
		if (Input::get('entry') !== "") {
			if (file_exists(public_path() . '/info.csv')) {
				$search = Input::get('entry');
				if (($handle = fopen(public_path() . '/info.csv','r')) !== false) {
					while (($data = fgetcsv($handle, 1000, ',')) !== false) {
						if ((strpos(strtolower($data[0]), strtolower($search)) !== false) 
						     OR $data[2] == $search 
						     OR $data[3] == $search)
							$this->searchlist[] = $data;
					}
					fclose($handle);
				}
			}
		}
		return $this->searchlist;
	}
}
