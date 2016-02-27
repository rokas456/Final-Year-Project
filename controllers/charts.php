<?php

class Charts extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() 
	{	
		$this->view->render('charts/index');
	}
	
	function chartss() 
	{	
		$this->view->render('charts/chart');
	}
	

}

?>