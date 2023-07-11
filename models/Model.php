<?php 
 abstract class Model extends Database {
     
        protected  abstract static function tableName();
         public static function all(){
            //1-Connexion a la BD
             $bdd = parent::openConnexion();
            //3- EFFECTUE LA REQUETE ==> CHANGE 2
              $req = $bdd->prepare('SELECT * FROM ' .static::tableName());
              $req->execute();
            //4- FIN DE LA REQUETE ==> CHANGE 3
              $data=$req->fetchAll(PDO::FETCH_CLASS,get_called_class());
              $req->closeCursor();
             return $data  ;
            
         }
         public static function find($id){
            $bdd = parent::openConnexion();
            $req = $bdd->prepare('SELECT * FROM '.static::tableName().' WHERE id = :id');
            $req->bindValue(':id',$id);
            $req->setFetchMode(PDO::FETCH_CLASS,get_called_class());
            //$req->execute(['id' => $id]);
            $req->execute();
            $data=$req->fetch();
            $req->closeCursor();
            return $data;
            
         }
         public static function create($data){ 
            $bdd = parent::openConnexion();
            $req = $bdd->prepare('INSERT INTO '.static::tableName().' ('.implode(',',array_keys($data)).') VALUES (:'.implode(',:',array_keys($data)).')');
            $req->execute($data);
            $req->closeCursor();
            return self::find($bdd->lastInsertId());
         }
         public static function update($id,$data){
          
            $bdd = parent::openConnexion();
            $req = $bdd->prepare('UPDATE '.static::tableName().' SET '.implode(',',array_keys($data)).' = :'.implode(',',array_keys($data)).' WHERE id = :id');
            $req->bindValue(':id',$id);
            $req->execute($data);
            $req->closeCursor();
            return;
         }
         public static function delete($id){    
            $bdd = parent::openConnexion(); 
            $req = $bdd->prepare('DELETE FROM '.static::tableName().' WHERE id = :id');
            $req->bindValue(':id',$id);
            $req->execute();
            $req->closeCursor();
            return;
         }
         
}