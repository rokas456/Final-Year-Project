<?php

class processInfo_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
		//echo 1;
	}

	public function run()
	{
		
}



	public function processInfo2()
	{
		$pass = $_POST['password'];
		$username = $_POST['username'];

		echo $username;
		
		$sth = $this->db->prepare("SELECT * FROM users WHERE 
				username = :username ");
 }


	
}

?>