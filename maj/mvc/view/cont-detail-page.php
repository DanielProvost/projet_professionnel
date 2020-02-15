<?php

    $id     = getInput("id");
    $table  = getInput("table");
    $duplic = getInput("dpl");

    if ($id !='0')
    {

        $data = $model->showRow($id,$table,'id');

        // ON RECUPERE LES DIFFERENTES VALEURS
        $titre	   = $data['titre'];
        $texte_left	   = $data['texte_left'];
        $texte_right	   = $data['texte_right'];
        $date_maj  = $data['date_maj'];
        $nom_interne = $data['nom_interne'];

        $h3        = '<h3>Nom de la page : '.$nom_interne.'</h3>';

    }
    else
    {
        $titre = $texte = $date_maj = '';


        $h3       = '<h3>Nouvelle Page</h3>';
    }

    // SI ON DUPLIQUE DES DONNEES EXISTANTES, ON REMET $id=0, ON NEUTRALISE LA DATE DE MISE A JOUR ET ON CHANGE LE h3
    if ($duplic=='1')
    {
        $id='0';
        $date_maj='';
        $h3='<h3>Page dupliquée</h3>';
    }

    // AFFICHAGE DU BOUTON DUPLIQUER SEULEMENT SI L'ACTU EST DEJA EN BASE DE DONNEES (pour autre langue par exemple)
    $dupliquer='';
    //if ($id!='0'){$dupliquer='<button type="button" class="btn btn-success dupliquer" data-table="'.$table.'" data-id="'.$id.'" href="#show-detail">Dupliquer</button>';}

	// CODE FINAL
    $codeHtmlPage =
<<<CODEHTML
<div class="col-xs-10 col-xs-offset-2" style="padding-bottom: 20px;">
<h2 class="titre_actu">Pages</h2>
$h3
<p>Date de dernière mise à jour : $date_maj</p>
<form class="ajax" method="post" action="" style="max-width:800px;">
    <fieldset>
        <p class="flex"><label for="texte">Texte de gauche</label><textarea class="tiny" name="texte_left" id="texte_left" style="height:100px;">$texte_left</textarea></p>
        <p class="flex"><label for="texte">Texte de droite</label><textarea class="tiny" name="texte_right" id="texte_riht" style="height:100px;">$texte_right</textarea></p>
        <input type="hidden" name="controller" value="majPages" />
        <input type="hidden" name="id" value=$id />
    </fieldset>
    <br><br>
    <button type="submit" class="btn btn-success">Valider</button> $dupliquer
    <div class="feedback"></div>
</form>
</div>
CODEHTML;



    echo $codeHtmlPage;
