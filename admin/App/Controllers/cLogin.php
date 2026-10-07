<?php
	class cLogin extends Controller{
		public $Model = 'mUser';
		public function index(){
			$this->view('Header');
			$users=$this->model($this->Model)->get('nama',$_POST['uname']);
			//$users=$this->model('mMenu')->get('user','nama',$_POST['uname']);
			//var_dump($users); echo "<br>";
			//var_dump($_POST); echo "<br>";
			if($users['error'])
				echo $users['error_msg'];
			else {
				$user=$users['msg'];
				//var_dump($user); echo "<br>";
				if(empty($users['msg']))
					echo "User atu password tidak ditemukan";
				else
					if($user[0]['password']!=$_POST['psw'])
						echo "User atau password tidak ditemukan atau salah";
					else {
						if($user[0]['level']>2) {
							$_SESSION['admin']=$user[0]['nama'];
							header('location:./');
						} else
							echo "User ".$user[0]['nama']." tidak berhak!";
					}
			}
			$this->view('Footer');
		}
	}
	
?>