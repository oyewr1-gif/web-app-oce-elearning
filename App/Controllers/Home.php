<?php
	class Home extends Controller{
		public $Model = 'mMenu';
		public function index(){
			//$this->view('Header');
			$this->view('Menu', $this->model($this->Model)->get());
			$this->view('Home');
			$this->view('Footer');
		}
	}
	
?>