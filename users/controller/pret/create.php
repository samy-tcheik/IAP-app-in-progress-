<?php 

require '../../../connexion/connection.php';

$data = [
    "type_employe_id" => $_POST['type_employe_id'],
    "montant" => $_POST['montant']
];

$query = $bdd->prepare('INSERT INTO prets (type_employe_id, montant)VALUES (:type_employe_id, :montant)');

$response = $query->execute($data);

header('location:../../prets_list.php');