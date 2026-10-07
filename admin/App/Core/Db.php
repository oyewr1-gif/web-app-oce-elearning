<?php
class Db {
	public $DBH;
	private $host = '127.0.0.1';
	private $dbname = 'elearning';
	private $user = 'elearning';
	private $pass = '1Elearning*';
	
	function __construct(){
		try {
			$this->DBH = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user, $this->pass);
			$this->DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch (PDOException $err) {
			$response["error"] = TRUE;
			$response["error_msg"] = "Koneksi gagal: ".$err->getMessage();
			echo json_encode($response);
			
		}
	}
	
	function createDb($dbName,  $user, $pass){
		try{
			$DBH = new PDO("mysql:host=".$this->host, 'root', 'toor');
			$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$query = "CREATE DATABASE IF NOT EXISTS ".$dbName;
			$stmt = $DBH->query($query);
			$stmt = $DBH->query("GRANT ALL PRIVILEGES ON ".$dbName.".* TO '$user'@'localhost' IDENTIFIED BY '$pass'" );
			$stmt = $DBH->query("FLUSH PRIVILEGES");
			$response["error"] = false;
			$response["error_msg"] = "SUCCESS";
			return $response;
		} catch (PDOException $err) {
			$response["error"] = TRUE;
			$response["error_msg"] = "Koneksi gagal: ".$err->getMessage();
			return $response;
		}
	}
		
	function getConnection(){
		require_once 'Config.php';
		try {
			$fqdn = "mysql:host=" . $host . ";dbname=" . $dbname;
			$conn = new PDO($fqdn, $user, $pass);
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch (PDOException $err) {
			$response["error"] = TRUE;
			$response["error_msg"] = "Koneksi gagal: ".$err->getMessage();
			return $response;
		}
		return $conn;
	}
	public function closeConnection(){
		$this->conn = null;
	}
}
?>