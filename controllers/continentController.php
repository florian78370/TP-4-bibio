<?php
$action=$_GET['action'];
switch($action){
    case'list' :
    $lescontinent=Continent::findAll();
    include('vues/listecontinent.php');
    break;
    case 'add' :
        $mode="Ajouter";
        include('vues/formContinent.php');
    break;
    case 'update' :
        $mode="Modifier";
        include('vues/formContinent.php');
    break;
    case 'delete' : 
        $continent=Continent::findById($_GET['num']);
        $nb=Continent::delete($continent);
        if($nb==1) {
        $_SESSION['message']=["success" =>"Le continent a bien été supprimé "];
    }else{
        $_SESSION['message']=["danger" =>"Le continent n'a pas été supprimé "];
    }
    header('location : index.php?uc=continent&action=list');
    exit();
    break;
    case 'valideForm' :    
        $continent= new continent();
        if(empty($_POST['num'])){
        $continent->setLibelle($_POST['libelle']);
        $nb=Continent::add($continent);
        $message = "ajouté";
        }else{
            $continent->setLibelle($_POST['libelle']);
            $continent->setnum($_POST['libelle']);
            $nb=Continent::update($continent);
            $message = "modifié";
        }
    
        if($nb==1){
            $_SESSION['message']=["success" =>"Le continent a bien été $message"];
        }else{
            $_SESSION['message']=["danger" =>"Le continent a bien été $message"];
        }
        header("location: index.php?uc=continents&action=list");
        break;
}
