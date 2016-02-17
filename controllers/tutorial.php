<?php

class Tutorial extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->view->render('tutorials/index');	
	}

	public function other($arg = false) {
		
		require 'models/tutorial_model.php';
		$model = new Help_Model();
		$this->view->blah = $model->blah();
		
	}

}