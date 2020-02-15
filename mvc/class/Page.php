<?php
class Page
{
    // DEBUT DU CODE DE LA CLASSE Page
    public $home = "";
    
    protected $model;
    
    // METHODES
    // constructeur
    function __construct ()
    {
        $this->model      = null;
    }
    
//GETTER DES OBJETS DEFINIS DANS LE __construct()    
    function getModel()
    {
        if ($this->model == null)
        {
            $this->model = new Model;
        }
        return $this->model;
    }
    


// METHODES DE LA CLASSE Page   

//- pour recuperer l'adresse de la page courante
    function getUrl ()
    {
        $result = "";
        
        $uri = $_SERVER["REQUEST_URI"];
        $path = parse_url($uri, PHP_URL_PATH);

        $nomFichier = pathinfo($path, PATHINFO_FILENAME);
        $extension  = pathinfo($path, PATHINFO_EXTENSION);

        $result = [$nomFichier, $extension, $path];
        
        return $result;
    }


//- récupérer la liste des pages administrées
    function getListePages()
    {
        $model=$this->getModel();
        $pdo=$model->getConnexion();

        $req='SELECT DISTINCT `nom_interne` FROM `Pages`';
        $bind=[];

        $statement=$model->executeSQL($req,$bind);
        $listePages=$statement->fetchAll(PDO::FETCH_COLUMN, 0);

        return $listePages;
    }


//- pour afficher la page demandée en fonction de l'URL
    function afficherPage()
    {
        $model=$this->getModel();
        $pdo=$model->getConnexion();

        $nomPage = $this->getUrl();
        if($nomPage[0]==$this->home)
        {
            $nomPage[0]="index";
        }

        //gestion de la langue
        $langue = isset($_SESSION['langue']) ? $_SESSION['langue']:'fr';

        $listePages=$this->getListePages();

        $infos='';
        // On teste s'il on affiche une page administrée pour récupérer les infos de la base
        // Sinon on affichera les infos par défaut (A DEFINIR EN BASE DE DONNEES.. )
        if(in_array($nomPage[0], $listePages)) //PAGE ADMINISTREE
        {
            $page = $nomPage[0];
        }
        else// INFOS PAR DEFAUT
        {
            if(preg_match('/\/actualite\/.*-[0-9]+/', $nomPage[2])) {
                $page = $nomPage[0] = 'actualite-detail';
                $listUrl = explode('-', $nomPage[2]);
                $idActu = end($listUrl);
                
                $actu = $model->getActuFromId($idActu);
                if($actu == null) {
                    $this->afficher404();
                }
            }else{
                $page = 'index';
            }
        }
        
        $req="SELECT * FROM `Pages` WHERE `nom_interne`='".$page."' AND `langue`='".$langue."'";
        $bind=[];

        $statement=$model->executeSQL($req,$bind);
        $result=$statement->fetch(PDO::FETCH_ASSOC);
        $meta_title = $infos.$result['meta_title'];
        $menu = $result['menu'];
        $meta_desc = $result['meta_desc'];

        
        $cheminSolo = 'mvc/view/'.$nomPage[0].'.php';
        
        $cheminPage = 'mvc/view/cont-'.$nomPage[0].'.php';

        if (is_file($cheminSolo))
        {
            include($cheminSolo);
        }
        elseif ($nomPage[0] == 'maj') {
            header("Location: /maj/index.php");
            exit;
        }
        elseif (!is_file($cheminPage))
        {
            $this->afficher404();
        }
        else
        {
            $currentPage = $nomPage[0];
            include("mvc/view/header.php");
            include($cheminPage);
            include("mvc/view/footer.php");
        }
    }
    
    function afficher404() {
        header("HTTP/1.1 404 Not Found");
        $langue = isset($_SESSION['langue']) ? $_SESSION['langue']:'fr';
        $currentPage = '404';
        $meta_desc = "La page demandée n'existe pas !";
        $meta_title = 'Hydratis - page inexistante';
        include("mvc/view/header.php");
        include("mvc/view/404.php");
        include("mvc/view/footer.php");
        exit;
    }

    // FIN DU CODE DE LA CLASSE Page
}