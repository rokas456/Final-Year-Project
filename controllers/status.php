<?php

class status extends Controller {

	function __construct() {
		parent::__construct();	
	}
	

	function index()
	{
		$this->view->render('status/index');
	}


	

}