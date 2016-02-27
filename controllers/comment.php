<?php

class Comment extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() 
	{	
		$this->view->render('Comment/index');
	}
	
	function ViewComments() 
	{	
		$this->view->render('Comment/processFeedback');
	}
	function ViewProcessFeedback() 
	{	
		$this->view->render('Comment/commentFeedback');
	}

	function retrieveProcessFeedback() 
	{	
		$this->model->retrieveProcessFeedback();
	}
}

?>