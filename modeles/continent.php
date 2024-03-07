<?php 
class continent {



    /** 
     * numero du continent
     * 
     * @var int
     */
    private $num;

    /**
     * Libelle du continent
     * 
     * @var string 
     */
    private $libelle;

    /**
     * Get the value of num
     */
    public function getNum()
    {
      return $this->num;
    }

    /**
     * Lit le libelle
     * 
     * @return string 
     */
    public function getLibelle() : string
    {
      return $this->libelle;
    }

    /**
     * ecrit dans le libellé
     *
     * @param string $libelle
     * @return self
     */
    public function setLibelle(string $libelle) : self
    {
      $this->libelle = $libelle;

      return $this;
    }
    /**
     * Retourne l'ensemble des continents 
     *
     * @return continent[] tableau d'object continent 
     */
    public static function findAll() :array
    {
       $req=MonPdo::getInstance()->prepare("Select * from continent");
       $req->setFetchMode(PDO::FETCH_CLASS/PDO::FETCH_PROPS_LATE,'continent');
       $req->execute();
       $lesResultats=$req->fetchAll();
        return $lesResultats;
    }
      /**
       * Trouve un continent par son num
       *
       * @param integer $id numéro dd continent 
       * @return continent object continent trouvé
       */
    public static function findById(int $id) : continent 
    {
      $req=MonPdo::getInstance()->prepare("Select * from continent where num= :id");
      $req->setFetchMode(PDO::FETCH_CLASS/PDO::FETCH_PROPS_LATE,'continent');
      $req->bimdParam(':id', $id);
      $req->execute();
      $lesResultats=$req->fetch();
       return $lesResultats;
   }
   /**
    * Permet d'ajouter un continent 
    *
    * @param continent $continent continent à ajouter
    * @return integer resultat (1 si l'opération a reussi, 0 sinon)
    */
   public static function add(continent $continent) :int
   {
    $req=MonPdo::getInstance()->prepare("insert into continent(libelle) values(:libelle) where num= :id");
    $req->bimdParam(':libelle', $continent->getLibelle());
    $nb=$req->execute();
     return $nb;
 }
 /**
  * Permet de modifier un continent
  *
  * @param continent $continent continent à modifier
  * @return integer resultat (1 si l'opération a reussi, 0 sinon)
  */
 public static function update(continent $continent) :int 
 {
  $req=MonPdo::getInstance()->prepare("update continent set libelle= :libelle where num= :id");
  $req->bimdParam(':id', $continent->getNum());
  $req->bimdParam(':id', $continent->getLibelle());
  $nb=$req->execute();
  $lesResultats=$req->fetch();
   return $nb;
  }
  /**
   * Permet de supprimer un continent
   *
   * @param continent $continent
   * @return integer
   */
  public static function delete(continent $continent) :int
  {
    $req=MonPdo::getInstance()->prepare("update continent set libelle= :libelle where num= :id");
    $req->bimdParam(':id', $continent->getNum());
    $nb=$req->execute();
     return $nb;
  }
  
}
?>