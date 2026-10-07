<?php
	class cEbook extends Controller{
		public $Model = 'mEbook';
		private $Table = '';
		public function index(){
			//$this->view('Header');
			$this->view('Menu', $this->model('mMenu')->get());
			if(!isset($_SESSION['level'])) {
				?>
				<div class='warning'>
					Silahkan login!
				</div>
				<?php
			} else
			if($_SESSION['level']<'2'){
				?>
				<div class='warning'>
					Silahkan login!
				</div>
				<?php
			} else {
				$this->view('Crud', $this->model($this->Model)->get());
			}
			$this->view('Footer');
		}
		public function hapus($table, $key, $value){
			$resp = $this->model($this->Model)->del($table, $key, $value);
			if(!$resp['error'])
				header("location:?class=".get_class($this));
		}
		
		public function simpan($data){
			$this->Table = $data['table'];
			$filename = $_FILES["filename"]["name"];
			unset($data['table']);
			$resp = $this->model($this->Model)->insert($this->Table,$data);
			//print_r($data);
			if(!$resp['error']) {
				$target_dir = "public/documents/ebook/";
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