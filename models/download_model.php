<?php

class download_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
		//echo 1;
	}


	public function index()
	{
		
header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=products-data.csv");
header("Pragma: no-cache");
header("Expires: 0");
 
$query = "SELECT * FROM plant";
try {
       $statement = $this->db->prepare($query);
       $statement->execute();
       $results = $statement->fetchAll();
       $statement->closeCursor();
 
       $content = '';
       $title = '';
       foreach ($results as $rs){
           $content .= stripslashes($rs["id"]). ',';
           $content .= stripslashes($rs["name"]). ',';
           $content .= stripslashes($rs["description"]). ',';
           $content .= "\n";
        }
 
        $title .= "id,name,description"."\n";
        echo $title;
        echo $content;
 
   } catch (PDOException $e) {
       $error_message = $e->getMessage();
       global $app_path;
       include 'errors/db_error.php';
       exit;
 }
}

}


?>