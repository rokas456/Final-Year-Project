<?php

class retrievalMachinery extends Controller {

	function __construct() {
		parent::__construct();	
	}
	

	function index()
	{	
		$this->model->index();

	}

	
	function findMachinery()
	{	
		$this->model->retriveMach();

	}

	function retrievePlant()
	{	
		$this->model->retrievePlants();

	}

	function retrievalMachinerySubparts()
	{	
		$this->model->retrieveMachSubparts();

	}
	
}