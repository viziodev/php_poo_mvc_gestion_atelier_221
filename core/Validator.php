<?php 
class Validator{
    public static array $errors = [];
    public static function isVide($field,$key,$message="ce champ est obligatoire"){
          if(empty($field)){
              self::$errors[$key]=$message;
          }
    }

    public static function validate(): bool{
        return count(self::$errors)==0;
    }
}