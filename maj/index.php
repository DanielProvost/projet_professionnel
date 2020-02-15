<?php

if($_SERVER['REMOTE_ADDR'] == "195.200.172.200") {
    error_reporting(E_ALL & ~E_NOTICE);
    ini_set("display_errors", 1);
}

include_once("mvc/starter.php");

$page = new Page;

$page-> afficherPage();
