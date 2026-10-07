<?php
	class adminMenu extends Controller{
		public $Model = 'mMenu';
		public function index(){
			$this->view('Header');
			$this->view('crud', $this->model($this->Model)->get());
			$this->view('Home');
			$this->view('Footer');
		}
	}
	
?>