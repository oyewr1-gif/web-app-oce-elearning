<?php
class Form extends Controller{
	private $Model='mForm';
	public function index($table,$key='',$value=''){
		$data = $this->model($this->Model)->apiget($table,$key,$value);
		$this->view('Menu',$this->model('mMenu')->aget());
		$this->view('Form',$data);
		$this->view('footer');
	}
}
?>