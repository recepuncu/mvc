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
	
	public function View($model=null)
	{		
		$viewName = $this->getCallingObject();
		$viewFile = "Views/{$viewName['class']}/{$viewName['function']}.php";
		if(!file_exists($viewFile)){
			die('dosya bulunamadı!');
		}else{
            ob_start();
			include($viewFile);
            $view = ob_get_clean();
            
			$sablon="|@{(.*)}|s";
            preg_match_all($sablon, $view, $matches);
            $getProperties = explode(';', $matches[1][0]);
            
            $pageResult = preg_replace($sablon, '', $view);            
            echo $pageResult;            
            print_r($getProperties);
		}
	}
	
}