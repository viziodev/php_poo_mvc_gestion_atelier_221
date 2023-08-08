<?php 
 
class ArticleConfectionController extends Controller {
     /**
     * ArticleConfection
     *
     * @return mixed
     */
    public function index() {
        
            $this->view('article/liste');
        //view("article/liste.html");
        //$this->view("article/liste.html");
        /**
         * Lister Categorie
         * Lister Article
         * Lister Appro => Lister les Details
         * 
         */
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