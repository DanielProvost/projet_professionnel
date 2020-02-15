<?php
    $id     = getInput("id");
    $table  = getInput("table");
    $field  = getInput("field");

    $recupLiens =
<<<CODERECUP
SELECT $field FROM `$table`
WHERE  `id` = :id
CODERECUP;

    $tableauBind = [
        ":id" => $id,
    ];
    $statement = $model->executeSQL($recupLiens, $tableauBind);
    
    $ligne = $statement->fetch(PDO::FETCH_NUM);
    // ON EXTRAIT LES CHAMPS UTILES
    $lien = '../'.$ligne[0];


    //ON EFFACE LES FICHIERS DU SERVEUR
    unlink($lien);

    $requeteSQL =
<<<CODESQL
UPDATE `$table` SET $field = '' 
WHERE `id` = :id
CODESQL;

    $model->executeSQL($requeteSQL, $tableauBind);

    
    $feedback =
<<<CODEHTML
<script type="text/javascript">
window.location.reload();
</script>
CODEHTML;
