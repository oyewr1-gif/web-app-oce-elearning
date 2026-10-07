<?php
class mAnnounce extends Model {
	private $Table = 'announce';
	
	public function get($key='', $value=''){
		$resp = $this->select($this->Table, $key, $value);
		return $resp;
	}
	
	public function del($key, $value){
		$resp = $this->delete($this->Table, $key, $value);
		return $resp;
	}
	
	public function aget($key='', $value=''){
		$resp = $this->apiget($this->apiClass, $key, $value);
		return $resp;
	}
	
	public function append($data){
		$resp = $this->insert($this->Table,$data);
		return $resp;
	}
}
?>