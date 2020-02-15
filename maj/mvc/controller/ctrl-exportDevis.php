<?php
$listDevis = $model->getAllDevis();
$sep = ';';

header('Content-Description: File Transfer');
header('Content-type: application/octet-stream;');
header("Content-Type: text/csv; charset=utf-8");
header('Content-Disposition: attachment; filename=export-devis-'.date("Y-m-d").'.csv');
header('Pragma: no-cache');
header('Expires: 0');

// Force excel utf-8
echo "\xEF\xBB\xBF"; // UTF-8 BOM

echo 'Date'.$sep.'Nom'.$sep.'Prénom'.$sep.'Société'.$sep.'Email'.$sep.'Téléphone'.$sep.'Message'."\r\n";

foreach($listDevis as $devis) {
    echo '"'.date('d/m/Y', strtotime($devis['date'])).'"'.$sep;
    echo '"'.$devis['nom'].'"'.$sep;
    echo '"'.$devis['prenom'].'"'.$sep;
    echo '"'.$devis['societe'].'"'.$sep;
    echo '"'.$devis['email'].'"'.$sep;
    echo '"'.$devis['tel'].'"'.$sep;
    echo '"'.$devis['message'].'"'."\r\n";
}