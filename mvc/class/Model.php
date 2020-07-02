<?php
class Model
{
    // DEBUT DU CODE DE LA CLASSE Model

    // PROPRIETES

    // METHODES
    // constructeur
    function __construct ()
    {
        $this->pdo = null;
    }

    function getConnexion ()
    {
        if ($this->pdo == null)
        {
            // AU DEPART ON N'A PAS DE CONNEXION
            // ALORS ON LA CREE UNE SEULE FOIS

            // PARAMETRES DE CONNEXION A LA BASE DE DONNEES
            $nomDatabase  = "e_partenaire_hydratis";
            $userDatabase = "admin_hydra";
            $mdpDatabase  = "Aurelie12$";
            $hostDatabase = "hydratis-local.fr";

            // Data Source Name
            $dsn = "mysql:dbname=$nomDatabase;host=$hostDatabase;port=3308;charset=utf8;";

            // LA CLASSE PDO GERE LA CONNEXION ENTRE PHP ET MYSQL
            // ON CREE UN OBJET DE LA CLASSE PDO
            $this->pdo = new PDO($dsn, $userDatabase, $mdpDatabase);

            // AFFICHER LES MESSAGES D'ERREUR DE MYSQL
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        }

        // RENVOIE LA CONNEXION EN COURS
        return $this->pdo;
    }

//----------------------------------------------------------------------------------------------------------------------------------
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

//----------------------------------------------------------------------------------------------------------------------------------
    function getEmail ($name)
    {
        $email = $this->getInput($name);
        // FILTRE L'EMAIL
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        return $email;
    }

//----------------------------------------------------------------------------------------------------------------------------------
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



//----------------------------------------------------------------------------------------------------------------------------------

function getInfoPage($page='accueil'){
//    $pdo = $this->getConnexion(); C'est pas la peine la fonction executeSQL récupère déjà les données

    $requeteSQL =
<<<CODESQL
SELECT * FROM `Pages`
WHERE `nom_interne` = '$page'
CODESQL;

    $statement = $this->executeSQL($requeteSQL);
    return($statement->fetch(PDO::FETCH_ASSOC));
}

function getInfoActu($statut = 1){
  $pdo = $this->getConnexion();

  $requeteSQL =
<<<CODESQL
SELECT * FROM `actualite`
where statut = $statut
order by `date` 
CODESQL;

  $statement = $this->executeSQL($requeteSQL);
  return($statement->fetchAll(PDO::FETCH_ASSOC));

}

function getActuFromId($idActu){
    $pdo = $this->getConnexion();

    $requeteSQL =
<<<CODESQL
SELECT * FROM `actualite` actu
WHERE actu.id = :idActu
CODESQL;

    $tableauBind = [":idActu" => $idActu];
    $statement = $this->executeSQL($requeteSQL, $tableauBind);

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function formatDateActu($date='', $lang='fr') {
    $dateFormated = '';
    $listMonths = ["","Jan","Fév","Mar","Avr","Mai","Jun","Jul","Aoû","Sep","Oct","Nov","Déc"];

    $date = empty($date) ? time() : strtotime($date);

    if($lang == 'fr') {
        $dateFormated = date('j', $date).'<br>'.$listMonths[date('n', $date)];
    }else{
        $dateFormated = date('j', $date).'<br>'.date('M', $date);
    }

    return $dateFormated;
}

function checkMandoryField($field, $txt) {
    return empty(trim($txt)) ? "<p>Merci de saisir un $field.</p>":'';
}

function checkEmailFormat($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? '':'<p>Merci de saisir un email valide.</p>';
}

function checkTelFormat($tel) {
    $tel = preg_replace("/[^0-9+]/", '', $tel);
    return preg_match('/^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$/', $tel) ? '':'<p>Merci de saisir un téléphone valide.</p>';
}

function genLink($type='actualite', $id='',$nom) {
    $nom = $this->slugString($nom);
    return $type.'/'.$nom.'-'.$id;
}

function slugString($txt='') {
    $txt = strtolower($this->remove_accents($txt));
    //$txt = str_replace("'", ' ', $txt);
    $txt = preg_replace('/[^a-zA-Z0-9 ]/', ' ', $txt);
    $txt = preg_replace('/\s+/', ' ', $txt);
    $txt = str_replace(' ', '-', trim($txt));
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

    // FIN DU CODE DE LA CLASSE Model
}
