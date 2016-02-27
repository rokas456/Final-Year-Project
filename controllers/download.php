<?php

class download extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() 
	{	
		$this->view->render('data/index');
	}
	

	function showData()
	{
		$this->view->render('Data/showData');
		// $this->model->processInfo3();
	}

	function downloadData()
	{
		$this->model->index();
	}		

}

?>