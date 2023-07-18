<?php 
class DetailAppro extends Model{
    public  int $id;
    public int $qteAppro;
    public int $articleConfId;
    public int $approId;
     protected static function tableName(){
               return "detail_appro_article_conf";
      }

      //Many-to-One relationship
      public ArticleConfection $articleModel;
      public function __construct()
      {
          $this->articleModel = new ArticleConfection;
      }
      
      public function article(){
        return $this->articleModel-> find($this->articleConfId);
      }

      public  function findDetailByAppro(int $approId){
         return parent::query("select * from ".  $this->tableName() ." where approId=:approId  ",["approId"=>$approId]);
      }
     
}