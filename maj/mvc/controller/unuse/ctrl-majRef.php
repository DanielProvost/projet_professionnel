<?php

$feedback = '';

$model=new Model;

// ON RECUPERE LES INFOS

$id	    = $model->getInput("id");
$nom    = $model->getInput("nom");
$img    = $model->getInput("img");
$ordre  = $model->getInput("ordre");
$statut	= $model->getInput("statut");

//TRAITEMENT UPLOADS
$nomImg = $model->slugString($nom);

$cheminImg  = $model->uploadImg("uploadImg", $nomImg, 0, 0, 'reference');

if ($cheminImg!=''){$img=$cheminImg;}

if ($id != 0)
{
    $update=
<<<CODEUPDATE
UPDATE `reference` SET `nom`= :nom, `image`= :img, `statut`= :statut, `ordre` = :ordre
WHERE `id` = :id
CODEUPDATE;

    $tabBindUpdate= [
        ":id"       => $id,  
        ":nom"      => $nom,
        ":ordre"    => $ordre,
        ":statut"   => $statut,
        ":img"      => $img,
    ];

    $model->executeSQL($update,$tabBindUpdate);
}
else
{
    $insert =
<<<CODESQL
INSERT INTO `reference`(`nom`, `image`, `statut`, `ordre`)
VALUES (:nom, :img, :statut, :ordre)
CODESQL;

    $tabBindInsert= [
        ":nom"      => $nom,
        ":ordre"    => $ordre,
        ":statut"   => $statut,
        ":img"      => $img,
    ];

    $model->executeSQL($insert,$tabBindInsert);
}

    $feedback .='<script type="text/javascript">alert ("Mise à jour effectuée !");window.location.assign("index.php?titre=liste-reference");</script>';
