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
         
         public static function create($data){ 
          
            
           $lastInsertId=self::executeUpdate('INSERT INTO '.static::tableName().' ('.implode(',',array_keys($data)).') VALUES (:'.implode(',:',array_keys($data)).')',$data);
           
           if($lastInsertId){
               return self::find($lastInsertId);   
           }
            return null;
         }
         public  function update(array $data){
            $dataUpdate=[...$data];
            // $dataUpdate['id']=$this->id;
            dd($dataUpdate);
            if(self::executeUpdate('UPDATE '.static::tableName().' SET '.self::sqlUpdate($data).' WHERE id = :id',$data)){
                return self::find($data['id']);
            }
               return null;
         }
          private static function sqlUpdate(array $data){
              $sql="set ";
              foreach($data as $key => $val){
                    $sql.="$key=: $key,";
              }
              return rtrim($sql ,','); 
          }
          protected static function executeUpdate(string $sql, array $data=[]){
            $bdd = parent::openConnexion();
           
            $req = $bdd->prepare($sql);
            $req->execute($data); 
            if(str_starts_with(strtolower($sql),"insert")){
              $data=$bdd->lastInsertId() ;
            }else{
                $req->rowCount();
            }
            $req->closeCursor();
            return $data;
         }
         public static function delete($id){    
            $bdd = parent::openConnexion(); 
             return self::executeUpdate('DELETE FROM '.static::tableName().' WHERE id = :id',["id"=>$id]);
         }
         
}