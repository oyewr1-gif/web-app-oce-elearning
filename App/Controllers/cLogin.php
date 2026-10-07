<?php
	class cLogin extends Controller{
		public $Model = 'mUser';
		public function index(){
			/*session_name('elearning_session');
			ob_start();
			session_start();*/
			//print_r($_POST);
			$this->view('Menu', $this->model('mMenu')->get());
			if(empty($_POST['uname'])){
				header('location:./');
				//exit;
			}
			$users=$this->model($this->Model)->get('nama',$_POST['uname']);
			//$users=$this->model('mMenu')->get('user','nama',$_POST['uname']);
			//var_dump($users); echo "<br>";
			//var_dump($_POST); echo "<br>";
			if($users['error'])
				echo $users['error_msg'];
			else {
				$user=$users['msg'];
				//var_dump($user); echo "<br>";
				if(empty($users['msg'])){
					echo "<div class='popup'>";
					echo "User atau password tidak ditemukan<br><br>";
					echo "<a href='?class=".get_class($this)."' class='crud2'>OK</a>";
					echo "</div>";
				} else
					if($user[0]['password']!=$_POST['pwd'])
						echo "User/ password tidak ditemukan atau salah";
					else {
						$_SESSION['username']=$user[0]['nama'];
						$_SESSION['user_id']=$user[0]['user_id'];
						$_SESSION['level']=$user[0]['level'];
					}
			}
			header('location:./');
			//$this->view('Footer');
		}
	}
	
?>