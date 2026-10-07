<?php
	class Jobsheet extends Controller{
		public $Model = 'mJobsheet';
		public function index(){
			//$this->view('Header');
			$this->view('Menu', $this->model('mMenu')->get());
			$this->view('jobsheet', $this->model($this->Model)->getTitle());
			$this->view('Footer');
		}
	}
	
?>