<?php
	class Content extends Controller{
		private $Model = 'mContent';
		
		public function index($category, $doc=''){
			$this->view('Menu', $this->model('mMenu')->get());
			//var_dump($_GET);
			//var_dump($doc);
			//var_dump($doc2);
			//echo $category."<br>";
			//var_dump($this->model($this->Model)->get('category', $category));
			$data = $this->model($this->Model)->get('category', $category);
			$data['category'] = $category;
			$data['doc'] = $doc;
			//var_dump($data);
			$this->view('Content', $data);
			$this->view('Footer');
		}
	}
	
?>