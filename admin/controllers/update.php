<?php

require '../../connexion/connection.php';

$data = [
    "matricule" => $_POST['matricule'],
    "nom" => $_POST['nom'],
    "prenom" => $_POST['prenom'],
    "email" => $_POST['email'],
    "numpermis" => $_POST['numpermis'],
    "structure" => $_POST['structure'],
    "fonction" => $_POST['fonction'],
    "type" => $_POST['type'],
    "date" => $_POST['date']
];

$query = $bdd->prepare('UPDATE clients SET matricule = :matricule, nom = :nom, prenom = :prenom, email = :email, numpermis = :numpermis, structure = :structure, fonction = :fonction, type_employe_id = :type, date = :date WHERE id = '.$_POST['id'].'');


$query->execute($data);

header('Location:../modification.php');