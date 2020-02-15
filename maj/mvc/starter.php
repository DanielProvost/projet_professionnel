<?php

// FONCTION A APPELER POUR CHARGER LA DEFINITION D'UNE CLASSE
function loadClass ($className)
{
    $className = str_replace('Emc\\', '', $className);
    $className = str_replace('\\', '/', $className);
    $className = str_replace('Env', '', $className);

    $cheminClass = "mvc/class/$className.php";
    $cheminClassEmc = "../emc/Emc/$className.php";//__DIR__."/../emc/Emc/$className.php"; // API Boxtal

    if (is_file($cheminClass)) {
        // CHARGE LE CODE DE LA CLASSE MVC
        include_once($cheminClass);
    }
    else if (is_file($cheminClassEmc)){
        include_once($cheminClassEmc);
    }
    else {echo 'probleme';}


/*
    $cheminClass = "mvc/class/$className.php";
    
    // SI LE FICHIER N'EXISTE PAS
    if (!is_file($cheminClass))
    {
        // ON VA CREER LE FICHIER A PARTIR D'UN TEMPLATE
        $cheminTemplate = "mvc/class/Template.php";
        if (is_file($cheminTemplate))
        {
            // LIRE LE CODE DU TEMPLATE
            $codeTemplate = file_get_contents($cheminTemplate);
            
            // CHANGER LE NOM DE LA CLASSE
            // https://secure.php.net/manual/fr/function.str-replace.php
            $codeClasse = str_replace("Template",   $className,          $codeTemplate);
            $codeClasse = str_replace("DATE",       date("Y-m-d H:i:s"), $codeClasse);
            $codeClasse = str_replace("AUTEUR",     "Faf",          $codeClasse);
            
            // CREER LE FICHIER DE LA CLASSE
            file_put_contents($cheminClass, $codeClasse);
        }
        
    }
    
    if (is_file($cheminClass))
    {
        // CHARGE LE CODE DE LA CLASSE
        include_once($cheminClass);
    }*/
}



// DIT A PHP D'ACTIVER LA FONCTION loadClass
// QUAND IL A BESOIN DE CHARGER LA DEFINITION D'UNE CLASSE
spl_autoload_register("loadClass");


// FORMULAIRES

function getInput ($name, $default="")
{
    $resultat = $default;
    
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
