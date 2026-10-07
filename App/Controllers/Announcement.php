<?php
	class Announcement extends Controller{
		public $Model = 'mAnnounce';
		private $Table = '';
		public function index(){
			$this->view('Menu', $this->model('mMenu')->get());
			if(!isset($_SESSION['level'])) {
				?>
				<div class='warning'>
					Silahkan login!
				</div>
				<?php
			} else
			if($_SESSION['level']<'2'){
				$data = $this->model($this->Model)->get();
				$this->view('announcement', $data);
			} else {
				if(isset($_SESSION['cQuizTitleId']))
					$this->showQuiz('title_id', $_SESSION['cQuizTitleId']);
				else
					$this->view('vQuizTitle', $this->model($this->Model)->get());
			}
			/*if(isset($_SESSION['level'])) 
				$this->view('Crud', $this->model($this->Model)->get());
			else {
				$data = $this->model($this->Model)->get();
				$this->view('announcement', $data);
			}*/
			$this->view('Footer');
		}
		
		public function hapus($table, $key, $value){
			$resp = $this->model($this->Model)->del($key, $value);
			if(!$resp['error'])
				header("location:?class=".get_class($this));
		}
		
		public function simpan($data){
			//print_r($data);
			$this->Table = $data['table'];
			$filename = $_FILES["filename"]["name"];
			unset($data['table']);
			$resp = $this->model($this->Model)->insert($this->Table,$data);
			//print_r($data);
			if(!$resp['error']) {
				$target_dir = "public/documents/evaluation/";
				$target_file = $target_dir . basename($_FILES["filename"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				//$uploadOk = $this->fileCheck($filename);
				header("location:?class=".get_class($this));
				if(!empty($filename))
				if($uploadOk){
					if (move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file)) {
						echo "The file ". htmlspecialchars( basename( $_FILES["filename"]["name"])). " has been uploaded.";
					} else {
						echo "Sorry, there was an error uploading your file.";
					}
				}
			} else
				print_r( $resp);
		}
	}
	
?>