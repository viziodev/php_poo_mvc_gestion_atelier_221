<?php 
class Model{
     protected static function tableName(){
        
     }

     
      public static function all(){
            //1-Connexion a la BD
            $bdd = new PDO('mysql:host=127.0.0.1:8889;dbname=gestion_atelier_php_221;charset=utf8', 'root', 'root');
            dd(self::tableName());
            $req = $bdd->prepare('SELECT * FROM '.self::tableName());
            //3- EFFECTUE LA REQUETE ==> CHANGE 2
              $req->execute();
            //4- FIN DE LA REQUETE ==> CHANGE 3
               $data=$req->fetchAll(PDO::FETCH_CLASS,get_class());
              $req->closeCursor();
              return $data  ;
            
        }
}