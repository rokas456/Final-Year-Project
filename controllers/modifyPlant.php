<?php

class modifyPlant extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() 
	{	
		$this->view->render('modifyPlant/index');
	}

	function deleteProcess() 
	{	
		$this->model->index();
	
	}

	function deleteMachinery() 
	{	
		$this->model->deleteUser();

	
	}

	function deletePlant() 
	{	
		$this->model->deleteUser();

	}

	function deleteSubparts() 
	{	
		$this->model->deleteUser();

	}

	function updateProcess() 
	{	
		$this->model->updateUserShowDetails();

	}

	function updateMachinery() 
	{	
		$this->model->updateUser();

	}

	function updateSubParts() 
	{	
		$this->model->updateUser();

	}

	function createMachinery() 
	{	
		$this->model->updateUser();

	}
	
	function createSubparts() 
	{	
		$this->model->updateUser();

	}
	function createProcess() 
	{	
		$this->model->updateUser();

	}

}

?>