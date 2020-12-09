<?php

require '../../../connexion/connection.php';

$query =$bdd->query('UPDATE prets SET type_employe_id = '.$_POST['type_employe_id'].', montant = '.$_POST['montant'].' WHERE pret_id = '.$_GET['id'].'');

$query->execute();

header('location:../../prets_list.php');