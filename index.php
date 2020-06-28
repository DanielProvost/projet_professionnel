<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

include_once("mvc/starter.php");

$page = new Page;

$page-> afficherPage();
