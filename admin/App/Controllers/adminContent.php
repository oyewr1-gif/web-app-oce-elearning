<?php
	class adminContent extends Controller{
		public $Model = 'mContent';
		public function index(){
			$this->view('Header');
			$this->view('crud', $this->model($this->Model)->get());
			$this->view('Home');
			$this->view('Footer');
		}
	}
	
?>