<?php
	class cContent extends Controller{
		public $Model = 'mContent';
		
		public function index($model=''){
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
				if(!empty($model)) $this->Model = $model;
				$this->view('crud', $this->model($this->Model)->get());
			}
			$this->view('Footer');
		}
		
		public function hapus($table, $key, $value){
			$resp = $this->model($this->Model)->del($key, $value);
			if(!$resp['error'])
				header("location:?class=".get_class($this));
			else 
				print_r($resp); 
		}
		
		public function simpan($data){
			//$this->Table = $data['table'];
			$filename = $_FILES["filename"]["name"];
			unset($data['table']);
			$resp = $this->model($this->Model)->append($data);
			//print_r($data);
			if(!$resp['error']) {
				$target_dir = "public/documents/".$data['category']."/";
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
				print_r($resp);
		}
	}
	
?>