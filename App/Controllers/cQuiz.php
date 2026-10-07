<?php
	class cQuiz extends Controller{
		public $Model = 'mQuiz';
		
		public function index(){
			$this->view('Menu', $this->model('mMenu')->get());
			//var_dump($_SESSION);
			if(!isset($_SESSION['level'])) {
				?>
				<div class='warning'>
					Silahkan login!
				</div>
				<?php
			} else
			if($_SESSION['level']<'2'){
				?>
				<div class='warning'>
					Silahkan login sebagai guru!
				</div>
				<?php
			} else {
				if(isset($_SESSION['cQuizTitleId']))
					$this->showQuiz('title_id', $_SESSION['cQuizTitleId']);
				else
					$this->view('vQuizTitle', $this->model($this->Model)->get());
			}
			$this->view('Footer');
		}
		
		public function showQuiz($key='', $val='') {
			$this->view('Menu', $this->model('mMenu')->get());
			//var_dump($_GET);
			//echo $key." = ".$val."<br>";
			$_SESSION['cQuizTitleId'] = $val;
			$data['title'] = $this->model($this->Model)->get($key, $val);
			$data['quizs'] = $this->model($this->Model)->getQuiz($key, $val);
			//$optsKey = array_keys($data['quizs']['msg'][0])[0];
			//$optsVal = $data['quizs']['msg'][0][$optsKey];
			//var_dump($data['quizs']['msg'][0]);
			//echo $optsKey."<br>";
			//echo $optsVal."<br>";
			//$data['opts'] = $this->model($this->Model)->getOpts($optsKey, $optsVal);
			$this->view('vQuiz', $data);
			$this->view('Footer');
		}
		
		public function toSpreadsheet($key='', $val='') {
			$this->view('Menu', $this->model('mMenu')->get());
			$data['title'] = $this->model($this->Model)->get($key, $val);
			$data['quizs'] = $this->model($this->Model)->getQuiz($key, $val);
			$this->view('toSpreadsheet', $data);
			$this->view('Footer');
		}
		
		public function simpan($data) {
			$this->view('Menu', $this->model('mMenu')->get());
			$table = $data['table'];
			unset($data['table']);
			//var_dump($data);
			$key = array_keys($data);
			if(empty($data[$key[1]])) {
				echo "<br>Empty";
			} else {
				$resp = $this->model($this->Model)->append($table, $data);
				if($resp['error']) echo $resp['error_msg'];
			}
			$this->index();
			$this->view('Footer');
		}
		
		public function simpanquiz($data) {
			$this->view('Menu', $this->model('mMenu')->get());
			//var_dump($data);
			$table = $data['table'];
			if(isset($data['ans_id'])) unset ($data['ans_id']);
			unset($data['table']);
			$resp = $this->model($this->Model)->append($table, $data);
			if($resp['error']) 
				echo $resp['error_msg'];
			else
				$this->index();
			$this->view('Footer');
		}
		
		public function simpanOpt($data) {
			//echo 'simpan';
			//var_dump($data);
			$table = $data['table'];
			unset($data['table']);
			$resp = $this->model($this->Model)->append($table, $data);
			if($resp['error']) 
				echo $resp['error_msg']; 
			else 
				echo $resp['msg'];
		}
		
		public function batal() {
			$this->view('Menu', $this->model('mMenu')->get());
			unset($_SESSION['cQuizTitleId']);
			$this->index();
			$this->view('Footer');
		}
		
		public function hapus($table, $key, $value){
			$resp = $this->model($this->Model)->del($table, $key, $value);
			if(!$resp['error'])
				header("location:?class=".get_class($this));
			else 
				print_r($resp); 
		}
		
		public function save($data) {
			//echo 'simpan';
			//var_dump($data);
			$table = $data['table'];
			unset($data['table']);
			$resp = $this->model($this->Model)->append($table, $data);
			if($resp['error']) 
				echo $resp['error_msg']; 
			else 
				echo $resp['msg'];
		}
		public function tes($data) {
			echo "OK";
		}
	}
	
?>