<?php
	class Ebook extends Controller{
		public function index(){
			$this->view('Menu', $this->model('mMenu')->get('menu'));
			$this->view('ebook');
			$this->view('Footer');
		}
	}
	
?>