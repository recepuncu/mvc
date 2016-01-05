<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("Mvc/Controller.php");
include("Mvc/Application.php");

//$app = new Application; //without default controller
$app = new Application('Index'); //with default controller