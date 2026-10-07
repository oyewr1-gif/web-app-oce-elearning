<?php
	class cMenu extends Controller{
		public $Model = 'mMenu';
		public function index(){
			$this->view('Menu', $this->model($this->Model)->get());
			//$this->view('ebook');
			//$this->view('Footer');
		}
	}
	
?>