<?php 
class Database{
    protected static PDO|null $bdd=null;
    public static function openConnexion(){
        try {
            if(self::$bdd==null){
                self::$bdd = new PDO('mysql:host=127.0.0.1:8889;dbname=gestion_atelier_php_221;charset=utf8', 'root', 'root');   
            }
            return self::$bdd;
        } catch (\Exception $th) {
            dd($th->getMessage());
        }
        
    }

     public static function closeConnexion(){
           self::$bdd=null;
    }

    
    
    
}