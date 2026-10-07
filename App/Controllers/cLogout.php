<?php
	class cLogout extends Controller{
		public function index(){
			$this->view('Menu', $this->model('mMenu')->get());
			unset($_SESSION['user_id']);
			unset($_SESSION['username']);
			unset($_SESSION['level']);
			//session_unset();
			//session_destroy();
			//session_write_close();
			//setcookie(session_name(),'',0,'/');
			header('location:./');
			//$this->view('Home');
			//$this->view('Footer');
			
		}
	}
?>