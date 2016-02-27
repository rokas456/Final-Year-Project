<?php

class retrievalMachinery_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
		@session_start();
	}



	public function index()
	{


		$stmt2 = $this->db->prepare('SELECT name FROM machinery WHERE plant_id = :plantName ');
		$stmt2->execute(array(
			':plantName' =>  $_SESSION['pID']

		));

		$data = $stmt2->fetchAll();

		$i=0;
		echo "<h2>Select Machinery</h2>";
		echo '<select class="form-control" id="selectMachine" name="machineryName" onchange="getVar(this.value)" multiple required>';

		foreach($data as $value){
			$set_id[$i] =  $value['name'];
			echo "<option>".$set_id[$i]."</option>";
			$i++;
			}
		echo '</select> <br />';
 }

 	public function retriveMach()
	{

		$pName = $_POST['plantName'];

		$stmt1 = $this->db->prepare('SELECT id FROM plant WHERE name = :plantName ');
		$stmt1->execute(array(
			':plantName' =>  $pName
		));
		$data = $stmt1->fetchAll();
		foreach($data as $value){
			$set_pid =  $value['id'];
			}
			
		
		// Retrieving Plant
		$stmt2 = $this->db->prepare('SELECT name FROM machinery WHERE plant_id = :plantName ');
		$stmt2->execute(array(
			':plantName' =>  $set_pid 

		));

		$data = $stmt2->fetchAll();

		$i=0;
		echo '<select size="10" class="form-control" id="selectMachineryProcess" onchange="checkMach(this.value)">';

		foreach($data as $value){
			$set_id[$i] =  $value['name'];
			echo "<option>".$set_id[$i]."</option>";
			$i++;
			}
		echo '</select> <br />';


 }

 //Shows machinery for which to add subparts to
 	public function retrieveMachSubparts()
	{

		$stmt2 = $this->db->prepare('SELECT name FROM machinery WHERE plant_id = :plantName ');
		$stmt2->execute(array(
			':plantName' =>  $_SESSION['pID']

		));

		$data = $stmt2->fetchAll();

		$i=0;
		echo "<h2>Select Machinery</h2>";
		echo '<select class="form-control" id="selectSubpartMach" name="machineryName" onchange="getSubpartForm(this.value)" multiple required>';

		foreach($data as $value){
			$set_id[$i] =  $value['name'];
			echo "<option>".$set_id[$i]."</option>";
			$i++;
			}
		echo '</select> <br />';


 }

 	public function retrievePlants()
	{

		$stmt1 = $this->db->prepare('SELECT * FROM plant');
		$stmt1->execute();

		$data = $stmt1->fetchAll();	
		 
		echo json_encode($data);


 }
 

}

?>
