<?php

class Home extends Controller {
    
	function Index()
	{		
		$model = parent::Model("Home");		
		$data = $model->All();
		return parent::View($data);
	}
	
	function Welcome()
	{		
		$model = array('wel','come');
		return parent::View($model);
	}	

}