<?php 
class ArticleConfection extends Model{
    public int $id;
    public string $libelle;
    public int $qteStock;
    public string|null $photo;
    protected static function tableName(){
               return "article_vente";
    }
      //Cle etrangere
    public int $categorieId;
    
     //Navigabite   ManyToOne
     public function categorie(){
       return  Categorie::find($this->categorieId);
     }
     public function addArticleConfection(array $data){
    
     }
    
   
}