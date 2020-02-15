<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

// récupération de la langue choisie dans les variables $_GET ou $_SESSION['langue']
$langueOk=['fr','en'];

if (isset($_GET['langue']) && in_array($_GET['langue'],$langueOk)){
	$_SESSION['langue']=$_GET['langue'];
}
else if(!isset($_SESSION['langue'])){
	$_SESSION['langue']='fr';
}

include_once("mvc/starter.php");

$page = new Page;

$page-> afficherPage();