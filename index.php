<?php session_start(); ?>
<?php include "vues/header.php";
include "modeles/continent.php";
include "modeles/monPdo.php";

$uc =empty($_GET['uc']) ? "accueil" : $_GET['uc'];

switch ($uc) {
    case 'accueil':
        include('vues/accueil.php');
        break;
    
    case 'continents' :
        include('controllers/continentController.php');
        break;
}
include "vues/footer.php";
?>