<?php
$action=$_GET['action'];
switch($action){
    case'list' :
    $lescontinent=$Continent::findAll();
    include('vues/listecontinent.php');
    break;
    case 'add' :
    break;
    case 'update' :
    break;
    case 'delete' :    
    break;
    case 'valiseForm' :    
    break;
}