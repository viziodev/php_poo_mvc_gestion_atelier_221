<?php 
class ArticleConfection extends Model{
    public int $id;
    public string $libelle;
    public float $prixAchat;
    public int $qteStock;
    public string|null $photo;
    protected static function tableName(){
               return "article_confection";
    }
      //Cle etrangere
    private int $categorieId;
    public function __construct(){  
    
    }
    
        //Navigabite   ManyToOne
    public function categorie(){
       return  Categorie::find($this->categorieId);
    }
   
   
}