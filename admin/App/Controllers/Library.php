<?php
	class Library extends Controller{
		public function index(){
			//$this->view('Header');
			$this->view('Menu', $this->model('mMenu')->get('menu'));
			$this->view('library');
			$this->view('Footer');
		}
	}
	
?>