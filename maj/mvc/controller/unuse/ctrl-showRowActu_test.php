<?php

    $id     = getInput("id");
    $table  = getInput("table");
    $duplic = getInput("dpl");


    if ($id !='0')
    {

        $data = $model->showRow($id,$table,'actualites_id');
var_dump($data);
        // ON RECUPERE LES DIFFERENTES VALEURS
        $actTitre	= $data['actualites_titre'];
        $actDesc	= $data['actualites_desc'];
        $actTexte	= $data['actualites_texte'];
        $actImg1	= $data['actualites_img1'];
        $actImg2	= $data['actualites_img2'];
        $actPdf		= $data['actualites_pdf'];
        $actDate	= $data['actualites_date'];
        $actHome	= $data['actualites_home'];
        $actStatut	= $data['actualites_statut'];
        $actLang	= $data['actualites_lang'];
        $actLien	= $data['actualites_lien'];
        $actSource	= $data['actualites_source'];

        $h3         = '<h3>Actualité N° '.$id.'</h3>';

    }
    else
    {

        $actTitre = $actDesc = $actTexte = $actImg1 = $actImg2 = $actPdf = $actDate = $actHome = $actStatut = $actLang = $actLien = $actSource ='';

        $h3       = '<h3>Nouvelle Actualité</h3>';
    }

    // SI ON DUPLIQUE DES DONNEES EXISTANTES, ON REMET $id=0 ET ON CHANGE LE h3
    if ($duplic=='1')
    {
        $id='0';
        $h3='<h3>Actualité dupliquée</h3>';
    }


    // === LES <SELECT> ===
    //CHOIX DU SITE CONCERNE
    $s0=$s1=$s2=$s3=$s4='';
    switch ($actStatut) {
    	case '0':
    		$s0='selected';
    		break;
    	case '1':
    		$s1='selected';
    		break;
    	case '2':
    		$s2='selected';
    		break;
    	case '3':
    		$s3='selected';
    		break;
    	case '4':
    		$s4='selected';
    		break;
    }
    $selectStatut=
<<<SELECTSTATUT
<select name="statut">
    <option $s0 value='0'>Non</option>
    <option $s1 value='1'>Site Ravoire et Fils</option>
    <option $s2 value='2'>Site Olivier Ravoire</option>
    <option $s3 value='3'>Site Manon</option>
	<option $s4 value='4'>Tous les sites</option>
</select>
SELECTSTATUT;

    // CHOIX AFFICHAGE EN PAGE D'ACCUEIL
    $h0=$h1='';
    switch ($actHome) {
    	case '0':
    		$h0='selected';
    		break;
    	case '1':
    		$h1='selected';
    		break;
	}
    $selectHome=
<<<SELECTHOME
<select name="home">
    <option $h1 value='1'>Oui</option>
    <option $h0 value='0'>Non</option>
</select>
SELECTHOME;

    // CHOIX DE LA LANGUE
    $l0=$l1=$l2='';
    switch ($actLang) {
        case 'fr':
    		$l0='selected';
    		break;
        case 'en':
    		$l1='selected';
    		break;
        case 'cn':
    		$l2='selected';
    		break;
    }
    $selectLang=
<<<SELECTLANG
<select name="lang">
    <option $l1 value='en'>Anglais</option>
    <option $l0 value='fr'>Français</option>
    <option $l2 value='cn'>Chinois</option>
</select>
SELECTLANG;
    

    // PARTIE IMAGE
    $choixImage='';

    if ($actImg1!='')
    {
        $previewImg = '<img src="'.$actImg1.'" alt="apperçu de l\'image jointe à l\'actualité '.$actTitre.'"/><br><br>'; // ATTENTION ENLEVER LES '../' AU DEBUT DU SRC LORS DE LA MISE EN PROD.
        $msgImg     = '<a class="action-delete-img" data-table="'.$nomTable.'" data-id="'.$id.'" href="#delete_img-'.$id.'">
                        <img src="media/img/del.png"> Supprimer l\'image pour en uploader une nouvelle.
                    </a><br><br>
                    <div class="feedbackSuppr"></div>';
        $inputImg   = '';
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
    if (($actPdf!=''))
    {
        $previewPdf = '<a href="'.$actPdf.'"><img src="media/img/pdf.gif"> Ouvrir la fiche PDF</a><br><br>';
        $msgPdf     = '<a class="action-delete-pdf" data-table="'.$table.'" data-id="'.$id.'" href="#delete_pdf-'.$id.'">
                        <img src="media/img/del.png"> Supprimer le PDF pour en uploader un nouveau
                    </a><br><br>
                    <div class="feedbackSuppr"></div>';
        $inputPdf   = '';
    }
    else
    {
        $previewPdf = '';
        $msgPdf     = '<p>Aucun document sélectionné.</p><br>';
        $inputPdf   = '<input type="file" name="uploadPdf" id="uploadPdf"/><br><br>';
    }

    $choixPDF =
<<<CODEPDF
<div>
    $previewPdf
    $msgPdf
    $inputPdf
</div>
CODEPDF;



    // AFFICHAGE DU BOUTON DUPLIQUER SEULEMENT SI L'ACTU EST DEJA EN BASE DE DONNEES
    $dupliquer='';
    if ($id!='0'){$dupliquer='<button type="button" class="btn btn-success dupliquer" data-table="'.$table.'" data-id="'.$id.'" href="#show-detail">Dupliquer</button>';}
    
	// CODE FINAL
    $codeHtmlPage =
<<<CODEHTML
$h3
<form class="ajax" method="post" action="" style="max-width:800px;">
    <fieldset>
        <p class="flex"><label for="titre">Titre</label><input type="text" name="titre" id="titre" value="$actTitre"/></p>
        <p class="flex"><label for="desc">Description</label><input type="text" name="desc" id="desc" value="$actDesc"/></p>
        <p class="flex"><label for="lang">Langage : $selectLang</label><label for="home">Affichage en page d'Accueil : $selectHome</label><label for="statut">En ligne sur le site : $selectStatut</label></p>
        <p class="flex"><label for="texte">Contenu</label><textarea name="texte" id="texte" style="height:120px;">$actTexte</textarea></p>
        <p class="flex"><label for="date">Date</label><input type="text" name="date" id="date" value="$actDate"/></p>
        <p class="flex"><label for="lien">Lien</label><input type="text" name="lien" id="lien" value="$actLien"/></p>
        <p class="flex"><label for="source">Source</label><input type="text" name="source" id="source" value="$actSource"/></p>
        <input type="hidden" name="controller" value="maj" />
        <input type="hidden" name="id" value=$id />
    </fieldset>
    <fieldset>
        <legend>Image jointe à l'actualité</legend>
        $choixImage
   </fieldset>
    <fieldset>
        <legend>PDF joint à l'actualité</legend>
        $choixPDF
    </fieldset>
    <br><br>
    <button type="submit" class="btn btn-success">Valider</button> $dupliquer
    <div class="feedback"></div>
</form>
<br>
<br>
CODEHTML;
    


    $feedback = $codeHtmlPage;

