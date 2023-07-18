<?php  
require "./../core/DataBase.php";
require "./../core/Model.php";
require "./../models/Categorie.php";

class CategorieController extends Controller { 
    /**
     * lister Categorie
     *
     * @return mixed
     */
    public function index() {
        $datas=Categorie::all();
        ob_start() ;
          require "../ressources/views/categorie/liste.html.php";  
           $content_for_view = ob_get_clean();
          require "../ressources/views/base.layout.html.php";  
    }
    /**
     * charger le Formulaire de Categorie
     *
     * @return mixed
     */
    public function create() {
        
    }

    /**
     * Ajouter une  Categorie en BD apres 
     * soummition du formulaire
     *
     * @return mixed
     */
      public function store() {
        
      }
}