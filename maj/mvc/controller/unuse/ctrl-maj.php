<?php

$feedback = '';

$model=new Model;

// ON RECUPERE LES INFOS DE LA PAGE

$id	        = $model->getInput("id");
$leTitre    = $model->getInput("titre_int");
$langage    = $model->getInput("langage");
$titre_page = $model->getInput("titre_page");
$description= $model->getInput("description");
$contenu    = $model->getInput("contenu");
$meta_title = $model->getInput("meta_title");
$menu       = $model->getInput("menu");
$meta_desc  = $model->getInput("meta_desc");
$titre = $model->getInput('titre');
$texte = $model->getInput('texte');
$date_maj   = $model->date("Y-m-d H:i:s");
$ip_maj     = $_SERVER["REMOTE_ADDR"];



//TRAITEMENT UPLOAD BANDEAU
$now=date("Ymd-His");
$nomImg = 'bandeau-'.$now;
$img="";
if ($leTitre=='index')
{
    $hauteurMini = '135';
}
else
{
    $hauteurMini = '82';
}

list($big,$mini) = $model->uploadImage("uploadImg", $nomImg, 400, $hauteurMini);

$bigBase  = substr($big, 3); //nom de l'image dans la base pour que le lien soit OK pour affichage reel: on tronque les "../" en début de nom.

if ($id != "")
{
    $update1=
<<<CODEUPDATE
UPDATE `Pages` SET `date_maj`='$date_maj', `ip_maj`='$ip_maj', `contenu`= :contenu, `description`= :description, `langage`= :langage, `titre_page`= :titre_page
WHERE `id` = :id
CODEUPDATE;

    $tabBind1= [
        ":id"           => $id,  
        ":contenu"      => $contenu,
        ":description"  => $description,
        ":langage"      => $langage,
        ":titre_page"   => $titre_page,
        ];

    $update2=
<<<CODEUPDATE2
UPDATE `Pages` SET `img_bandeau`= :bigBase, `img_mini`= :mini
WHERE `titre_interne` = :leTitre
CODEUPDATE2;

    $tabBind2= [
        ":leTitre"      => $leTitre,  
        ":bigBase"      => $bigBase,
        ":mini"         => $mini,
        ];


    $model->executeSQL($update1,$tabBind1);

    if ($bigBase!='')
    {
        $model->executeSQL($update2,$tabBind2);
    }
}

    $feedback ='Mise à jour effectuée !';
