<?php
class User extends Controller{
	public $Model = 'mUser';
	public function index(){
		//$this->view('Header');
		//$this->view('Menu', $data);
		$this->view('Menu', $this->model('mMenu')->aget());
		print_r($this->model($this->Model)->aget());
		$this->view('Footer');
	}
}
?>