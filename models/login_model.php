<?php

class Login_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
		//echo 1;
	}

	public function run()
	{
		$pass = $_POST['password'];
		$username = $_POST['username'];
		
		$sth = $this->db->prepare("SELECT * FROM users WHERE 
				username = :username ");
		$sth->execute(array(
			':username' => $_POST['username']
			
		));
		
		$data = $sth->fetchAll();
		$count =  $sth->rowCount();
		
		if ($count > 0) {

			foreach($data as $value){
				$set_password =  $value['password'];
				$set_username = $value['username'];
				$set_role = $value['role'];
			}

			$input_password = crypt($pass, $set_password);

		    if($input_password ==  $set_password && $username == $set_username){

			    // login
				Session::init();
				Session::set('loggedIn', true);
				Session::set('username', $set_username);
				Session::set('role', $set_role);
	
				header('location: ../dashboard');

			}else{

			header('location: ../login');
			}


		} else {
			header('location: ../login');

		}

		
}

	function redirect($new_location){

	header("Location:".$new_location);
}

	function logout(){
		header('location: ../login');
		Session::destroy();

	}

// function password_encrypt($password){

// 	$hash_format="$2y$10$";
// 	$salt = generate_salt();
// 	$format_and_salt = $hash_format . $salt;
// 	$hash = crypt($password, $format_and_salt);
// 	return $hash;
// }

// function generate_salt(){

// 	$unique_random_string = md5(uniqid(mt_rand(), true));
// 	$base64_string = base64_encode($unique_random_string);
// 	$modified_base64_string = str_replace('+', '.', $base64_string);
// 	$salt = substr($modified_base64_string, 0, 22);
// 	return $salt;
// }

// if(isset($_POST['submit'])){

// 	 $username = mysql_real_escape_string($_POST['username']);
// 	 $password = mysql_real_escape_string($_POST['password']);

// }



	
}