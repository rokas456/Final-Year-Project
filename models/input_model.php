<?php

class input_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
		@session_start();
	}




 	public function retrieveProcess()
	{	


	if(isset($_POST['type'])){
    
      if($_POST['type'] =="processInfo"){
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
 

  	public function dataFeedback()
	{	

		
	if(isset($_POST['type'])){
    
      if($_POST['type'] =="processTestSubmit"){
      
         $plantMachName  = $_POST ['plantMachinery'];
         $plantName  = $_POST ['plantName'];
         $pOutcome = $_POST ['processOutcome'];
         $pFailedSub  = $_POST ['failedSubParts'];
         $pFeedback  = $_POST ['processComments'];
         $pReason  = $_POST ['possibleReason'];
         $processID  = $_POST ['processID'];
         $dateUser  = $_POST ['processTestDate'];

         // json_decode($pReason); // null 
         // json_decode($pFailedSub);

         $resultProcessTest="";
         if($pOutcome==1){
         	$resultProcessTest = "Success";

         }else if($pOutcome==2){
         	$resultProcessTest = "Failure";
         }

		$getProcess = $this->db->prepare('SELECT * FROM process WHERE id = :processID ');
		$getProcess->execute(array(
			':processID' =>  $processID 

		));

		$dataProcessName = $getProcess->fetchAll();

	
		foreach($dataProcessName as $value){
			$set_processName =  $value['name'];
			}

        $stmt = $this->db->prepare('INSERT INTO test(process_ids, possible_failure, comment, part_failed, testResult, dateUser, user, processTested)
						          VALUES(:processID, :pReasons, :commentFeedback, :partFailed, :testResults, :dateUser, :user, :processTestName)');

		$stmt -> bindValue('processID', $processID);
		$stmt -> bindValue('pReasons', $pReason);
		$stmt -> bindValue('commentFeedback', $pFeedback);
		$stmt -> bindValue('partFailed', $pFailedSub);
		$stmt -> bindValue('testResults', $resultProcessTest);
		$stmt -> bindValue('dateUser', $dateUser);
		$stmt -> bindValue('user', $_SESSION['username']);
		$stmt -> bindValue('processTestName', $set_processName);
		$stmt -> execute();


		$stmt2 = $this->db->prepare('SELECT id FROM plant WHERE name = :plantName ');
		$stmt2->execute(array(
			':plantName' =>  $plantName

		));

		$dataPlant = $stmt2->fetchAll();

	
		foreach($dataPlant as $value){
			$set_idPlant =  $value['id'];
			}

		// Fetching Machinery
		 $stmt3 = $this->db->prepare('SELECT * FROM machinery WHERE plant_id = :set_idPlant AND name = :machName');
		 $stmt3->execute(array(
		 	':set_idPlant'    =>  $set_idPlant,
		 	':machName'    =>  $plantMachName 

		 ));

		$dataMachinery = $stmt3->fetchAll();
		foreach($dataMachinery as $value){
			$set_idMach =  $value['id'];
			}






		// Inserting test input logic
		 if($pOutcome==1){
         	$resultProcessTest = "Success";

         	// Fetching process
		 	$stmt4 = $this->db->prepare('SELECT * FROM process WHERE id = :pId');
		 	$stmt4->execute(array(
		 	':pId'    =>  $processID,
		 ));
		 	$dataProcess = $stmt4->fetchAll();
				foreach($dataProcess as $value){
				$set_processCount =  $value['succesCounts'];
				}

			$set_processCount = $set_processCount+1;
			

			// Updating Processes with new values
			$stmt5 = $this->db->prepare('UPDATE process SET succesCounts = :newSuccess WHERE id= :processId');

			$stmt5 -> bindValue('newSuccess', $set_processCount);
			$stmt5 -> bindValue('processId', $processID);
			$stmt5 -> execute();

         	// Fetching machinery
		 	$stmt6 = $this->db->prepare('SELECT * FROM machinery WHERE id = :mId');
		 	$stmt6->execute(array(
		 	':mId'    =>  $set_idMach,
		 ));
		 	$dataMachinery = $stmt6->fetchAll();
				foreach($dataMachinery as $value){
				$set_machineryCount =  $value['succesCount'];
				}

			$set_machineryCount = $set_machineryCount+1;

			//Updating machinery with new values
			$stmt7 = $this->db->prepare('UPDATE machinery SET succesCount = :newSuccess WHERE id= :machineryId');

			$stmt7 -> bindValue('newSuccess', $set_machineryCount);
			$stmt7 -> bindValue('machineryId', $set_idMach);
			$stmt7 -> execute();



         }else if($pOutcome==2){
         	$resultProcessTest = "Failure";

         	// Fetching process
		 	$stmt4 = $this->db->prepare('SELECT * FROM process WHERE id = :pId');
		 	$stmt4->execute(array(
		 	':pId'    =>  $processID,
		 ));
		 	$dataProcess = $stmt4->fetchAll();
				foreach($dataProcess as $value){
				$set_processCount =  $value['failureCounts'];
				}

			$set_processCount = $set_processCount+1;

			$stmt5 = $this->db->prepare('UPDATE process SET failureCounts = :newFailure WHERE id= :processId');

			$stmt5 -> bindValue('newFailure', $set_processCount);
			$stmt5 -> bindValue('processId', $processID);
			$stmt5 -> execute();

         	// Fetching machinery
		 	$stmt6 = $this->db->prepare('SELECT * FROM machinery WHERE id = :mId');
		 	$stmt6->execute(array(
		 	':mId'    =>  $set_idMach,
		 ));
		 	$dataMachinery = $stmt6->fetchAll();
				foreach($dataMachinery as $value){
				$set_machineryCount =  $value['failureCount'];
				}

			$set_machineryCount = $set_machineryCount+1;

			//Updating machinery with new values
			$stmt7 = $this->db->prepare('UPDATE machinery SET failureCount = :newFailure WHERE id= :machineryId');

			$stmt7 -> bindValue('newFailure', $set_machineryCount);
			$stmt7 -> bindValue('machineryId', $set_idMach);
			$stmt7 -> execute();
         }


		// echo "Process results for machinery ".$plantMachName." succesfully stored with the following details: <br />".' <br/>Test Outcome: '.$pOutcome.
  //  		"<br />Possible Reason for failure: ".$pReason ."<br/>Faulty Part: ".$pFailedSub."<br/>Feedback: ".$pFeedback ;

 	 }

 	}
 }

}

?>
