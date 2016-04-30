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
	var $filterinfo;
	var $validateinfo;
	var $storeInfo;
	public function __construct()
	{
		$this->filterinfo =  new \Icdemo\Filter\filterInfo;
		$this->validateinfo = new \Icdemo\Validator\validateInfo;
		$this->storeInfo = new \Icdemo\Store\storeInfo;
	}
	
	public function index($count = 1) 
	{	
		$info = $this->filterinfo->readinfo();
		return view('home', array('title'=>'Home',
								  'infolist' => $info, 
								  'search' =>'',
								  'page' => $count ));
	}

	public function search($search = '', $count = 1) 
	{
		$info = $this->filterinfo->searchinfo($search);
		if (Input::get('entry') != "") 
			$search = Input::get('entry');
		return view('home', array('title'=>'Search', 
				                  'infolist' => $info, 
				                  'search' => $search,
				                  'page' =>  $count ));
	}

	public function info($email = 1)
	{
		$info = $this->filterinfo->readinfo();
		return view('info', array('title'=>'Info', 
			                      'infolist' => $info, 
			                      'email' => $email));
	}

	public function create($error = null) 
	{
		return view('addinfo', array('title' => 'Add New Info',
									 'error' => $error));
	}

	public function store()
	{
		if ($this->validateinfo->infoValidate()) 
			return redirect()->action('ICdemoController@create', ['matched']);

		if($this->storeInfo->addInfo())
			return redirect()->action('ICdemoController@create', ['Added']);
	}
}
