<?php

$feedback = '';

$model=new Model;

// ON RECUPERE LES INFOS
$date_maj   = date("Y-m-d H:i:s");
$id	        = $model->getInput("id");
$titre = $model->getInput('titre');
$text_top = $model->getInput('text_top');
$texte_left = $model->getInput('texte_left');
$texte_right = $model->getInput('texte_right');

if ($id != 0)
{
    $update=
        <<<CODEUPDATE
UPDATE `Pages` SET `text_top`= :text_top,`texte_left`= :texte_left,`texte_right`= :texte_right, `date_maj`= '$date_maj'
WHERE `id` = :id
CODEUPDATE;

    $tabBindUpdate= [
        ":id"       => $id,
        ":text_top" => $text_top,
        ":texte_left"  => $texte_left,
        ":texte_right" => $texte_right
    ];

    $model->executeSQL($update,$tabBindUpdate);
}
else
{
    $insert =
        <<<CODESQL
INSERT INTO `Pages`(`text_top`,`texte_left`,`texte_right`,`date_maj`)
VALUES (:text_top,:texte_left,:texte_right,'$date_maj')
CODESQL;

    $tabBindInsert= [
        ":text_top" => $text_top,
        ":texte_left"    => $texte_left,
        ":texte_right"    => $texte_right,
    ];

    $model->executeSQL($insert,$tabBindInsert);
}

$feedback .='<script type="text/javascript">alert ("Mise à jour effectuée !");window.location.assign("index.php?titre=liste-pages");</script>';
