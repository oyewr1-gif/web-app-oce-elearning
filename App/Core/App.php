<?php
	class App{
		protected $controller = 'Home';
		protected $method = 'index';
		protected $params = [];
		
		public function __construct(){
			//echo 'App.php<br>';
			//class
			$url=$this->parseurl();
			if(isset($url))
			if(file_exists('App/Controllers/'.$url[0].'.php')){
				$this->controller=$url[0];
				unset($url[0]);
				//var_dump($url);
			}
			require_once 'App/Controllers/'.$this->controller.'.php';
			$this->controller=new $this->controller;
			//method
			if(isset($url[1])){
				if(method_exists($this->controller, $url[1])){
					$this->method=$url[1];
					unset($url[1]);
					//var_dump($url);
				}
			}
			if(!empty($url)) $this->params=array_values($url);
			$request_method=$_SERVER["REQUEST_METHOD"];
			//echo $request_method;
			switch ($request_method) {
				case 'GET':
					//var_dump($this->params);
					if(!empty($url)){
						call_user_func_array([$this->controller, $this->method], $this->params);
					}
					else {
						call_user_func_array([$this->controller, $this->method], $this->params);
					}
					break;
				case 'POST':
					//var_dump($_POST);
					call_user_func([$this->controller, $this->method], $_POST);
					//var_dump($this->params);
					break; 	
				case 'PUT':
					//var_dump($this->params);
					parse_str(file_get_contents('php://input'), $_PUT); 
					//var_dump($_PUT);
					if(!empty($url)){
						$key=$this->params[0];
						$value=$this->params[1];
						$keys=array_merge($_PUT, array("key"=>"$key", "value"=>"$value"));
						//var_dump($keys);
						call_user_func([$this->controller, $this->method], $keys);
					}
					else {
						call_user_func_array([$this->controller, $this->method], $_PUT);
					}
					break; 	
				case 'DELETE':
					call_user_func_array([$this->controller, $this->method], $this->params);
					break;
				default:
					// Invalid Request Method
					header("HTTP/1.0 405 Method Not Allowed");
					break;
			}
		}
		public function parseUrl(){
			if(isset($_GET['class'])){
				$url = $_GET['class'];
				$url = filter_var($url, FILTER_SANITIZE_URL);
				$url = explode("/", $url);
				return $url;
			}
		}
	}
?>