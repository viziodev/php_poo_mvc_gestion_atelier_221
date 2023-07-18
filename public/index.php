<?php
require_once "../core/Controller.php";
require_once "../controllers/CategorieController.php";
require_once "../controllers/ArticleConfectionController.php";
//require "./../models/ArticleConfection.php";
require_once "../helpers/help.php";


$ctrl =new CategorieController;
$ctrlArticle =new ArticleConfectionController ;
if(isset($_GET["path"])){
  $path = $_GET["path"];
  if( $path=="categorie" ){
    $ctrl->index();
  }elseif($path=="article"){
    $ctrlArticle->index();
  }
}