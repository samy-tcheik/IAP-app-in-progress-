<?php

require '../../../connexion/connection.php';

$data = [
    "mensualite" => $_POST['mensualite'],
    "type_employe_id" => $_POST['type_employe_id'],
    "annee" =>$_POST['annee']
];

$request = $bdd->prepare('INSERT INTO mensualite (mensualite, type_employe_id, annee) VALUES (:mensualite, :type_employe_id, :annee)');

$response = $request->execute($data);

header('location:../../mensualite_list.php');