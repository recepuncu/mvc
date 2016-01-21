<?php

class Controller {	
	
	function getCallingObject() 
	{		
		$trace = debug_backtrace();
		$class = $trace[1]['class'];
		for ( $i=1; $i<count( $trace ); $i++ ) {
			if ( isset( $trace[$i] ) ){
				 if ( $class != $trace[$i]['class'] ){
					$result['class']=$trace[$i]['class'];
					$result['function']=$trace[$i]['function'];
					return $result;
				 }
			}
		}
	}
	
	public function Model($modelName)
	{
		$result=null;
		$viewName = $this->getCallingObject();
		$modelFile = "Models/{$modelName}.php";	
		if(!file_exists($modelFile)){
			die('model dosyası bulunamadı!');
		}else{
            require_once($modelFile);
			$class = "{$viewName['class']}Model";
			$result = new $class;
		}
		return $result;
	}	
	
	public function View($model=null)
	{
		$viewName = $this->getCallingObject();
		$viewFile = "Views/{$viewName['class']}/{$viewName['function']}.php";
		if(!file_exists($viewFile)){
			die('view dosyası bulunamadı!');
		}else{
            include($viewFile);
		}
	}
	
}