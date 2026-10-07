<?php
class mUser extends Model {
	private $Table = 'user';
	private $apiClass = 'User';
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
	public function getName($key='', $val='') {
		$user = $this->select($this->Table, $key, $val)['msg'];
		$uname = array();
		foreach($user as $rows)
			$uname[$rows['user_id']] = $rows['nama'];
		$resp = $uname;
		return $resp;
	}
}
?>