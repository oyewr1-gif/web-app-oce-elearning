<?php
	class cGrades extends Controller{
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
				$this->view('vQuizTitle', $this->model($this->Model)->get());
			}
			$this->view('Footer');
		}
		
		public function showQuiz($key, $val) {
			$this->view('Menu', $this->model('mMenu')->get());
			$this->view('vGrades', $this->model($this->Model)->getGrades($val));
			$this->view('Footer');
		}
		
		public function showAnswer($titleid,$userid) {
			$ans =[];
			$this->view('Menu', $this->model('mMenu')->get());
			
			$this->view('vGrades', $this->model($this->Model)->getGrades($titleid,$userid));
			$this->view('Footer');
		}
		public function showRekap($titleid) {
			$this->view('Menu', $this->model('mMenu')->get());
			$this->view('rekap', $this->model($this->Model)->getRekap($titleid));
			$this->view('Footer');
		}
		
		public function batal() {
			$this->view('Head');
			unset($_SESSION['QuizTitleId']);
			$this->index();
		}
	}
?>