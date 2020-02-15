<?php
class Page
{
    // DEBUT DU CODE DE LA CLASSE Page
    public $home = "maj";
    
    protected $model;
    protected $view;
    protected $controller;
    
    // METHODES
    // constructeur
    function __construct ()
    {
        $this->model      = null;
        $this->view       = null;
        $this->controller = null;
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
    
    function getView()
    {
        if ($this->view == null)
        {
            $this->view = new View;
        }
        return $this->view;
    }
    
    function getController()
    {
        if ($this->controller == null)
        {
            $model = $this->getModel();
            $this->controller = new Controller;
        }
        return $this->controller;
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

        $result = [$nomFichier, $extension];
        
        return $result;
    }


//- pour afficher la page demandée en fonction de l'URL
    function afficherPage()
    {
        $model=$this->getModel();

        $nomPage = $this->getUrl();
  
        if($nomPage[0]==$this->home)
        {
            $nomPage[0]="index";
        }
        
        if($nomPage[0] == 'export-devis') {
            
            include("mvc/controller/ctrl-exportDevis.php");
            
        }else{
        
            $cheminSolo = 'mvc/view/'.$nomPage[0].'.php';
            
            $cheminPage = 'mvc/view/cont-'.$nomPage[0].'.php';

            if (is_file($cheminSolo))
            {
                include($cheminSolo);
            }
            elseif (!is_file($cheminPage))
            {
                header("HTTP/1.1 404 Not Found");
                $cheminPage="mvc/view/404.php";
            }
            else
            {
                
                include("mvc/view/header.php");
                include($cheminPage);
                include("mvc/view/footer.php");
            }
            
        }
    }

    // FIN DU CODE DE LA CLASSE Page
}