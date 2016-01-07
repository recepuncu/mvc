<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("Mvc/Application.php");

//$app = new Application; //without default controller
$app = new Application('Home'); //with only default controller
//$app = new Application('Home/Welcome'); //with default controller and action