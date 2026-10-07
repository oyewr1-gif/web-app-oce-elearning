<?php
class mJobsheet extends Model {
	private $Quiz = 'quiz';
	private $QuizTitle = 'jobsheet';
	private $QuizAns = 'quiz_ans';
	private $QuizOpt = 'quiz_option';
	private $apiClass = 'Quiz';
	public function getTitle($key='', $value=''){
		$resp = $this->select($this->QuizTitle, $key, $value);
		return $resp;
	}
	public function getQuiz($key='', $value=''){
		$resp = $this->select($this->Quiz, $key, $value);
		return $resp;
	}
	public function getOpt($key='', $value=''){
		$resp = $this->select($this->QuizOpt, $key, $value);
		return $resp;
	}
	public function getAns($key='', $value=''){
		$resp = $this->select($this->QuizAns, $key, $value);
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