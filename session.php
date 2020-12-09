<?php 
session_start();
ini_set('session.bug_compat_warn', 0);
ini_set('session.bug_compat_42', 0);
 

$bdd=new PDO('mysql:host=localhost;dbname=prets','root','');




if(isset($_POST['connexion']))
{ 
 //echo "ton 0000000000000";
	// bouton submit press? je traite le formulaire
										
	$Utilisateur = ($_POST['Utilisateur']);
	$mot_de_passe =($_POST['mot_de_passe']);
	$pass_crypt=md5($mot_de_passe);
	//echo '$Utilisateur';
if (empty($Utilisateur) || empty($pass_crypt)){
	header('Location:/index.php');
}

else{
	 $result = $bdd->query("SELECT * FROM clients WHERE password='$pass_crypt' AND email='$Utilisateur'");
	 $result1 = $bdd->query("SELECT * FROM administrateur WHERE password='$pass_crypt' AND email='$Utilisateur'");
	if($result or $result1){
				$donnees = $result->fetchAll();
				$count= $result->rowCount();
				$donnees1 = $result1->fetchAll();
				$count1= $result1->rowCount();
				}
	//else echo mysql_error();

	if($count==0 and $count1 == 0){
				   header('Location:http://localhost/prets/erreur.php');
				  
				 }
	 
 	else {
					 	 if($count1!=0){
					foreach($donnees1 as $k) {
						 $_SESSION['password'] = $k['password'];
						 $_SESSION['email'] = $k['email'];
						 $_SESSION['nom'] = $k['nom'];
						 $_SESSION['prenom'] = $k['prenom'];
						  $_SESSION['matricule'] = $k['matricule'];
						 $fonction = $_SESSION['fonction']=$k['fonction'];
						  setcookie('utilisateur', $k['email'], time()+365*24*3600);
                            setcookie('mot_de_passe', $k['password'], time()+365*24*3600);
					}
				}
					 if($count!=0){
					foreach($donnees as $k) {
						 $_SESSION['password'] = $k['password'];
						 $_SESSION['email'] = $k['email'];
						 $_SESSION['prenom'] = $k['prenom'];
						 $_SESSION['nom'] = $k['nom'];
						 $_SESSION['matricule'] = $k['matricule'];
						 $_SESSION['id'] = $k['id'];
						 $fonction = $_SESSION['fonction']=$k['fonction'];
						 setcookie('utilisateur', $k['email'], time()+365*24*3600);
                         setcookie('mot_de_passe', $k['password'], time()+365*24*3600);
					}
					}
				
					echo $fonction;
					  /*if(isset($_POST['cookie']) && $_POST['cookie'] == 'on')
                        {
                            
                        }*/

				 if($fonction == "admin" )
                 {		 

						  header('Location:http:/prets/admin/admin.php');
                 }
				 elseif($fonction == "chef" )
                 {
                 	
                 
                         header('Location:http:/prets/users/chef.php');
                 }
				 elseif($fonction == "employer" )
                 {
				   		  header('Location:http:/prets/users/employer.php');
                 }
				 
				
                 //else   echo "ton role n'as pas d'autorisation";
		 }			 
}}//fin if
else{
echo "pas d'autorisation ";
}
?>

