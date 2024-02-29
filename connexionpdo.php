<?php
$hostnom = 'host=btssio.dedyn.io';
$usernom = 'FORGETF';
$password = '21/12/2004';
$bdd = 'FORGETF_bibio';

try {
    $monPdo = new PDO("mysql:$hostnom;dbname=$bdd;charset=utf8", $usernom, $password);
    $monPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
    $monPdo = null;
}
?>