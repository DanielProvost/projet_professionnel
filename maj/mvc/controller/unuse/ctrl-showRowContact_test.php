<?php

    $id     = getInput("id");
    $table  = getInput("table");

    //$data = $model->showContact($id);
    $data = $model->showRow($id,$table,'contact_id');
    
    //ON RECUPERE LES DIFFERENTES VALEURS
    $nom    = trim($data['contact_nom']);
    $prenom = trim($data['contact_prenom']);
    $email  = trim($data['contact_email']);
    $message= trim($data['contact_message']);
    $lang   = $data['contact_lang'];
    $statut   = $data['contact_statut'];
    $date   = $data['contact_date'];


    $contactDate = substr($date,8,2).'/'.substr($date,5,2).'/'.substr($date,0,4);

    switch($statut){
    case '1':
        $site = 'Ravoire%20et%20Fils';
        break;
    case '2':
        $site = 'Olivier%20Ravoire';
        break;
    case '3':
        $site = 'Manon';
        break;
}

    $obj = str_replace(' ', '%20', substr($lobjet, 11));
    $lienMailto = '"mailto:'.$email.'?subject='.$site.'%20-%20Réponse%20à%20votre%20demande%20du%20:%20'.$contactDate.'"';

    $codeHtmlPage =
<<<CODEHTML
<h3>Message N°$id du $contactDate recu sur $site en $lang</h3> 
<br>
<article>
    <form method="post" action="">
        <p class="flex"><label for="nom">Nom </label><input type="text" name="nom" id="nom" value="$nom" readonly/></p>
        <p class="flex"><label for="prenom">Prenom </label><input type="text" name="prenom" id="prenom" value="$prenom" readonly/></p>
        <p class="flex"><label for="email">Email </label><input type="email" name="email" id="email" value="$email" readonly/></p>
        <p class="flex"><label for="message">Message </label><textarea name='message' id="message" readonly>$message</textarea></p>
    </form>
    <a href=$lienMailto class="repDevis">Répondre à ce message</a>
</article>
<br><br>
CODEHTML;



    $feedback = $codeHtmlPage;

