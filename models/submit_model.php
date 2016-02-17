<?php

class submit_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
		@session_start();
	}

	public function index()
	{
		$machName = $_POST['machineName'];
		$machDesc = $_POST['machDesc'];
		$machAquiry = date('Y-m-d',strtotime($_POST['date1']));
		$machExpiry = date('Y-m-d',strtotime($_POST['date2']));
		$machMaitanance = date('Y-m-d',strtotime($_POST['maintanance']));


		$stmt = $this->db->prepare('INSERT INTO machinery(plant_id, name, description, aquired_date, expiry_date, maintanance_date)
								VALUES(:pID, :machName, :machDescription, :aDate, :eDate, :mDate)');

		$stmt -> bindValue('machName', $_POST['machineName']);
		$stmt -> bindValue('machDescription', $_POST['machDesc']);
		$stmt -> bindValue('aDate', $machAquiry);
		$stmt -> bindValue('eDate', $machExpiry);
		$stmt -> bindValue('mDate', $machMaitanance);
		$stmt -> bindValue('pID', $_SESSION['pID']);
		//$stmt -> bindValue('s', 2);
		$stmt -> execute();

		echo "Machinery for plant ".$_SESSION['pName']." with the following details has been created<br />".' <br/>Name: '.$machName. '<br />Description: '. $machDesc. '<br />Aquiry Date: '. $machAquiry.'<br />Expiry Date: '. $machExpiry.'<br />Maintanance Date: '.$machMaitanance;

		
}


	
	
}

?>