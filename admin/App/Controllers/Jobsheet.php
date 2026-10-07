<?php
	class Jobsheet extends Controller{
		public function index(){
			//$this->view('Header');
			$this->view('Menu', $this->model('mMenu')->get('menu'));
			$this->view('jobsheet');
			$this->view('Footer');
		}
	}
	
?>