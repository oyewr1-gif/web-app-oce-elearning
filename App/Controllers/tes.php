<?php
	class tTes extends Controller{
		public function index(){
			$this->view('Header');
			$this->view('tes', $this->model('tes')->get('menu'));
			$this->view('Footer');
		}
	}
	
?>