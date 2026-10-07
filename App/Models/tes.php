<?php
class tes extends Model {
	public function apiGet($table, $key='', $value=''){
		$url = 'http://Ooce-media.s-net.id:888/api/elearning/get';
		if(!empty($key)) $url = $url . "/$key/$value";
		$response = file_get_contents($url);
		$data = json_decode($response, TRUE);
		$data['action'] = FALSE;
	}
}
?>