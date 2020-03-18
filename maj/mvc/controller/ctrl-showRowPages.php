<?php

$id     = getInput("id");
$table  = getInput("table");
$duplic = getInput("dpl");


if ($id !='0')
{
    $data = $model->showRow($id,$table,'pages_id');

    // ON RECUPERE LES DIFFERENTES VALEURS
    $pagTitre	= $data['pages_titre'];
    $pagTexte	= $data['pages_texte'];
    $pagDate	= $data['pages_date'];
    $h3         = '<h3>Pages N° '.$id.'</h3>';

}
else
{
    $pagTitre = $pagTexte = $pagDate='';

    $h3       = '<h3>Nouvelle Page</h3>';
}

// SI ON DUPLIQUE DES DONNEES EXISTANTES, ON REMET $id=0 ET ON CHANGE LE h3
if ($duplic=='1')
{
    $id='0';
    $h3='<h3>Page dupliquée</h3>';
}




// AFFICHAGE DU BOUTON DUPLIQUER SEULEMENT SI L'ACTU EST DEJA EN BASE DE DONNEES
$dupliquer='';
if ($id!='0'){$dupliquer='<button type="button" class="btn btn-success dupliquer" data-table="'.$table.'" data-id="'.$id.'" href="#show-detail">Dupliquer</button>';}

// CODE FINAL
$codeHtmlPage =
    <<<CODEHTML
$h3
<form class="ajax" method="post" action="" style="max-width:800px;">
    <fieldset>
        <p class="flex"><label for="titre">Titre</label><input type="text" name="titre" id="titre" value="$pagTitre"/></p>
        <p class="flex"><label for="texte">Contenu</label><textarea name="texte" id="texte" style="height:120px;">$pagTexte</textarea></p>
        <p class="flex"><label for="date">Date</label><input type="text" name="date" id="date" value="$pagDate"/></p>
        <input type="hidden" name="controller" value="maj" />
        <input type="hidden" name="id" value=$id />
    </fieldset>

</form>
<br>
<br>
CODEHTML;



$feedback = $codeHtmlPage;
