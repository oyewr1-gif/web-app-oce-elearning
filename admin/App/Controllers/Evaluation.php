<?php
	class Evaluation extends Controller{
		public function index(){
			//$this->view('Header');
			$this->view('Menu', $this->model('mMenu')->get('menu'));
			$this->view('evaluation');
			$this->view('Footer');
		}
	}
	
?>