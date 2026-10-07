<?php
class mApersepsi extends Model {
	private $Quiz = 'apersepsi';
	
	public function get($key='', $value=''){
		$resp = $this->select($this->Quiz, $key, $value);
		return $resp;
	}
	
	public function del($table, $key, $value){
		$resp = $this->delete($table, $key, $value);
		return $resp;
	}
	
	public function aget($key='', $value=''){
		$resp = $this->apiget($this->apiClass, $key, $value);
		return $resp;
	}
	
	public function append($table, $data){
		$resp = $this->insert($table,$data);
		return $resp;
	}
}
?>