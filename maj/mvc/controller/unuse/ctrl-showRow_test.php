<?php

    $id     = getInput("id");
    $table  = getInput("table");

    $ligne = $model->showRow($id,$table);
    
    //ON RECUPERE LES DIFFERENTES VALEURS
    
    $lenom      = $ligne['nom'];
    $leprenom   = $ligne['prenom'];
    $lasociete  = $ligne['societe'];
    $lemail     = $ligne['email'];
    $lobjet     = $ligne['objet'];
    $lemessage  = $ligne['message'];
    $ladate     = $ligne['date'];
    $lip        = $ligne['ip'];
    
    //ON CONSTRUIT LE FORMULAIRE D'AFFICHAGE DES INFOS
    
    $codeHtml =
<<<FORMHTML
<article>
    <form method="post" action="">
        <div id="dateip" class="flex">
            <p><label for="date">Date </label><input type="text" name="date" id="date" value="$ladate" readonly/></p>
            <p><label for="ip">Ip </label><input type="text" name="ip" id="ip" value="$lip" readonly/></p>
        </div>
        <p class="flex"><label for="nom">Nom </label><input type="text" name="nom" id="nom" value="$lenom" readonly/></p>
        <p class="flex"><label for="prenom">Prenom </label><input type="text" name="prenom" id="prenom" value="$leprenom" readonly/></p>
        <p class="flex"><label for="societe">Société </label><input type="text" name="societe" id="societe" value="$lasociete" readonly/></p>
        <p class="flex"><label for="email">Email </label><input type="email" name="email" id="email" value="$lemail" readonly/></p>
        <p class="flex"><label for="objet">Objet </label><input type="text" name="objet" id="objet" value="$lobjet" readonly/></p>
        <p class="flex"><label for="message">Message </label><textarea name='message' id="message" readonly>$lemessage</textarea></p>

    </form>
</article>
FORMHTML;
    
    $feedback = $codeHtml;

