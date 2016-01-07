<?php

class Home extends Controller {
    
	function Index()
	{		
		$model = array('selam','kelam');
		return parent::View($model);
	}
	
	public function Welcome()
	{
		echo 'selam kelam';
	}

}