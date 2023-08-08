<?php 
 require "./../models/ArticleConfection.php";

class ProductionController extends Controller {

   public function __construct()
   {
     
   }
    
     public  function index(){
          $this->view('production/config',[
            "datas"=>Appro::all()
          ]);
     }
    public  function create(){
        
      }       
      public  function store(){
        
      }

        public  function updatePaiement(){
            $idAppro=$_POST["id_appro"];
            Appro::updatePaiement($idAppro);
            $this->redirect("appro");
        }
}