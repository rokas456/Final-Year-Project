
<?php

class comment_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
		//echo 1;
	}


	public function retrieveProcessFeedback()
	{
		;

		$stmt1 = $this->db->prepare('SELECT * FROM test');
		$stmt1->execute();

		// foreach($dataPlant as $value){
		// 	$set_id =  $value['id'];
		// 	}

		$dataMachinery = $stmt1->fetchAll();
		echo json_encode($dataMachinery);
	}

}


?>