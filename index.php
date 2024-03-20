<?php  ob_start();
session_start(); ?>
<?php include "vues/header.php";
include "modeles/continent.php";
include "modeles/monPdo.php";
include "vues/messageFlash.php";

$uc =empty($_GET['uc']) ? "accueil" : $_GET['uc'];

switch ($uc) {
    case 'accueil':
        include('vues/accueil.php');
        break;
    
    case 'continent' :
        include('controllers/continentController.php');
        break;
}
include "vues/footer.php";
?>