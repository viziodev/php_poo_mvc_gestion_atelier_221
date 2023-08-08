<?php 
 require "./../models/ArticleConfection.php";
 require "./../models/DetailAppro.php";
 require "./../models/Appro.php";
class ApproController extends Controller {
    
    
   public function __construct()
   {
     
   }
    
     public  function index(){
          $this->view('appro/liste.appro',[
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