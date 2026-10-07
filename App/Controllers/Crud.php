<?php
class Crud extends Controller{
	private $Model='mForm';
	public function index($table,$key='',$value=''){
		$data = $this->model($this->Model)->get($table,$key,$value);
		$this->view('Menu',$this->model('mMenu')->get());
		$this->view('Crud',$data);
		$this->view('footer');
	}
}
?>