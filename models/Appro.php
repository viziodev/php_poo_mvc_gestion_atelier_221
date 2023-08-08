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

   public function formatPaiement():string {
      return $this->paiement==true?"Payer":"Impayer";
   }

   public static function updatePaiement(int $approId,int $statut=1)  {
      return self::executeUpdate("UPDATE `appro` SET `paiement` = :statut WHERE `appro`.`id` = :approId",['approId'=>$approId,"statut"=>$statut]);
      
   }
    
}