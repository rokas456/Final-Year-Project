<?php

class retrievalProcess extends Controller {

	function __construct() {
		parent::__construct();	
	}
	

	function index()
	{	
		$this->model->index();

	}
// Retrives subparts
	function retriveSubparts()
	{	
		$this->model->retriveSubparts();

	}

	function showProcess()
	{	
		$this->view->render('processInfo/processInfo3');

	}

	
	function showProcesData()
	{	
		$this->model->showProcessDatas();

	}

	public function retrieveMachSubparts()
	{		
		$this->model->retrieveMachSubparts();

 	}
}

