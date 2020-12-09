<?php


require '../../connexion/connection.php';

if ($_POST['validation'] === '0') {
    $val = 1;
} else {
    $val = 0;
}

$query = $bdd->query('UPDATE clients SET validation = '.$val.' WHERE id = '.$_POST['id'].'');

$query->execute();

header('Location:../validation.php');