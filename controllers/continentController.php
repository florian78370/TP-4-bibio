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
    break;
    case 'valideForm' :    
    break;
}