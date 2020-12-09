<?php

require '../../../connexion/connection.php';

$request = $bdd->query('UPDATE mensualite SET mensualite = '.$_POST['mensualite'].', type_employe_id = '.$_POST['type_employe_id'].', annee = '.$_POST['annee'].' WHERE mensualite_id = '.$_GET['id'].'');


$request->execute();

header('location: ../../mensualite_list.php');