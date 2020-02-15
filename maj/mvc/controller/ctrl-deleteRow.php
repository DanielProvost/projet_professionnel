<?php
    $feedback = $recupLiens = '';
    $id    = getInput("id");
    $table = getInput("table");

// pour récupérer les liens des pièces jointes et la valeur du champ id de la table concernée
    switch($table){
        case 'actualite':
            $recupLiens =
<<<CODERECUP
SELECT `img` FROM $table
WHERE  `id` = :id
CODERECUP;
            break;
    }
    // S'il y a une piece jointe, il faut la supprimer aussi
    if ($recupLiens != '')
    {
        $tableauBind = [
            ":id" => $id,
        ];
        $statement = $model->executeSQL($recupLiens, $tableauBind);

        $ligne = $statement->fetch(PDO::FETCH_NUM);

        // ON EXTRAIT LES CHAMPS UTILES
        for ($i = 0; $i < count($ligne); $i++) {
            //ON EFFACE LES FICHIERS DU SEVEUR
            if (is_file('../'.$ligne[$i]))
            {
                unlink('../'.$ligne[$i]);
                //echo "unlink $ligne[$i]<br>";

                // ON EFFACE LES MINIATURES
                switch($table){
                    case 'realisation':
                    $explodedLigne = explode('/', $ligne[$i]);
                    $ligneMiniFile = $explodedLigne[count($explodedLigne)-1];
                    if($i == 0) {
                        $ligneMini = str_replace($ligneMiniFile, '420/'.$ligneMiniFile, $ligne[$i]);
                        if (is_file('../'.$ligneMini)) {
                            unlink('../'.$ligneMini);
                            //echo "unlink $ligneMini<br>";
                        }
                    }else{
                        $ligneMini = str_replace($ligneMiniFile, '320/'.$ligneMiniFile, $ligne[$i]);
                        if (is_file('../'.$ligneMini)) {
                            unlink('../'.$ligneMini);
                            //echo "unlink $ligneMini<br>";
                        }
                    }
                    break;

                    case 'actualite':
                    $explodedLigne = explode('/', $ligne[$i]);
                    $ligneMiniFile = $explodedLigne[count($explodedLigne)-1];
                    $ligneMini = str_replace($ligneMiniFile, '420/'.$ligneMiniFile, $ligne[$i]);
                    if (is_file('../'.$ligneMini)) {
                        unlink('../'.$ligneMini);
                        // echo "unlink $ligneMini<br>";
                    }
                    break;
                }
            }
        }
    }

    $requeteSQL =
<<<CODESQL
DELETE FROM `$table`
WHERE `id` = :id
CODESQL;

    $tableauBind = [
        ":id" => $id,
    ];
    $model->executeSQL($requeteSQL, $tableauBind);

    $feedback =
<<<CODEHTML
<script type="text/javascript">
jQuery(".ligne-$id").remove();
</script>
CODEHTML;
