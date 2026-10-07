<?php
class Model extends Db {
	private $uri = 'http://oce-media.s-net.id:888/api/elearning/?class=';
	public function select($table, $key='', $value=''){
		$query = "SELECT * FROM $table ";
		if(!empty($key)) $query = $query." WHERE $key='$value' ";
		//$query = $query." ORDER BY 1 ";
		try {
			//$dbh = $this->getConnection();
			//if(!isset($dbh)) exit('No connection');				
			if($this->DBH == null) exit;
			$stmt = $this->DBH->prepare($query);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if(empty($result)) {
				$stmt = $this->DBH->query("DESCRIBE $table");
				//$stmt = $this->DBH->query($query);
				$res = $stmt->fetchAll(PDO::FETCH_COLUMN);
				foreach($res as $row) $restmp[$row] = null; 
				$result[0] = $restmp; 
			}
			$resp['error'] =  false;
			$resp['table'] =  $table;
			$resp['msg'] =  $result;
		} catch(PDOException $err){
			$resp['error'] =  true;
			$resp['error_msg'] =  $err->getMessage().'-->'.$query;
		}
		$dbh = null;
		return $resp;
	}
	
	public function query($table, $sarat='') {
		$query = "SELECT DISTINCT * FROM $table ";
		if(!empty($sarat)) $query = $query." WHERE $sarat ";
		try {
			if($this->DBH == null) exit;
			$stmt = $this->DBH->prepare($query);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if(empty($result)) {
				$stmt = $this->DBH->query("DESCRIBE $table");
				$res = $stmt->fetchAll(PDO::FETCH_COLUMN);
				foreach($res as $row) $restmp[$row] = null; 
				$result[0] = $restmp; 
			}
			$resp['error'] =  false;
			$resp['table'] =  $table;
			$resp['msg'] =  $result;
		} catch(PDOException $err){
			$resp['error'] =  true;
			$resp['error_msg'] =  $err->getMessage().'-->'.$query;
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
			//if(!empty($val))
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
			$resp['error_msg'] =  $err->getMessage();//."==>".$query;
		}
		return $resp;
	}
	
	public function delete($table, $key, $value){
		$query = "DELETE FROM $table WHERE $key='$value'";
		//$query = $query." WHERE $key='$value' ";
		
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
			$resp['error_msg'] =  $err->getMessage().'=>'.$query;
		}
		$dbh = null;
		return $resp;
	}
	
	public function apiget($class, $key='', $value=''){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->uri.$class.'/get/'.$key.'/'.$value);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		$resp = json_decode($output,true);
		return $resp;
	}
	
	public function apiinsert($class, $data){
		$fields_string = http_build_query($data);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->uri.$class.'/insert/');
		curl_setopt($ch,CURLOPT_POST, true);
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		$resp = json_decode($output,true);
		return $resp;
	}
}
?>