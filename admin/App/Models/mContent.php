<?php
class mContent extends Model {
	private $Table = 'content';
	public function get($key='', $value=''){
		$resp = $this->select($this->Table, $key, $value);
		return $resp;
	}
	
	public function del($key, $value){
		$resp = $this->delete($this->Table, $key, $value);
		return $resp;
	}
}
?>