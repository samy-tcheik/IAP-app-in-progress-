<?php

require '../../../connexion/connection.php';

$query = $bdd->query('DELETE FROM prets WHERE pret_id = '.$_POST['id'].'');

$query->execute();

header('location:../../prets_list.php');