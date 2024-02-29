<?php 
class Nationalite {

    /** 
     * numero du Nationalite
     * 
     * @var int
     */
    private $num;

    /**
     * Libelle du Nationalite
     * 
     * @var string 
     */
    private $libelle;

    /**
     * num continent (clé étrangère) relié à num de Continent 
     *
     * @var int
     */
    private $numcontinent;
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
     * renviue l'object continent associé
     * 
     * @return continent 
     */ 
    public function getNumContinent() : continent
    {
        return continent::findById($this->numcontinent);
    }

    /**
     * ecrit le num continent
     * 
     *@param continent $continent
     * @return  self
     */ 
    public function setNumcontinent(continent $continent) : self
    {
        $this->numcontinent = $continent->getNum();

        return $this;
    }
    
    /**
     * Retourne l'ensemble des Nationalite 
     *
     * @return Nationalite[] tableau d'object Nationalite 
     */
    public static function findAll() :array
    {
       $req=MonPdo::getInstance()->prepare("select n.num, n.libelle as 'libNation', c.libelle as 'libContinent' from nationalite n, continent c where n.numContinent=c.num");
       $req->setFetchMode(PDO::FETCH_OBJ);
       $req->execute();
       $lesResultats=$req->fetchAll();
        return $lesResultats;
    }
      /**
       * Trouve une Nationalite par son num
       *
       * @param integer $id numéro dd Nationalite 
       * @return Nationalite object Nationalite trouvé
       */
    public static function findById(int $id) : Nationalite 
    {
      $req=MonPdo::getInstance()->prepare("Select * from Nationalite where num= :id");
      $req->setFetchMode(PDO::FETCH_CLASS/PDO::FETCH_PROPS_LATE,'Nationalite');
      $req->bimdParam(':id', $id);
      $req->execute();
      $lesResultats=$req->fetch();
       return $lesResultats;
   }
   /**
    * Permet d'ajouter une Nationalite 
    *
    * @param continent $Nationalite Nationalite à ajouter
    * @return integer resultat (1 si l'opération a reussi, 0 sinon)
    */
   public static function add(Nationalite $Nationalite) :int
   {
    $req=MonPdo::getInstance()->prepare("insert into Nationalite(libelle,numcontinent) values(:libelle, :numcontinent) where num= :id");
    $req->bimdParam(':libelle', $Nationalite->getLibelle());
    $req->bimdParam(':numcontinent', $Nationalite->numcontinent());
    $nb=$req->execute();
     return $nb;
 }
 /**
  * Permet de modifier une Nationalite
  *
  * @param continent $Nationalite Nationalite à modifier
  * @return integer resultat (1 si l'opération a reussi, 0 sinon)
  */
 public static function update(Nationalite $Nationalite) :int 
 {
  $req=MonPdo::getInstance()->prepare("update continent set libelle= :libelle where num= :id");
  $req->bimdParam(':id', $Nationalite->getNum());
  $req->bimdParam(':libelle', $Nationalite->getLibelle());
  $req->bimdParam(':numcontinent', $Nationalite->numcontinent());
  $nb=$req->execute();
  $lesResultats=$req->fetch();
   return $nb;
  }
  /**
   * Permet de supprimer un Nationalite
   *
   * @param Nationalite $Nationalite
   * @return integer
   */
  public static function delete(Nationalite $Nationalite) :int
  {
    $req=MonPdo::getInstance()->prepare("update continent set libelle= :libelle where num= :id");
    $req->bimdParam(':id', $Nationalite->getNum());
    $nb=$req->execute();
     return $nb;
  }
  
}
?>