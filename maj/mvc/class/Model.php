<?php
class Model
{
    // DEBUT DU CODE DE LA CLASSE Model

    // PROPRIETES

    // METHODES
    // constructeur
    function __construct ()
    {
        // null EST MOT CLE DE PHP POUR DIRE QU'IL N'Y A PAS D'OBJET
        $this->pdo = null;
    }

    function getConnexion ()
    {
        if ($this->pdo == null)
        {
            // AU DEPART ON N'A PAS DE CONNEXION
            // ALORS ON LA CREE UNE SEULE FOIS
            $nomDatabase  = "e_partenaire_hydratis";
            $userDatabase = "root";
            $mdpDatabase  = "";
            $hostDatabase = "hydratis-local.fr";

            // Data Source Name
            $dsn = "mysql:dbname=$nomDatabase;host=$hostDatabase;port=3308;charset=utf8;";

            // LA CLASSE PDO GERE LA CONNEXION ENTRE PHP ET MYSQL
            // ON CREE UN OBJET DE LA CLASSE PDO (PHP Data Object)
            $this->pdo = new PDO($dsn, $userDatabase, $mdpDatabase);

            // AFFICHER LES MESSAGES D'ERREUR DE MYSQL
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }
        // RENVOIE LA CONNEXION EN COURS
        return $this->pdo;
    }

//==================================================================================================================================
//==================================================================================================================================
//==================================================================================================================================
    function getInput ($name)
    {
        $resultat = "";
        // VERIFIER SI L'INFO EST FOURNIE
        if (isset($_REQUEST["$name"]))
        {
            // trim ENLEVES LES ESPACES AU DEBUT ET A LA FIN
            $resultat = trim($_REQUEST["$name"]);
        }
        elseif (isset($_COOKIE["$name"]))
        {
            // trim ENLEVES LES ESPACES AU DEBUT ET A LA FIN
            $resultat = trim($_COOKIE["$name"]);
        }
        return $resultat;
    }

//==================================================================================================================================
//==================================================================================================================================
//==================================================================================================================================
    function getEmail ($name)
    {
        $email = $this->getInput($name);
        // FILTRE L'EMAIL
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        return $email;
    }

//==================================================================================================================================
//==================================================================================================================================
//==================================================================================================================================
    function executeSQL ($requeteSQL, $tableauBind=[])
    {
        // CONNEXION A LA BASE DE DONNEES
        $pdo = $this->getConnexion();

        // PREPARATION DE LA FUTURE REQUETE SQL
        // SECURITE CONTRE LES INJECTIONS SQL
        $statement = $pdo->prepare($requeteSQL);

        // $statement->bindValue(":nom", $nom);
        foreach($tableauBind as $cle => $valeur)
        {
            // REMPLACER CHAQUE JETON PAR SA VALEUR
            $statement->bindValue($cle, $valeur);
        }

        // EXECUTER LA REQUETE SQL
        $statement->execute();

        // RENVOIE L'OBJET $statement
        // QUI PERMETTRA DE PARCOURIR LES RESULTATS
        return $statement;
    }

//==================================================================================================================================
//==================================================================================================================================
//==================================================================================================================================

    function slugString($txt='') {
        $txt = strtolower($this->remove_accents($txt));
        $txt = str_replace("'", ' ', $txt);
        $txt = preg_replace('/[^a-zA-Z0-9 ]/', '', $txt);
        $txt = preg_replace('/\s+/', ' ', $txt);
        $txt = str_replace(' ', '-', $txt);
        $txt = substr($txt, -1) == '-' ? substr($txt, 0, -1):$txt;
        return $txt;
    }

    function remove_accents($str, $charset='utf-8')
    {
        $str = htmlentities($str, ENT_NOQUOTES, $charset);

        $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
        $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
        $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères

        return $str;
    }

//==================================================================================================================================
//==================================================================================================================================
//==================================================================================================================================

    function getAllDevis() {
        $requeteSQL =
<<<CODESQL
SELECT * FROM `devis`
ORDER BY date DESC
CODESQL;
        $statement = $this->executeSQL($requeteSQL);

        return($statement->fetchAll(PDO::FETCH_ASSOC));
    }

//==================================================================================================================================
//==================================================================================================================================
//==================================================================================================================================

