<?php

class retrievalProcess_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
		@session_start();
	}



	public function index()
	{
		 $selectedValue = $_POST['selectMach'];

		echo '<input type="text" placeholder="Process Name for" id="processName"><br/> <br/>';
		echo '<textarea rows="8" cols="60" placeholder="Process Description for" id="processDescription" ></textarea> <br/> <br/>';
		echo '<button type="submit" class="btn btn-primary"  onclick="addProcess()">Add Process </button>';

 }


	public function  showProcessDatas()
	{		
			 
	if(isset($_POST['type'])){
    
      if($_POST['type'] =="booking"){
        $pName  = $_POST ['plantName'];
        $pMachName  = $_POST ['plantMachinery'];

		$stmt1 = $this->db->prepare('SELECT id FROM plant WHERE name = :plantName ');
		$stmt1->execute(array(
			':plantName' =>   $pName

		));

		$dataPlant = $stmt1->fetchAll();

		foreach($dataPlant as $value){
			$set_id =  $value['id'];
			}
		// Fetching Machinery
		 $stmt2 = $this->db->prepare('SELECT * FROM machinery WHERE plant_id = :plantId AND name = :machName');
		 $stmt2->execute(array(
		 	':plantId' =>  $set_id,
		 	':machName'    =>  $pMachName

		 ));

		$dataMachinery = $stmt2->fetchAll();

		foreach($dataMachinery as $value){
			$set_ids =  $value['id'];
			}

		// Fetching Process
		 $stmt3 = $this->db->prepare('SELECT * FROM process WHERE machinery_id = :machId');
		 $stmt3->execute(array(
		 	':machId' =>  $set_ids
		 ));

		$dataProcesses = $stmt3->fetchAll();

		echo json_encode($dataProcesses);


 	}

 }

}

}

?>


                            