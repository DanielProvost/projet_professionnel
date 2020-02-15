<?php

$model = new Model;

$feedback = "";

$controller = $model->getInput("controller");
$controller = basename($controller);
$cheminFichierController = "mvc/controller/ctrl-$controller.php";

if (file_exists($cheminFichierController))
{
    include($cheminFichierController);
}
echo $feedback;