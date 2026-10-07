<?php
	class Ftp extends Controller{
		public $Model = 'mMenu';
		public function index(){
			//$this->view('Header');
			$this->view('Menu', $this->model($this->Model)->get());
			$this->view('vFtp');
			$this->view('Footer');
		}
	}
	
?>