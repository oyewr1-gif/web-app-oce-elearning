<?php
	class cLogout extends Controller{
		public function index(){
			$this->view('Header');
			unset($_SESSION['admin']);
			//session_unset();
			//session_destroy();
			//session_write_close();
			//setcookie(session_name(),'',0,'/');
			header('location:../admin');
			//$this->view('Home');
			//$this->view('Footer');
			
		}
	}
?>