<?php

class Application
{	
	private $controller = null;
	private $action = null;
	private $data = array();
	
	function __construct($defaultController=NULL)
	{
		$this->MapRoute($defaultController);
		$this->Application_Start();
	}
		
	public function DefaultController($defaultController)
	{
		$this->defaultController=$defaultController;
	}
	
	function MapRoute($defaultController)
	{
		$uri = rtrim(dirname($_SERVER["SCRIPT_NAME"]),'/');
		$uri = trim(str_replace($uri,'',$_SERVER['REQUEST_URI'] ),'/');
		$uri = urldecode($uri);		
		$url = explode('/',$uri);
		if(empty($url[0])){
			$this->controller=$defaultController;
		}elseif(!empty($url[0])){
			$this->controller = array_key_exists(0, $url) ? $url[0] : NULL;
			$this->action = array_key_exists(1, $url) ? $url[1] : NULL;
			if(count($url)>=3){
				for ($i = 2; $i <= (count($url)-1); $i++) {
					$this->data[] = array_key_exists($i, $url) ? $url[$i] : NULL;
				}
			}
		}
		
	}
	
	function Application_Start()
	{ 
		$class = $this->controller;
		if(!file_exists("Controllers/$class.php")){
			die("Controller dosyası bulunamadı: $class");
		}else{
			require_once("Controllers/$class.php");
			if (!class_exists($class, false)) {
				die("Controller içerisinde class bulunamadı: $class");		
			}else{
				$controller = new $class();
				$action = $this->action;
				if (!empty($action) && !method_exists($controller, $action)) {
					die("Controller class içerisinde function bulunamadı: $action");
				}elseif(!empty($action) && method_exists($controller, $action)){
					call_user_func_array(array($controller, $action), $this->data);
				}
			}
		}
	}
	
}