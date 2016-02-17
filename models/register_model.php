<?php

class register_Model extends Model
{


	public function __construct()
	{
		parent::__construct();
		@session_start();
	}

	public function index()
	{	

		//echo $_POST['username']. ' '. $_POST['password']. ' '. $_POST['role']. ' '. $_POST['email'];

	  if($_POST['username']!="" && $_POST['password']!="" && $_POST['role']!="" && $_POST['email']!=""){

		$db_password = $this->password_encrypt($_POST['password']);
		
		$stmt = $this->db->prepare('INSERT INTO users(username, password, email, role)
									VALUES(:username, :password, :email, :role)');

		$stmt -> bindValue('username', $_POST['username']);
		$stmt -> bindValue('password',$db_password);
		$stmt -> bindValue('email', $_POST['email']);
		$stmt -> bindValue('role', $_POST['role']);
		$stmt -> execute();

		echo "User <b>".$_POST['username']."</b> registered. An email was sent to <b>".$_POST['email']. ' </b>with their login details.';
		//$this-send_email($_POST['email'], $_POST['password'], $_POST['role'], $_POST['username']);

	}else{
		echo "User not registered, please enter all fields of the form fields.";
	}
 }

 	public function password_encrypt($password){

	$hash_format="$2y$10$";
	$salt = $this->generate_salt();
	$format_and_salt = $hash_format . $salt;
	$hash = crypt($password, $format_and_salt);
	return $hash;
}

	public function generate_salt(){

	$unique_random_string = md5(uniqid(mt_rand(), true));
	$base64_string = base64_encode($unique_random_string);
	$modified_base64_string = str_replace('+', '.', $base64_string);
	$salt = substr($modified_base64_string, 0, 22);
	return $salt;
}

   function send_email($email, $password, $role, $username){

   	$to = $email;
	$subject = "Process Management System Login Details";
	$txt = "Hello ".$email. "<br />"."With the role of". $role."<br />Your login details are as follows: <br/>"."Username: ". $username."<br />". "Password: ".$password;
	$headers = "From: ProcessManagment@gmail.com" . "\r\n";
	//"CC: somebodyelse@example.com";

	mail($to,$subject,$txt,$headers);

   }


   function deleteUser(){
   	$id = $_POST['userID'];

   	$sql = "DELETE FROM users WHERE id = :id";
	$stmt = $this->db->prepare($sql);
	$stmt->bindParam(':id', $_POST['userID']);   
	$stmt->execute();
	echo "nice ".$id;
   }

   function updateUserShowDetails(){
   	$id = $_POST['userID'];

   	$sql = "SELECT id, username, email, role FROM users WHERE id = :id";
	$stmt = $this->db->prepare($sql);
	$stmt->bindParam(':id', $_POST['userID']);   
	$stmt->execute();
	
	$dataProcesses = $stmt->fetchAll();

	echo json_encode($dataProcesses);
   }

   function updateUser(){
   	$username = $_POST['username'];
   	$email = $_POST['email'];
   	$id = $_POST['id'];
   	$role = $_POST['role'];


	$stmt = $this->db->prepare('UPDATE users SET username = :username, email = :email, role = :role WHERE id= :id');
	$stmt -> bindValue('username', $username);
	$stmt -> bindValue('email',$email);
	$stmt -> bindValue('role', $role);
	$stmt -> bindValue('id', $id);
	$stmt -> execute();


	echo $id;
   }

   
}