<?php
	class adminUser extends Controller{
		public $Model = 'mUser';
		public function index(){
			$this->view('Header');
			$this->view('crud', $this->model($this->Model)->get());
			$this->view('Home');
			$this->view('Footer');
		}
		
		
	}
	
?>