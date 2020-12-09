<?php
session_start();    
if(isset($_SESSION['fonction'])||$_SESSION['fonction']!='admin') {
    require('../connexion/connection.php');
    $nom= $_POST['nom'];
    $matricule = $_POST['matricule'];
    $prenom= $_POST['prenom'];
    $email= $_POST['email'];
    $password= md5($_POST['password']);
    $numpermis= $_POST['numero'];
    $structure= $_POST['structure'];
    $date = $_POST['date'];
    $type= $_POST['type'];
    $fonction= $_POST['fonction'];
   
    $reponse = $bdd->prepare("INSERT INTO clients (nom,matricule,prenom,email,password,numpermis,structure,type_employe_id,fonction,date)
     VALUES (:nom,:matricule,:prenom,:email,:password,:numpermis,:structure,:type,:fonction,:date)");
    $reponse->execute(array(
                          ':nom' => $nom,
                          ':matricule' => $matricule,
                          ':prenom' => $prenom,
                          ':email' => $email,
                          ':password' => $password,
                          ':numpermis' => $numpermis,
                          ':structure' => $structure,
                          ':type' => $type,
                          ':date' => $date,
                          ':fonction' => $fonction
                          ));


                           // avec cryptage MD5
                        // 'mdpass' => $pass_crypt)); sans cryptage MD5
 /*include('maffichagefinale.php');*/
 header('location: admin.php');
}


     else {
    $message =  "l'utilisateur existe déja.";
}
 //include('tables.php')
       
?>
