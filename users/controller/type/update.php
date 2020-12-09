<?php

require '../../../connexion/connection.php';

$data = [
    'name' => $_POST['name'],
    'id' => $_GET['id']
];

$query = $bdd->prepare('UPDATE type_employe SET name = :name WHERE type_employe_id = :id');

$query->execute($data);

header('location:../../type_employe_list.php');