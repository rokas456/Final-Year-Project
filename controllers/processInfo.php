<?php

class ProcessInfo extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() 
	{	
		$this->view->render('processInfo/index');
	}
	


	function processInfo3()
	{
		$this->view->render('processInfo/processInfo3');
		$this->model->processInfo3();
	}


	

}

?>