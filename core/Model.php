<?php 
 abstract class Model extends Database {
     
    //SOLID  //Single Responsability

        protected  abstract static function tableName();

           public static function query(string $sql, array $data=[],bool $single=false){
                //1-Connexion a la BD
                $bdd = parent::openConnexion();
            //3- EFFECTUE LA REQUETE ==> CHANGE 2
                 $req = $bdd->prepare($sql);
                 $req->execute($data);
                $req->setFetchMode(PDO::FETCH_CLASS,get_called_class());
                if($single){
                  $data= $req->fetch();
                }else{
                    $data= $req->fetchAll();
                }
              $req->closeCursor();
             return $data  ;
           }
           
         public static function all(){
             return self::query('SELECT * FROM ' .static::tableName());
         }
         public static function find($id){
           return self::query('SELECT * FROM '.static::tableName().' WHERE id = :id',["id"=>$id],true); 
         }

         //executeUpdate()
         
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