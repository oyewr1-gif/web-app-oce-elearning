<?php
class mMenu extends Model {
	private $Table = 'menu';
	private $apiClass = 'Menu';
	public function get($key='', $value=''){
		$resp = $this->select($this->Table, $key, $value);
		return $resp;
	}
	public function aget($key='', $value=''){
		$resp = $this->apiget($this->apiClass, $key, $value);
		return $resp;
	}
}
?>