<?php
class Model extends Db {
	public function select($table, $key='', $value=''){
		$query = "SELECT * FROM $table ";
		if(!empty($key)) $query = $query." WHERE $key='$value' ";
		try {
			//$dbh = $this->getConnection();
			//if(!isset($dbh)) exit('No connection');				
			if($this->DBH == null) exit;
			$stmt = $this->DBH->prepare($query);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if(!isset($result)) {
				//$stmt = $this->DBH->query("DESCRIBE $table");
				$stmt = $this->DBH->query($query);
				$result = $stmt->fetchAll(PDO::FETCH_COLUMN);
			}
			$resp['error'] =  false;
			$resp['table'] =  $table;
			$resp['msg'] =  $result;
		} catch(PDOException $err){
			$resp['error'] =  true;
			$resp['error_msg'] =  $err->getMessage();
		}
		$dbh = null;
		return $resp;
	}
	
	public function insert($table, $data){
		$query = "INSERT INTO $table SET ";
		/*foreach($data as $col=>$val){
			$query = $query . $col . ",";
		}*/
		
		foreach($data as $col=>$val){
			if(!empty($val))				
				$query = $query ."$col='$val',";
		}
		$query = substr($query, 0, -1) ;
		$query = $query . " ON DUPLICATE KEY UPDATE ";
		foreach($data as $col=>$val){
			if(!empty($val))
				$query = $query ."$col='". $val . "',";
		}
		$query = substr($query, 0, -1);
		
		try {
			//$dbh = $this->getConnection();
			//if(!isset($dbh)) exit('No connection');				
			if($this->DBH == null) exit;
			$stmt = $this->DBH->prepare($query);
			$stmt->execute();
			$resp['error'] =  false;
			$resp['msg'] =  "SUCCESS";
		} catch(PDOException $err){
			$resp['error'] =  true;
			$resp['error_msg'] =  $err->getMessage()."==>".$query;
		}
		return $resp;
	}
	
	public function delete($table, $key='', $value=''){
		$query = "DELETE FROM $table ";
		if(!empty($key)) $query = $query." WHERE $key='$value' ";
		try {
			//$dbh = $this->getConnection();
			//if(!isset($dbh)) exit('No connection');				
			if($this->DBH == null) exit;
			$stmt = $this->DBH->prepare($query);
			$stmt->execute();
			
			$resp['error'] =  false;
			$resp['msg'] =  $stmt->rowcount();
		} catch(PDOException $err){
			$resp['error'] =  true;
			$resp['error_msg'] =  $err->getMessage();
		}
		$dbh = null;
		return $resp;
	}
}
?>