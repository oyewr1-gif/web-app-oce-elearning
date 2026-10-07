<?php
	class Ebook extends Controller{
		public function index(){
			$this->view('Menu', $this->model('mMenu')->get());
			$this->view('ebook');
			$this->view('Footer');
		}
	}
	
?>