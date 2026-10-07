<?php
	class Home extends Controller{
		public function index(){
			$this->view('Header');
			//$this->view('Menu', $this->model('mMenu')->get('menu'));
			if(isset($_SESSION['admin'])){
				$this->view('Home',$this->model('mMenu')->get('user'));
			} else {
				$this->view('Login',$this->model('mMenu')->get('user'));
			}
			$this->view('Footer');
		}
	}
	
?>