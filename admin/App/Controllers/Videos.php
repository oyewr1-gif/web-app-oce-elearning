<?php
	class Videos extends Controller{
		public function index(){
			//$this->view('Header');
			$this->view('Menu', $this->model('mMenu')->get('menu'));
			$this->view('videos');
			$this->view('Footer');
		}
	}
	
?>