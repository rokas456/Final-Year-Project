<?php

class CreatePlant extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() 
	{	
		$this->view->render('createPlant/index');
	}
	
	function createPlant()
	{

		$this->model->createPlant();
		$this->view->render('createPlant/addProcess2');
	}


	function createMachinery()
	{
		$this->model->createMachinery();
	}

	function createSubparts()
	{
		$this->view->render('createPlant/addProcessSubparts');
	}

	function createProcess()
	{
		$this->view->render('createPlant/addProcess3');
	}
	
	function createSubpartFinal()
	{
		$this->model->createSubpart();
	}
	// function displayMachinery()
	// {
	// 	$this->model->displayMachinery();
	// }


	function createProcessFinal(){
	
		$this->model->createProcessFinal();
	}

}

?>