    function showRow ($id, $table, $nomChampId)
    {
        $requeteSQL =
<<<CODESQL
SELECT * FROM `$table`
WHERE `$nomChampId` = :id

CODESQL;
        $tableauBind = [
            ":id" => $id,
        ];
        $statement = $this->executeSQL($requeteSQL, $tableauBind);

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        // ON N'OBTIENT QU'UNE SEULE LIGNE

        return $row;
    }

//==================================================================================================================================
//==================================================================================================================================
//==================================================================================================================================
    function readTableListe ($nomTable, $titre)
    {

        $resultat   = "";
        $pdo        = $this->getConnexion();

        // ON PREPARE LES VARIABLES POUR LA PAGE DES ACTUALITES
        $enteteHtmlPages =
<<<DEBUTHTMLACTUS
<div class="feedback-Pages " id="show-detail"></div>
<h2 class="titre_actu">Liste des Pages</h2>
<p>Sélectionnez une page (clic sur  voir détails) pour modifier le texte</a> : </p>
<table class="table table-hover">
    <tr>
        <th>TITRE</th>
        <th>DATE MAJ</th>
        <th class="text-center">VOIR DETAILS</th>
    </tr>
DEBUTHTMLACTUS;

        $requetePages =
<<<SQLACTUS
SELECT pages.`id`,`titre`, `date_maj`
FROM pages
ORDER BY  `date_maj` DESC

SQLACTUS;

        $enteteHtmlActualites =
<<<DEBUTHTMLACTUS
<div class="feedback-actualite" id="show-detail"></div>
<h2 class="titre_actu">Liste des Actualites</h2>
<p>Sélectionnez une actualité ou <a class="action-show-Actualite" data-table="Actualite" data-id="0" href="#show-detail">créez une nouvelle actualite</a> : </p>
<table class="table table-hover">
    <tr>
        <th>EN LIGNE</th>
        <th>DATE</th>
        <th>TITRE</th>
        <th class="text-center">VOIR DETAILS</th>
        <th class="text-center">SUPPRESSION</th>
    </tr>
DEBUTHTMLACTUS;

        $requeteActualites =
<<<SQLACTUS
SELECT actu.`id`, `statut`, `date`, `titre`
FROM actualite as actu
ORDER BY `statut` ASC, `date` ASC
SQLACTUS;


        // ON PREPARE LES VARIABLES POUR LA PAGE DES DEVIS
        $enteteHtmlDevis =
<<<DEBUTHTMLDEVIS
<div class="feedback-devis" id="show-detail"></div>
<h2 class="titre">Liste des devis</h2>
<p>Sélectionnez un devis ou <a href="export-devis" target="_blank">exporter les devis en CSV</a></p>
<table class="table table-hover">
    <tr>
        <th>DATE</th>
        <th>NOM</th>
        <th>PRÉNOM</th>
        <th>SOCIÉTÉ</th>
        <th>EMAIL</th>
        <th>TEL</th>
        <th class="text-center">VOIR DETAILS</th>
        <th class="text-center">SUPPRESSION</th>
    </tr>
DEBUTHTMLDEVIS;

        $requeteDevis =
<<<SQLDEVIS
SELECT id, date_format(date, '%d/%m/%Y'), nom, prenom, societe, email, tel
FROM devis
ORDER BY date DESC
SQLDEVIS;

        // ON CHOISI L'ENTETE EN FONCTION DE LA TABLE PARCOURUE
        // LISTE DES CHAMPS A IGNORER SUR CET AFFICHAGE
        switch ($titre) {
            case 'liste-actualites':
                $enteteHTML     = $enteteHtmlActualites;
                $champsIgnores  = ['id'];
                $requeteSQL     = $requeteActualites;
                break;
            case 'liste-devis':
                $enteteHTML     = $enteteHtmlDevis;
                $champsIgnores  = ['id'];
                $requeteSQL     = $requeteDevis;
                break;
            case 'liste-pages':
                $enteteHTML     = $enteteHtmlPages;
                $champsIgnores  = ['id'];
                $requeteSQL     = $requetePages;
            break;
        };

        // ON VA CHERCHER LES DONNEES DANS LA TABLE

        $tableauBind = [];

        $statement = $this->executeSQL($requeteSQL, $tableauBind);

        // ON REMPLI LE TABLEAU AVEC LES VALEURS RECUPEREES DE LA BASE DE DONNEES
        while($ligne = $statement->fetch(PDO::FETCH_ASSOC))
        {
            $htmlBlocTd = "";
            // ON AURA TOUJOURS LA COLONNE id
            $id = $ligne["id"];

            // POUR LES AUTRES CHAMPS
            foreach($ligne as $cle => $valeur)
            {
                if (!in_array($cle,$champsIgnores))
                {
                    if ($cle=='statut')
                    {
                        switch($valeur){
                            case '0':
                                $valeur = 'NON';
                                break;
                            case '1':
                                $valeur = 'OUI';
                                break;
                                case 'A':
                                $valeur= 'en';
                                break;
                        }
                    }if ($cle=='valider')
                    {
                        switch($valeur){
                            case 'A':
                                $valeur= 'En Attente';
                                break;
                            case 'Y':
                                $valeur= 'Validée';
                                break;
                            case 'N':
                                $valeur= 'Refusée';
                                break;
                        }
                    }if ($cle=='actifdate')
                    {
                        switch($valeur){
                            case 'Y':
                                $valeur= 'Activée';
                                break;
                            case 'N':
                                $valeur= 'Désactivée';
                                break;
                        }
                    }if ($cle=='horairedate')
                    {
                        switch($valeur){
                            case 'matin':
                                $valeur= 'Matin';
                                break;
                            case 'soir':
                                $valeur= 'Après Midi';
                                break;
                        }
                    }


                    $htmlLigne =
<<<HTMLLIGNE
<td>$valeur</td>
HTMLLIGNE;
                    $htmlBlocTd = $htmlBlocTd . $htmlLigne;
                }
            }

            // ajout du lien AFFICHER DETAILS
            switch ($nomTable) {
                case 'Actualite':
                    $showTable = '-'.$nomTable;
                    break;
                case 'Pages':
                    $showTable = '-'.$nomTable;
                    break;
                default:
                $showTable = '';
                break;
            }


            $boutonAfficher=
<<<CODEMODIF
<td class="text-center">
    <a class="action-show$showTable" data-table="$nomTable" data-id="$id" href="#show-detail">
        <img src="media/img/edit.png" alt="">
    </a>
</td>
CODEMODIF;

            //--------------------------------------

            $boutonSupprimer=
<<<CODESUPPR
    <td class="text-center">
        <a class="action-delete" data-table="$nomTable" data-id="$id" href="#show-detail">
            <img src="media/img/del.png" alt="">
        </a>
    </td>
CODESUPPR;

if($nomTable == 'Pages'){

            $codeHtml   =
<<<CODEHTML
<tr class="ligne-$id">

    $htmlBlocTd
    $boutonAfficher
</tr>
CODEHTML;
}
else{
  $codeHtml   =
<<<CODEHTML
<tr class="ligne-$id">

$htmlBlocTd
$boutonAfficher
$boutonSupprimer
</tr>
CODEHTML;
}


            $resultat .= $codeHtml;

        }

        $finHtml =
<<<CODEFINHTML
</tbody></table></div>
CODEFINHTML;

        $leResultat = $enteteHTML.$resultat.$finHtml;
        echo $leResultat;
    }

//==================================================================================================================================
//==================================================================================================================================
//==================================================================================================================================
    function readRubrique ($nomTable, $titre, $lang)
    {
        $pdo   = $this->getConnexion();

        $requeteSQL =
<<<CODESQL
SELECT * FROM `$nomTable`
WHERE `nom_interne` = '$titre'
AND `langue` = '$lang'
CODESQL;

        $tableauBind = [];
        $statement = $this->executeSQL($requeteSQL, $tableauBind);

        $ligne = $statement->fetch(PDO::FETCH_ASSOC);
        // ON EXTRAIT LES CHAMPS UTILES
        $id         = $ligne["id"];
        $titre      = $ligne["titre"];
        $texte      = $ligne["texte"];
        $date_maj   = $ligne["date_maj"];
        $langue     = $ligne["langue"];
        $nom_int    = $ligne["nom_interne"];
        $img1       = $ligne["image1"];
        $img2       = $ligne["image2"];
        $img3       = $ligne["image3"];
        $img1Nom    = $ligne["image1-nom"];
        $img2Nom    = $ligne["image2-nom"];
        $img3Nom    = $ligne["image3-nom"];

        if($nom_int == 'accueil') {

            $img1Time = !empty($img1) ? '?'.filemtime("../$img1"):'';
            $img2Time = !empty($img2) ? '?'.filemtime("../$img2"):'';
            $img3Time = !empty($img3) ? '?'.filemtime("../$img3"):'';

            $codeHtml =
<<<CODEHTML
<h2 class="titre">Page accueil</h2>
<p> Date de la dernière modification : $date_maj</p>
<form class="ajax" method="post" action="">
    <div class="m-15"><textarea name="texte" class="tiny">$texte</textarea></div>
    <fieldset>
        <legend>Les services</legend>
        <div>
            <input type="hidden" name="img1" value="$img1" />
            <input type="file" name="uploadImg1" id="uploadImg1" />
            <p class="m-15"><label for="image1-nom">Nom du 1er service</label><input type="text" name="image1-nom" id="image1-nom" value="$img1Nom" /></p>
            <div class="previewImg"><img src="../$img1$img1Time" /></div>
        </div>
        <div>
            <input type="hidden" name="img2" value="$img2" />
            <input type="file" name="uploadImg2" id="uploadImg2" />
            <p class="m-15"><label for="image2-nom">Nom du 2ème service</label><input type="text" name="image2-nom" id="image2-nom" value="$img2Nom" /></p>
            <div class="previewImg"><img src="../$img2$img2Time" /></div>
        </div>
        <div>
            <input type="hidden" name="img3" value="$img3" />
            <input type="file" name="uploadImg3" id="uploadImg3" />
            <p class="m-15"><label for="image3-nom">Nom du 3ème service</label><input type="text" name="image3-nom" id="image3-nom" value="$img3Nom" /></p>
            <div class="previewImg"><img src="../$img3$img3Time" /></div>
        </div>
    </fieldset>
    <input type="hidden" name="controller" value="majRubriques" />
    <input type="hidden" name="rub" value="$nom_int" />
    <input type="hidden" name="id" value="$id" />
    <button type="submit" class="btn btn-success">Valider</button>
    <div class="feedback"></div>
</form>
CODEHTML;

        }else if($nom_int == 'slider') {

            $img1Time = !empty($img1) ? '?'.filemtime("../$img1"):'';
            $img2Time = !empty($img2) ? '?'.filemtime("../$img2"):'';
            $img3Time = !empty($img3) ? '?'.filemtime("../$img3"):'';

            $codeHtml =
<<<CODEHTML
<h2 class="titre">Rubrique slider</h2>
<p> Date de la dernière modification : $date_maj</p>
<form class="ajax" method="post" action="">
    <fieldset>
        <legend>Les slides</legend>
        <div>
            <input type="hidden" name="img1" value="$img1" />
            <input type="file" name="uploadImg1" id="uploadImg1" class="m-15" />
            <div class="previewImg"><img src="../$img1$img1Time" /></div>
        </div>
        <div>
            <input type="hidden" name="img2" value="$img2" />
            <input type="file" name="uploadImg2" id="uploadImg2" class="m-15" />
            <div class="previewImg"><img src="../$img2$img2Time" /></div>
        </div>
        <div>
            <input type="hidden" name="img3" value="$img3" />
            <input type="file" name="uploadImg3" id="uploadImg3" class="m-15" />
            <div class="previewImg"><img src="../$img3$img3Time" /></div>
        </div>
    </fieldset>
    <input type="hidden" name="controller" value="majRubriques" />
    <input type="hidden" name="rub" value="$nom_int" />
    <input type="hidden" name="id" value="$id" />
    <button type="submit" class="btn btn-success">Valider</button>
    <div class="feedback"></div>
</form>
CODEHTML;

        }else{
            $prevImg = $msgImg = '';
            if(!empty($img1)) {
                $prevImg = '<div class="previewImg"><img src="../'.$img1.'?'.filemtime("../$img1").'" /></div>';
                $msgImg = '<br><a class="action-delete-img" data-table="'.$nomTable.'" data-id="'.$id.'" data-field="image1" href="#delete_img-'.$id.'">
                        <img src="media/img/del.png"> Supprimer l\'image.
                    </a><br><br>
                    <div class="feedbackSuppr"></div>';
            }

            $codeHtml =
<<<CODEHTML
<h2 class="titre">Rubrique $titre</h2>
<p> Date de la dernière modification : $date_maj</p>
<form class="ajax" method="post" action="">
    <div class="m-15"><textarea name="texte" class="tiny">$texte</textarea></div>
    <fieldset>
        <legend>Image de la page</legend>
        <input type="hidden" name="img1" value="$img1" />
        <input type="file" name="uploadImg1" id="uploadImg1" class="m-15" />
        $prevImg
        $msgImg
    </fieldset>
    <input type="hidden" name="controller" value="majRubriques" />
    <input type="hidden" name="rub" value="$nom_int" />
    <input type="hidden" name="id" value="$id" />
    <button type="submit" class="btn btn-success">Valider</button>
    <div class="feedback"></div>
</form>
CODEHTML;

        }

        echo $codeHtml;

    }

//==================================================================================================================================
//==================================================================================================================================
//==================================================================================================================================
    function readPage ($nomTable, $titre, $lang)
    {
        $pdo   = $this->getConnexion();

        $requeteSQL =
<<<CODESQL
SELECT * FROM `$nomTable`
WHERE `nom_interne` = '$titre'
AND `langue` = '$lang'
CODESQL;

        $tableauBind = [
                ];

        $statement = $this->executeSQL($requeteSQL, $tableauBind);

        $ligne = $statement->fetch(PDO::FETCH_ASSOC);
        // ON EXTRAIT LES CHAMPS UTILES
        $id         = $ligne["id"];
        $meta_title = $ligne["meta_title"];
        $meta_desc  = $ligne["meta_desc"];
        $date_maj   = $ligne["date_maj"];
        $langue     = $ligne["langue"];
        $nom_int    = $ligne["nom_interne"];

        $langueUP = strtoupper($langue);

        $codeHtml =
<<<CODEHTML
<h2 class="titre_actu">Page $nom_int</h2>
<p> Date de la dernière modification : $date_maj</p>
<br>
<p>Langue : <strong>$langueUP</strong></p>
<br><br>
<form class="ajax" method="post" action="" style="max-width:800px;">
    <p class="row"><label for="meta_title" class="col-xs-2">META TITLE : </label><input class="col-xs-10" type="text" name="meta_title" value="$meta_title" /></p>
    <p class="row"><label for="meta_desc" class="col-xs-2">META DESC : </label><textarea class="col-xs-10" name="meta_desc">$meta_desc</textarea></p>
    <input type="hidden" name="controller" value="majPages" />
    <input type="hidden" name="id" value="$id" />
    <button type="submit" class="btn btn-success">Valider</button>
    <div class="feedback"></div>
</form>
CODEHTML;

        echo $codeHtml;

    }

//==================================================================================================================================
//==================================================================================================================================
//==================================================================================================================================
    function uploadImage ($nameInput, $nomImg, $largeurMini, $hauteurMini)
    {
        $cheminWorkspace = "";
        $cheminMini      = "";

        // VERIFIER SI IL Y UN FICHIER UPLOADE
        if (isset($_FILES["$nameInput"]))
        {
            $cheminTemporaire   = $_FILES["$nameInput"]["tmp_name"];
            $nomFichierOrigine  = $_FILES["$nameInput"]["name"];
            // CONVERTIR EN NOMBRE
            $tailleFichier      = intval($_FILES["$nameInput"]["size"]);
            $codeErreur         = intval($_FILES["$nameInput"]["error"]);

            // ON VEUT UN FICHIER BIEN TRANSFERE ET NON VIDE
            if (($codeErreur == 0) && ($tailleFichier > 0))
            {
                // VERIFIER SI LE SUFFIXE EST AUTORISE
                $extension = pathinfo($nomFichierOrigine, PATHINFO_EXTENSION);
                // CONVERTIR EN MINUSCULES
                $extension = strtolower($extension);

                $tabExtensionOk = [ "jpeg", "jpg", "png", "gif", "svg" ];

                if (in_array($extension, $tabExtensionOk))
                {
                    // DEPLACER LE FICHIER DANS NOTRE WORKSPACE
                    // SECURITE: IL FAUT VERIFIER SI LE SUFFIXE EST AUTORISE
                    // SECURITE2: IL FAUT NORMALISER LE NOM DU FICHIER
                    $cheminWorkspace = "../media/img/$nomImg.$extension";
                    move_uploaded_file($cheminTemporaire, $cheminWorkspace);

                    if ($extension != "svg")
                    {
                        // ON PEUT CREER UN VERSION MINIATURE
                        $cheminMini = "../media/img/mini-$nomImg.$extension";

                        // LA FONCTION convertMini VA CREER UNE VERSION MINIATURE
                        $cheminMini = $this->convertMini($cheminWorkspace, $extension, $cheminMini, $largeurMini, $hauteurMini);
                    }
                }
            }
        }
        return [ $cheminWorkspace, $cheminMini ];
    }

//==================================================================================================================================
//==================================================================================================================================
//==================================================================================================================================
    function convertMini ($cheminWorkspace, $extension, $cheminMini, $largeurMini, $hauteurMini)
    {
        $resultat = "";

        // CHARGER L'IMAGE SOURCE $cheminWorkspace DANS LA MEMOIRE PHP
       $imageSource = FALSE;
        switch ($extension)
        {
            case 'jpg':
            case 'jpeg':
                $imageSource = imagecreatefromjpeg($cheminWorkspace);
                break;
            case 'gif':
                $imageSource = imagecreatefromgif($cheminWorkspace);
                break;
            case 'png':
                $imageSource = imagecreatefrompng($cheminWorkspace);
                break;
            default:
                $imageSource = FALSE;
                break;
        }

        if ($imageSource != FALSE)
        {

            $largeurSource = imagesx($imageSource);
            $hauteurSource = imagesy($imageSource);

            //CALCUL DE LA PROPORTION
            if ($largeurMini>0) {
                $hauteurMini = ($hauteurSource*$largeurMini) / $largeurSource;
            }else if($hauteurMini>0){
                $largeurMini = ($largeurSource*$hauteurMini) / $hauteurSource;
            }else{
                $largeurMini = $largeurSource;
                $hauteurMini = $hauteurSource;
            }

            // RESERVER LA MEMOIRE PHP POUR L'IMAGE MINI
            $imageMini = FALSE;
            $imageMini = imagecreatetruecolor($largeurMini, $hauteurMini);

            // GARDER LA TRANSPARENCE
            imagealphablending($imageMini, false);
            imagesavealpha($imageMini, true);

            // CREER LA COPIE EN MINIATURE
            if ($imageMini != FALSE)
            {

                $sourceX = 0;
                $sourceY = 0;

                imagecopyresampled(
                    $imageMini,     $imageSource,
                    0,              0,              // ORIGINE MINI
                    $sourceX,       $sourceY,       // ORIGINE SOURCE
                    $largeurMini,   $hauteurMini,   // LARGEUR ET HAUTEUR MINI
                    $largeurSource, $hauteurSource  // LARGEUR ET HAUTEUR SOURCE
                );

                // ENREGISTRER L'IMAGE MINI DANS LE FICHIER $cheminMini
                switch ($extension)
                {
                    case 'jpg':
                    case 'jpeg':
                        imagejpeg($imageMini, $cheminMini, 100);
                        break;
                    case 'gif':
                        imagegif($imageMini, $cheminMini);
                        break;
                    case 'png':
                        imagepng($imageMini, $cheminMini, 9);
                        break;
                    default:
                        break;
                }

                $resultat = $cheminMini;
            }

        }
        return $resultat;
    }

//==================================================================================================================================
//==================================================================================================================================
//==================================================================================================================================
    function uploadImgProd ($file)
    {
        $listImg = array();

        foreach($file['error'] as $key => $val) {
            if($val == 0) { // SI UPLOAD OK

                $cheminTemporaire   = $file['tmp_name'][$key];
                $nomFichierOrigine  = $file['name'][$key];
                // CONVERTIR EN NOMBRE
                $tailleFichier      = intval($file['size'][$key]);

                // ON VEUT UN FICHIER NON VIDE
                if ($tailleFichier > 0)
                {
                    // VERIFIER SI LE SUFFIXE EST AUTORISE
                    $extension = pathinfo($nomFichierOrigine, PATHINFO_EXTENSION);
                    // CONVERTIR EN MINUSCULES
                    $extension = strtolower($extension);

                    $tabExtensionOk = [ "jpeg", "jpg", "png", "gif", "svg" ];

                    if (in_array($extension, $tabExtensionOk))
                    {
                        $listImg[] = ['nomTmp' => $cheminTemporaire, 'ext' => $extension];
                    }
                }

            }
        }

        return $listImg;
    }

//==================================================================================================================================
//==================================================================================================================================
//==================================================================================================================================
    function uploadImg ($nameInput, $nomImg, $largeurMax=0, $hauteurMax=0, $type='')
    {
        $cheminWorkspace = "";

        // VERIFIER SI IL Y UN FICHIER UPLOADE
        if (isset($_FILES["$nameInput"]))
        {
            $cheminTemporaire   = $_FILES["$nameInput"]["tmp_name"];
            $nomFichierOrigine  = $_FILES["$nameInput"]["name"];
            // CONVERTIR EN NOMBRE
            $tailleFichier      = intval($_FILES["$nameInput"]["size"]);
            $codeErreur         = intval($_FILES["$nameInput"]["error"]);

            // ON VEUT UN FICHIER BIEN TRANSFERE ET NON VIDE
            if (($codeErreur == 0) && ($tailleFichier > 0))
            {
                // VERIFIER SI LE SUFFIXE EST AUTORISE
                $extension = pathinfo($nomFichierOrigine, PATHINFO_EXTENSION);
                // CONVERTIR EN MINUSCULES
                $extension = strtolower($extension);

                $tabExtensionOk = [ "jpeg", "jpg", "png", "gif", "svg" ];

                if (in_array($extension, $tabExtensionOk))
                {
                    // DEPLACER LE FICHIER DANS NOTRE WORKSPACE
                    // SECURITE: IL FAUT VERIFIER SI LE SUFFIXE EST AUTORISE
                    // SECURITE2: IL FAUT NORMALISER LE NOM DU FICHIER
                    if($type != '') {
                        $cheminWorkspace = "../media/upload/$type/$nomImg.$extension";
                        $cheminMini      = "../media/upload/$type/$largeurMax/$nomImg.$extension";
                    }else{
                        $cheminWorkspace = "../media/img/$nomImg.$extension";
                        $cheminMini      = "../media/img/$largeurMax/$nomImg.$extension";
                    }
                    move_uploaded_file($cheminTemporaire, $cheminWorkspace);

                    // CREATION MINIATURE
                    if($largeurMax > 0 || $hauteurMax > 0) {
                        $this->convertMini($cheminWorkspace, $extension, $cheminMini, $largeurMax, $hauteurMax);
                    }
                }
            }
        }
        return substr($cheminWorkspace,3);
    }

//==================================================================================================================================
//==================================================================================================================================
//==================================================================================================================================
    function uploadPDF ($nameInput, $nom)
    {
        $cheminWorkspace = "";

        // VERIFIER SI IL Y UN FICHIER UPLOADE
        if (isset($_FILES["$nameInput"]))
        {
            $cheminTemporaire   = $_FILES["$nameInput"]["tmp_name"];
            $nomFichierOrigine  = $_FILES["$nameInput"]["name"];
            // CONVERTIR EN NOMBRE
            $tailleFichier      = intval($_FILES["$nameInput"]["size"]);
            $codeErreur         = intval($_FILES["$nameInput"]["error"]);

            // ON VEUT UN FICHIER BIEN TRANSFERE ET NON VIDE
            if (($codeErreur == 0) && ($tailleFichier > 0))
            {
                // VERIFIER SI LE SUFFIXE EST AUTORISE
                $extension = pathinfo($nomFichierOrigine, PATHINFO_EXTENSION);
                // CONVERTIR EN MINUSCULES
                $extension = strtolower($extension);

                $tabExtensionOk = [ "pdf" ];

                if (in_array($extension, $tabExtensionOk))
                {
                    // DEPLACER LE FICHIER DANS NOTRE WORKSPACE
                    // SECURITE: IL FAUT VERIFIER SI LE SUFFIXE EST AUTORISE
                    // SECURITE2: IL FAUT NORMALISER LE NOM DU FICHIER
                    $cheminWorkspace = "../media/upload/pdf/$nom.$extension";
                    move_uploaded_file($cheminTemporaire, $cheminWorkspace);
                }
            }
        }
        return substr($cheminWorkspace,3);
    }

//----------------------------------------------------------------------------------------------------------------------------------

    // FIN DU CODE DE LA CLASSE Model
}
