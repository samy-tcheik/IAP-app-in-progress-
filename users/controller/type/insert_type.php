<?php

require '../../../connexion/connection.php';

$data = [
    "name" => $_POST['name']
];

$response = $bdd->prepare('INSERT INTO type_employe (name) VALUES (:name)');

$response->execute($data);

header('location:../../type_employe_list.php');