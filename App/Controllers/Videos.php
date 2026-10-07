<?php
	class Videos extends Controller{
		public function index(){
			//$this->view('Header');
			$this->view('Menu', $this->model('mMenu')->get());
			$this->view('videos');
			$this->view('Footer');
		}
	}
	
?>