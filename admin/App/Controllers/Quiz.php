<?php
	class Quiz extends Controller{
		public function index(){
			//$this->view('Header');
			$this->view('Menu', $this->model('mMenu')->get('menu'));
			$this->view('quiz');
			$this->view('Footer');
		}
	}
	
?>