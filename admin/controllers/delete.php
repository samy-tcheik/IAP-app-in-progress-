<?php

require '../../connexion/connection.php';

$query = $bdd->query('DELETE FROM clients WHERE id = '.$_POST['id'].'');

$query->execute();

header('Location:../suppression.php');