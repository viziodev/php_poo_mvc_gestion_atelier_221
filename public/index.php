<?php
require_once "../core/bootstrap.php";
require_once "../core/Controller.php";
require_once "../controllers/CategorieController.php";
require_once "../controllers/ArticleConfectionController.php";
require_once "../controllers/ApproController.php";
require_once "./../models/Categorie.php";

$categorie=new Categorie();
$categorie->setId(1);
dd($categorie->update([
     "libelle"=>"Test3"
]));



$ctrl =new CategorieController;
$ctrlArticle =new ArticleConfectionController ;

$ctrlAppro =new ApproController ;

if(isset($_REQUEST["path"])){
  $path = $_REQUEST["path"];
  if( $path=="categorie" ){
    $ctrl->index();
  }elseif($path=="article"){
    $ctrlArticle->index();
  }elseif($path=="store-categorie"){
    $ctrl->store();
  }elseif($path=="appro"){
    $ctrlAppro->index();
  }elseif($path=="update-paiement-appro"){
    $ctrlAppro->updatePaiement();
  }
}else{
     $ctrl->index();
}
  