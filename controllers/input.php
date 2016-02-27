<?php

class input extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() 
	{	
		$this->view->render('input/index');
	}
	
	function showProcess()
	{
		$this->view->render('input/inputTwo');
	}

	function retrieveProcess()
	{
		$this->model->retrieveProcess();
	}

	function dataFeedback()
	{
		$this->model->dataFeedback();
	}

}