<?php

class Login extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() 
	{	
		$this->view->render('login/index');
	}
	
	function run()
	{
		$this->model->run();
	}

	function logout(){
		$this->model->logout();
	}
	

}