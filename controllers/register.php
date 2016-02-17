<?php

class register extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() 
	{	
		$this->view->render('register/index');
	}

	function confirmUser() 
	{	
		$this->model->index();
	
	}

	function deleteUser() 
	{	
		$this->model->deleteUser();

	
	}

	function updateUserShowDetails() 
	{	
		$this->model->updateUserShowDetails();

	}

	function updateUser() 
	{	
		$this->model->updateUser();

	}
	

}

?>