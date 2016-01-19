<?php

class Home extends Controller {
    
	function Index()
	{		
		$model = array('foo','bar');
		return parent::View($model);
	}
	
	function Welcome()
	{		
		$model = array('foo','bar');
		return parent::View($model);
	}	

}