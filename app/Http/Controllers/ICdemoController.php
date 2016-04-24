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
		$this->filterinfo =  new \Icdemo\Filter\filterinfo;
		$this->validateinfo = new \Icdemo\Validator\validateinfo;
		$this->storeInfo = new \Icdemo\Store\storeInfo;
	}
	
	public function index($count = 1) 
	{	
		$info = $this->filterinfo->readinfo();
		return view('home', array('title'=>'Welcome', 
								  'infolist' => $info, 
								  'page' => $count));
	}

	public function search($search = '') 
	{
		$info = $this->filterinfo->searchinfo($search);
		return view('home', array('title'=>'Welcome', 
								  'infolist' => $info, 
								  'search' => $search,
								  'page' => 1 ));
	}

	public function info($email = 1) 
	{
		$info = $this->filterinfo->readinfo();
		return view('info', array('title'=>'Welcome', 
			'infolist' => $info, 
			'email' => $email));
	}

	public function create($error = null) 
	{
		return view('addinfo', array('error' => $error));
	}

	public function store()
	{
		if ($this->validateinfo->infoValidate()) 
			return redirect()->action('ICdemoController@create', ['matched']);

		if($this->storeInfo->addInfo())
			return redirect()->action('ICdemoController@create', ['Added']);
	}
}
