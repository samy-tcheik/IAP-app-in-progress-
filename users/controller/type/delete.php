<?php

require '../../../connexion/connection.php';

$query = $bdd->query('DELETE FROM type_employe WHERE type_employe_id = '.$_POST['id'].'');

$query->execute();

header('location:../../type_employe_list.php');