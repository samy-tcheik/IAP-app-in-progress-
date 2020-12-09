<?php

require '../../../connexion/connection.php';

$query = $bdd->query('DELETE FROM mensualite WHERE mensualite_id = '.$_POST['id'].'');

$query->execute();

header('location:../../mensualite_list.php');