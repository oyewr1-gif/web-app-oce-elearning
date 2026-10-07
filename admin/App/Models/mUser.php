<?php
class mUser extends Model {
	private $Table = 'user';
	public function get($key='', $value=''){
		$resp = $this->select($this->Table, $key, $value);
		return $resp;
	}
	
	public function del($key, $value){
		$resp = $this->delete($this->Table, $key, $value);
		return $resp;
	}
	
	public function append($data){
		$resp = $this->insert($this->Table,$data);
		return $resp;
	}
}
?>