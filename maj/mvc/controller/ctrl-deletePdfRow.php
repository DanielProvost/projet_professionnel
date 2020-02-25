<?php
    $id     = getInput("id");
    $table  = getInput("table");

    switch($table){
        case 'actualite':
            $whereId = 'id';
            $recupLiens =
<<<CODERECUP
SELECT `pdf` FROM $table
WHERE  $whereId = :id
CODERECUP;
            $requeteSQL =
<<<CODESQL
UPDATE `$table` SET `pdf`= ''
WHERE $whereId = :id
CODESQL;
            break;
    }

    $tableauBind = [
        ":id" => $id,
        ];
    $statement = $model->executeSQL($recupLiens, $tableauBind);

    $ligne = $statement->fetch(PDO::FETCH_NUM);
    // ON EXTRAIT LES CHAMPS UTILES
    $lien = '../'.$ligne[0];

    //ON EFFACE LES FICHIERS DU SEVEUR
    unlink($lien);

    // MISE A JOUR DE LA BASE DE DONNEES
    $model->executeSQL($requeteSQL, $tableauBind);


    $feedback =
<<<CODEHTML
<script type="text/javascript">
window.location.reload();
</script>
CODEHTML;
