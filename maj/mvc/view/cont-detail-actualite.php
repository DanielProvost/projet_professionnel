<?php

    $id     = getInput("id");
    $table  = getInput("table");
    $duplic = getInput("dpl");

    if ($id !='0')
    {

        $data = $model->showRow($id,$table,'id');

        // ON RECUPERE LES DIFFERENTES VALEURS
        $titre	   = $data['titre'];
        $date      = $data['date'];
        $resume    = $data['resume'];
        $texte	   = $data['texte'];
        $img	     = $data['img'];
        $date_maj  = $data['date_maj'];
        $statut	   = $data['statut'];
        $pdf       = $data['pdf'];
        $h3         = '<h3>Actualité N° '.$id.'</h3>';
    }
    else
    {
        $titre = $resume = $texte = $img = $date_maj = $statut = $date = $pdf = '';

        $h3       = '<h3>Nouvelle Actualité</h3>';
    }

    // SI ON DUPLIQUE DES DONNEES EXISTANTES, ON REMET $id=0, ON NEUTRALISE LA DATE DE MISE A JOUR ET ON CHANGE LE h3
    if ($duplic=='1')
    {
        $id='0';
        $date_maj='';
        $h3='<h3>Actualité dupliquée</h3>';
    }

    // === LES <SELECT> ===
    //MISE EN LIGNE
    $s0=$s1='';
    switch ($statut) {
    	case '0':
    		$s0='selected';
    		break;
    	case '1':
    		$s1='selected';
    		break;
    }
    $selectStatut=
<<<SELECTSTATUT
<select name="statut" class="col-xs-2">
    <option $s0 value='0'>Brouillon</option>
    <option $s1 value='1'>En ligne</option>
</select>
SELECTSTATUT;

    // PARTIE IMAGE
    $choixImage='';


    if ($img!='') {
        $previewImg = '<img src="../' . $img . '" alt="aperçu de l\'image jointe à l\'actualité ' . $titre . '" style="max-width:100%" /><br><br>';
        $msgImg = '<a class="action-delete-img" data-table="' . $table . '" data-id="' . $id . '" data-field="img" href="#delete_img-' . $id . '">
                        <img src="media/img/del.png" alt=""> Supprimer l\'image pour en uploader une nouvelle.
                    </a><br><br>
                    <div class="feedbackSuppr"></div>';
        $inputImg = '<input type="hidden" name="img" value="' . $img . '" />';
    }
    else
    {
        $previewImg = '';
        $msgImg     = '<p>Aucune image sélectionnée</p><br>';
        $inputImg   = '<input type="file" name="uploadImg" id="uploadImg"><br><br>';

    }

    $choixImage=

<<<CODEIMAGE
<div>
    $previewImg
    $msgImg
    $inputImg
</div>
CODEIMAGE;

    // PARTIE PDF
    $choixPDF='';

    if ($pdf!='')
    {
        $previewPDF = '<a href="../'.$pdf.'" target="_blank"><img src="media/img/pdf.gif" alt="PDF de l\'actualité" /></a>';
        $msgPDF     = '<a class="action-delete-pdf" data-table="'.$table.'" data-id="'.$id.'" href="#delete_pdf-'.$id.'">
                        <img src="media/img/del.png" alt=""> Supprimer le PDF pour en uploader un nouveau.
                    </a><br><br>
                    <div class="feedbackSuppr"></div>';
        $inputPDF   = '<input type="hidden" name="pdf" value="'.$pdf.'" />';
    }
    else
    {
        $previewPDF = '';
        $msgPDF     = '<p>Aucun PDF sélectionné</p><br>';
        $inputPDF   = '<input type="file" name="uploadPDF" id="uploadPDF"><br><br>';
    }

    $choixPDF=
<<<CODEIMAGE
<div>
    $previewPDF
    $msgPDF
    $inputPDF
</div>
CODEIMAGE;

    // AFFICHAGE DU BOUTON DUPLIQUER SEULEMENT SI L'ACTU EST DEJA EN BASE DE DONNEES (pour autre langue par exemple)
    $dupliquer='';
    //if ($id!='0'){$dupliquer='<button type="button" class="btn btn-success dupliquer" data-table="'.$table.'" data-id="'.$id.'" href="#show-detail">Dupliquer</button>';}

	// CODE FINAL
    $codeHtmlPage =
<<<CODEHTML
<div class="col-xs-10 col-xs-offset-2" style="padding-bottom: 20px;">
<h2 class="titre_actu">Actualites</h2>
$h3
<p>Date de dernière mise à jour : $date_maj</p>
<form class="ajax" method="post" action="" style="max-width:800px;">
    <fieldset>
        <p class="row"><label for="titre" class="col-xs-2">Titre</label><input class="col-xs-10" type="text" name="titre" id="titre" value="$titre" required/></p>
        <p class="row"><label for="date" class="col-xs-2">Date</label><input class="col-xs-10 input-date" type="date" name="date" id="date" value="$date" required/></p>
        <p class="row">
            <label for="statut" class="col-xs-2">Statut :</label> $selectStatut
        </p>
        <p class="flex"><label for="resume">Resumé<br><small>(Apparaitra<br> sur le slider)</small></label><textarea class="tiny" name="resume" id="resume" style="height:100px;">$resume</textarea></p>
        <p class="flex"><label for="texte">Texte</label><textarea class="tiny" name="texte" id="texte" style="height:50px;">$texte</textarea></p>
        <input type="hidden" name="controller" value="majActualites" />
        <input type="hidden" name="id" value=$id />
    </fieldset>
    <fieldset>
        <legend>Image jointe à l'actualité<small> (Uploader une photo de taille minimum 610 * 450)</legend>
        $choixImage
   </fieldset>
   <fieldset>
        <legend>PDF</legend>
        $choixPDF
   </fieldset>
    <br><br>
    <button type="submit" class="btn btn-success">Valider</button> $dupliquer
    <div class="feedback"></div>
</form>
</div>
CODEHTML;



    echo $codeHtmlPage;
