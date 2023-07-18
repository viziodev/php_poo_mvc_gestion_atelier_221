<?php 
class Appro extends Model{
    public int $id;
    public string $fournisseur;
    public int $montant;
    public bool $paiement;
    public string $dateAppro;
    
    protected static function tableName(){
               return "appro";
    }
    public DetailAppro $detailAppro;
    public function __construct()
    {
        $this->detailAppro=new DetailAppro;
    }

   public function details() {
      return $this->detailAppro->findDetailByAppro($this->id);
   }
    
}