<?php
	class cAbout extends Controller{
		public function index(){
			$this->view('Menu', $this->model('mMenu')->get());
			$this->view('About');
			$this->view('Footer');
		}
	}
	
?>