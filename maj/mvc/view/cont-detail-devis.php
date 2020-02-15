<?php

    $id     = getInput("id");
    $table  = getInput("table");

    $data = $model->showRow($id,$table,'id');
    
    // ON RECUPERE LES DIFFERENTES VALEURS
    $date       = date('d/m/Y', strtotime($data['date']));
    $nom        = $data['nom'];
    $prenom	    = $data['prenom'];
    $societe    = $data['societe'];
    $email      = $data['email'];
    $tel	    = $data['tel'];
    $message    = $data['message'];
    
	// CODE FINAL
    $codeHtmlPage =
<<<CODEHTML
<div class="col-xs-10 col-xs-offset-2" style="padding-bottom: 20px;">
    <h2 class="titre">Devis</h2>
    <div style="max-width:800px;">
        <p><strong>Date :</strong><br>$date</p>
        <p><strong>Nom :</strong><br>$nom</p>
        <p><strong>Prénom :</strong><br>$prenom</p>
        <p><strong>Société :</strong><br>$societe</p>
        <p><strong>Email :</strong><br>$email</p>
        <p><strong>Téléphone :</strong><br>$tel</p>
        <p><strong>Message :</strong><br>$message</p>
    </div>
</div>
CODEHTML;

    echo $codeHtmlPage;
