<?php  

require "./../models/Categorie.php";
class CategorieController extends Controller { 
    /**
     * lister Categorie
     *
     * @return mixed
     */
    public function index() {
           $datas=Categorie::all();
           $this->view('categorie/liste',["datas" => $datas]);
        
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

        Validator::isVide($_POST["libelle"],"libelle");
        
        if(Validator::validate()){
          try {
              Categorie::create([
              "libelle" => $_POST["libelle"]
            ]);
          } catch (PDOException $th) {
              //die($th->getMessage());
              Validator::$errors['libelle'] = "le libelle existe deja";
          }
          
        }
          Session::set("errors",Validator::$errors);
        
        $this->redirect("categorie");
      }
}