<?php

class News extends Controller {
	
	public function Index()
	{		
		$model = array('foo','bar');
		return parent::View($model);
	}
	
	public function Get(){
		echo "Welcome News!";
	}
	
	public function GetById($id){
		if($id==null){
			echo 'News not found.';
		}else{
			echo 'GetById: ' . $id;
		}		
	}
	
	public function GetByDate($year, $month, $day){
		echo "GetByDate: $year-$month-$day";
	}	
	
}