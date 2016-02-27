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

	public function retriveSubparts()
	{
		 $selectedValue = $_POST['selectMach'];
                              
                           		
		echo '<div class="form-group">';
		echo '<h4>Subpart Name</h4><input type="text" placeholder="Subpart Name" id="subpartName" class="form-control"><br/>';
		echo '<h4>Subpart Description</h4><textarea rows="5" cols="80" id="subDescription" placeholder="Subpart Description" class="form-control"></textarea> <br/>';
		echo '<h4>Manufacturer</h4><input type="text" placeholder="Subpart Manufacturer" id="subpartManufacturer" class="form-control"> <br/>';
		echo '<h4>Aquired Date</h4> <input type="date"  id="subpartAquiry" class="form-control"><br/>';
		echo '<h4>Expiry Date</h4> <input type="date"  id="subpartExpiry" class="form-control"> <br/>';
		echo '<button type="submit" class="btn btn-primary"  onclick="addSubpart()" style="float:right; ">Add Subpart to '.$selectedValue .'</button>';
		echo '</div>';

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

	public function retrieveMachSubparts()
	{		
	if(isset($_POST['type'])){
    
      if($_POST['type'] =="showMachSubparts"){
      
        $pMachName  = $_POST ['plantMachinery'];

		// Fetching Machinery
		 $stmt1 = $this->db->prepare('SELECT * FROM machinery WHERE name = :machName');
		 $stmt1->execute(array(
		 	':machName'    =>  $pMachName

		 ));

		$dataMachinery = $stmt1->fetchAll();

		foreach($dataMachinery as $value){
			$set_ids =  $value['id'];
			}

		$stmt2 = $this->db->prepare('SELECT name, id FROM subparts WHERE mach_id = :machid ');
		$stmt2->execute(array(
			':machid' =>   $set_ids

		));

		$dataSubparts = $stmt2->fetchAll();
		echo json_encode($dataSubparts);


 	 }

 	}
 }

}

?>


                            