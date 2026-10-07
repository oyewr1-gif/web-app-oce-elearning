<?php
	class Controller{
		public function Model($model){
			require_once "App/Models/$model".'.php';
			return new $model;
		}
		public function View($view, $data=[]){
			require_once "App/Views/$view".'.php';
			//return new $view;
		}
		
		public function fileCheck($filename){
			$uploadOk = 0;
			$mime = mime_content_type($filename);
			/*if(strstr($mime, ".pdf"))
			if ($_FILES["filename"]["size"] <= 5000000) {
				$uploadOk = 1;
			}*/
			/*if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["filename"]["tmp_name"]);
				if($check !== false) {
					//echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					//echo "File is not an image.";
					$uploadOk = 0;
				}
			}*/
			return $uploadOk;
		}
	}
?>