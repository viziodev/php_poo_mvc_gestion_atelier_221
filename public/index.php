<?php 
require "./../models/Categorie.php";
/**
 * Manipulation une Classe 
 *  1.Creer Objet   $objet =new NomClasse()
 *  2.Hydrater Objet ==> Donner un etat ==> Donner une valeur a ses attributs
 *     Methode 1 : Lorsque les attributs ont une visibilite a public
 *      -> : operateur de portee sur un objet 
 *      $objet->  : interface de la classe ==> correspond au attributs et methodes publiques de la classe
 *        $objet->attributPublic
 *        $objet->methodePublic()
 * 
 *   
 */
$categorie=new Categorie();
$categorie->setId(1);
$categorie->setLibelle("Tissu");
$categorie->create();

$categorie1=new Categorie();
$categorie1->setId(1)   
           ->setLibelle("Tissu");