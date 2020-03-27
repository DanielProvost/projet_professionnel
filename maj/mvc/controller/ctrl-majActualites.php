<?php

$feedback = '';

$model=new Model;

// ON RECUPERE LES INFOS DE L'ACTUALITE

$id	      = $model->getInput("id");
$titre    = $model->getInput("titre");
$date     = $model->getInput("date");
//$ordre    = $model->getInput("ordre");
$resume   = $model->getInput("resume");
$texte    = $model->getInput("texte");
$img      = $model->getInput("img");
$statut   = $model->getInput("statut");
$lien     = $model->getInput("lien");
$pdf      = $model->getInput("pdf");
$date_maj   = date("Y-m-d H:i:s");
$ip         = $_SERVER["REMOTE_ADDR"];

//TRAITEMENT UPLOADS
$now=date("Ymd-His");
$nomImg = $model->slugString($titre).'-'.$now;
$nomPdf = 'actualites-pdf-'.$now;

$cheminImg = $model->uploadImg("uploadImg", $nomImg, 0, 0, 'actualite');
$cheminPdf = $model->uploadPDF("uploadPDF", $nomPdf);

$error = null;
switch ($cheminImg){
    case 1 :
        $error ='ce type d\'extension n\'est pas accepte';
        break;
    case '' :
        break;
    default :
        $img=$cheminImg;
}

if ($cheminPdf!=''){$pdf=$cheminPdf;}
if($error == null){
    if ($id != 0)
    {
        $update=
            <<<CODEUPDATE
UPDATE `actualite` SET `titre`= :titre,`resume`= :resume, `texte`= :texte,
`img`= :img,`pdf`= :pdf, `date_maj`= '$date_maj', `ip_maj`= '$ip', `statut`= :statut,
`date` = :date 
WHERE `id` = :id
CODEUPDATE;

        $tabBindUpdate= [
            ":id"       => $id,
            ":titre"    => $titre,
            ":date"     => $date,
            ":resume"   => $resume,
            ":texte"    => $texte,
            ":statut"   => $statut,
            ":img"      => $img,
            ":pdf"      => $pdf
        ];

        $model->executeSQL($update,$tabBindUpdate);
    }
    else
    {
        $insert =
            <<<CODESQL
INSERT INTO `actualite`(`id`, `titre`,`resume`, `texte`, `img`, `date_cre`, `date_maj`, `ip_maj`, `statut`, `pdf`, `date`)
VALUES (NULL, :titre, :resume, :texte, :img, '$date_maj', '$date_maj', '$ip', :statut, :pdf, :date)
CODESQL;

        $tabBindInsert= [
            ":titre"    => $titre,
            ":resume"   => $resume,
            ":texte"    => $texte,
            ":img"      => $img,
            ":pdf"      => $pdf,
            ":date"     => $date,
            ":statut"   => $statut,
        ];

        $model->executeSQL($insert,$tabBindInsert);
    }

    $feedback .='<script type="text/javascript">alert ("Mise à jour effectuée !");window.location.assign("index.php?titre=liste-actualites");</script>';

}else {
 $url = '/maj/detail-actualite.php?table=actualite';
 $url .= '&error='.$error;
 if($id != 0){
     $url .= '&id='.$id;
 }
 header( "location: $url");
 exit;
}
