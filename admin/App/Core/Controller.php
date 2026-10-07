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
	}
?>