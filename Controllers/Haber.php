<?php

class Haber {
	
	public function bak($id){
		if($id==null){
			echo 'haber yok';
		}else{
			echo 'haber ' . $id;
		}		
	}
	
	public function bak2($yil,$ay,$gun){
		echo "tarih ile haber bak $yil-$ay-$gun";
	}
	
	public function bak3(){
		echo "parametresiz haber";
	}	
	
}