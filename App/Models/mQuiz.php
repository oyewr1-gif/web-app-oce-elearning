<?php
class mQuiz extends Model {
	private $Quiz = 'quiz';
	private $QuizTitle = 'quiz_title';
	private $QuizAns = 'quiz_ans';
	private $QuizOpt = 'quiz_option';
	private $apiClass = 'Quiz';
	
	public function get($key='', $value=''){
		$resp = $this->select($this->QuizTitle, $key, $value);
		return $resp;
	}
	public function getQuiz($key='', $value=''){
		$resp = $this->select($this->Quiz, $key, $value);
		return $resp;
	}
	public function getOpts($key='', $value=''){
		$resp = $this->select($this->QuizOpt, $key, $value);
		return $resp;
	}
	public function getAns($key='', $value=''){
		$resp = $this->select($this->QuizAns, $key, $value);
		return $resp;
	}
	public function getAnswer($key='', $value=''){
		$resp = $this->select('quiz_answer', $key, $value);
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
	public function getAnswerName($titleid='', $userid='') {
		$table = 'quiz_answer';
		$query = "SELECT $table.title_id title_id,$table.user_id user_id,NAMA,$table.quiz_id quiz_id, quiz_txt,ans, quiz_option.opt_text ";
		$query = $query." FROM $table ";
		$query = $query." LEFT JOIN user ON user.user_id=$table.user_id";
		$query = $query." LEFT JOIN quiz ON quiz.quiz_id=$table.quiz_id ";
		$query = $query." LEFT JOIN quiz_option ON quiz_option.opt_id=$table.ans ";
		if(!empty($titleid)) $query = $query." WHERE $table.title_id='$titleid' ";
		if(!empty($userid)) $query = $query." AND $table.user_id='$userid' ";
		$query = $query." ORDER BY  nama, $table.quiz_id ";
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
	public function getAnsName($titleid='', $userid=''){
		$table = 'quiz_ans';
		$query = "SELECT $table.title_id title_id,$table.quiz_id quiz_id, quiz_txt,ans, quiz_option.opt_text ";
		$query = $query." FROM $table ";
		$query = $query." LEFT JOIN quiz ON quiz.quiz_id=$table.quiz_id ";
		$query = $query." LEFT JOIN quiz_option ON quiz_option.opt_id=$table.ans ";
		if(!empty($titleid)) $query = $query." WHERE $table.title_id='$titleid' ";
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
	public function getGrades($titleid='', $userid='') {
		//$data['user'] = $this->Model('mUser')->getName();
		$data['answer'] = $this->getAnswerName($titleid, $userid);
		$data['ans'] = $this->getAnsName($titleid);
		$data['title'] = $this->get('title_id', $titleid)['msg'][0];
		if(isset($data['answer']['error']))
				if($data['answer']['error']) {
					echo $data['answer']['error_msg'];
					exit;
				}
		if(isset($data['ans']['error']))
				if($data['ans']['error']) {
					echo $data['ans']['error_msg'];
					exit;
				}
		if(isset($data['answer']['msg']))
				$data['answer'] = $data['answer']['msg'];
		if(isset($data['ans']['msg']))
				$data['ans'] = $data['ans']['msg'];
		//Count Scoring
		$ans = array();
		foreach($data['ans'] as $rows) {
				$ans[$rows['quiz_id']] = $rows['ans'];
			}
		$answer = array();
		foreach($data['answer'] as $rows) {
				$answer[$rows['quiz_id']] = $rows['ans'];
			}
		$grades = array_intersect($answer,$ans);
		$data['grades'] = $grades;
		$data['key'] = $ans;
		
		return $data;
	}
	
	public function getRekap($titleid) {
		$answer = $this->getAnswerName($titleid)['msg'];
		$ans = $this->getAns('title_id', $titleid)['msg'];
		//var_dump($answer);
		$tmp = $tmp2 = [];
		$previ = '';
		foreach($answer as $rows) {
			if(!empty($previ))
			if($rows['NAMA'] != $previ) {
				$tmp[] = $tmp2;
				unset($tmp2);
			} 
			$tmp2['NAMA'] = $rows['NAMA'];
			$tmp2[$rows['quiz_id']] = $rows['ans'];
			//echo "<br>".$rows['NAMA']." = ".$previ."=".$rows['ans'];
			$previ = $rows['NAMA'];			
		}
		$tmp[] = $tmp2;
		//echo "<br>tmp=  ";
		//var_dump($tmp);
		$data['answer'] = $tmp;
		$ans = $this->getAnsName($titleid)['msg'];
		$key_values = array_column($ans, 'quiz_id'); 
		array_multisort($key_values, SORT_ASC, $ans);
		$qid = array();
		foreach($ans as $rows) {
				$qid[$rows['quiz_id']] = $rows['ans'];
			}
		$data['ans'] = $qid;
		//var_dump($data['ans']);
		$data['title'] = $this->get('title_id', $titleid)['msg'][0];
		//Count Scoring
		$answer = $score = array();
		foreach($data['answer'] as $rows) {
			unset($answer);
			foreach($rows as $col=>$val)
				if($col!='NAMA')
					$answer[] = $val;
			$score[$rows['NAMA']] = $answer;
		}
			
		$data['grades'] = $score;
		return $data;
	}
}
?>