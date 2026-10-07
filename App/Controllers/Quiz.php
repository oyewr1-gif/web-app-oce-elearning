<?php
	class Quiz extends Controller{
		public $Model = 'mQuiz';
		public function index(){
			$this->view('Head');
			
				if(isset($_SESSION['QuizTitleId']))
					$this->showQuiz('title_id', $_SESSION['QuizTitleId']);
				else
					$this->view('QuizTitle', $this->model($this->Model)->get());//$this->view('Footer');
			$this->view('Foot');
		}
		public function showQuiz($key='', $val='') {
			$this->view('Head');
			if(!isset($_SESSION['level'])) {
				?>
				<div class='warning'>
					Silahkan login!
				</div>
				<?php
			} else {
				//var_dump($_GET);
			//echo $key." = ".$val."<br>";
			$_SESSION['QuizTitleId'] = $val;
			$data['userid'] = $_SESSION['user_id'];
			$data['title'] = $this->model($this->Model)->get($key, $val);
			$data['quizs'] = $this->model($this->Model)->getQuiz($key, $val);
			//$optsKey = array_keys($data['quizs']['msg'][0])[0];
			//$optsVal = $data['quizs']['msg'][0][$optsKey];
			//var_dump($data['quizs']['msg'][0]);
			//echo $optsKey."<br>";
			//echo $optsVal."<br>";
			//$data['opts'] = $this->model($this->Model)->getOpts($optsKey, $optsVal);
			$this->view('Quiz', $data);
			}
			$this->view('Foot');
		}
		public function batal() {
			$this->view('Head');
			unset($_SESSION['QuizTitleId']);
			$this->index();
		}
		
		public function simpan($data) {
			//echo 'simpan';
			//var_dump($data);
			$table = $data['table'];
			unset($data['table']);
			$resp = $this->model($this->Model)->append($table, $data);
			if($resp['error'])  $resp = $resp['error_msg']; else $resp = $resp['msg'];
			echo $resp;
		}
	}
	
?>