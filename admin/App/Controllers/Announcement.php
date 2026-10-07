<?php
	class Announcement extends Controller{
		public function index(){
			$this->view('Menu', $this->model('mMenu')->get('menu'));
			$this->view('announcement');
			$this->view('Footer');
		}
	}
	
?>