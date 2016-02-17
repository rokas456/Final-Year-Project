<?php

class createPlant_Model extends Model
{


	public function __construct()
	{
		parent::__construct();
		@session_start();
	}

	public function run()
	{
		
}



	public function createPlant()
	{

		$plantName = $_POST['plantName'];
		$plantName = $_POST['plantDescription'];

		$stmt = $this->db->prepare('INSERT INTO plant(name, description)
									VALUES(:plantName, :plantDescription)');

		$stmt -> bindValue('plantName', $_POST['plantName']);
		$stmt -> bindValue('plantDescription', $_POST['plantDescription']);
		$stmt -> execute();

		$stmt2 = $this->db->prepare('SELECT id FROM plant WHERE name = :plantName ');
		$stmt2->execute(array(
			':plantName' => $_POST['plantName']

		));

		$data = $stmt2->fetchAll();


		foreach($data as $value){
			$set_id =  $value['id'];
			}

		Session::set('pID', $set_id);
		Session::set('pName',  $_POST['plantName']);
			

		//header('location: ../createPlant/addProcess2');
 }




 	public function createProcessFinal()
	{
		$pName = $_POST['pName'];
		$pDesc = $_POST['pDesc'];
		$m_ID = $_POST['pMachine'];

		$stmt2 = $this->db->prepare('SELECT id FROM machinery WHERE name = :machineName ');
		$stmt2->execute(array(
			':machineName' =>  $m_ID

		));

		$data = $stmt2->fetchAll();

		foreach($data as $value){
			$set_id =  $value['id'];
			}
		
		$stmt = $this->db->prepare('INSERT INTO process(machinery_id, name, description)
						VALUES(:m_id, :pName, :pDesc)');

		$stmt -> bindValue('pName', $pName);
		$stmt -> bindValue('pDesc', $pDesc);
		$stmt -> bindValue('m_id', $set_id);

		$stmt -> execute();
		echo "Process for machinery ".$m_ID ." with the following details has been created<br />".' <br/> Name: '.$_POST['pName']. '<br />Description: '. $_POST['pDesc'];
 }

	
}