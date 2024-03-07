<?php include "header.php";
$action=$_GET['action'];
include "connexionpdo.php";


if($action == "Modifier"){
$num=$_GET['num'];
$req=$monPdo->prepare("select * from nationalite where num= :num");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->bindParam(':num', $num);
$req->execute();
$laNationalite=$req->fetch();

}

$reqContinent=$monPdo->prepare("select * from continent");
$reqContinent->setFetchMode(PDO::FETCH_OBJ);
$reqContinent->execute();
$lesContinents=$reqContinent->fetchAll();
?>
<div class="container mt-5">
<h2 class='pt-3 text-center'> <?php echo $action ?> un continent</h2>

<form action="index.php?uc=continent&action=valideForm <?php echo $action ?>" method="post" class="col-md-6 offset-md-3 border border-dark p-3">
  <div class="form-group">
    <label for='libelle'> Libellé </label>
    <input type="text" class='form-control' id='libelle' placeholder='Saisir le libellé' name='libelle' value="<?php if($action == "Modifier") {echo $continent->getlibelle() ;}?>">
  </div>

  <input type="hidden" id="num" name="num" value="<?php if($action == "Modifier") {echo $continent->getnum() ;}?>">
  <div class="row">
    <div class="col"> <a href="index.php?uc=continent&action=list" class='btn btn-warning btn-block'> Revenir à la liste</a></div>
    <div class="col"><button type='submit' class='btn btn-success btn-block'> <?php echo $action ?> </button></div>
  </div>
</form>

</div>  