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