<?php 
 function dd($data) {
      dump($data);
      die();
      
}

function dump($data) {
      echo "<pre>";
       var_dump($data);
      echo "</pre>";
     
      
}

function  dateFr($date):string{
      $date = new DateTime($date);
    return  $date->format('d-m-Y ');
}

function  asset(string $path){
      echo WEB_URL."ressources/$path";
}