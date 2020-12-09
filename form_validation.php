 <?php
 session_start();
if(!isset($_SESSION['fonction'])||$_SESSION['fonction']!='chef') {
    header('location:../index.php');
    exit;
}
$message="";
require('../connection.php');
    if ($_POST) {   
    $mat = $_POST['mat'];
    $pass_crypt=md5($mat);
    $n = $_POST['n'];
    $pr = $_POST['pr'];
    $fon = $_POST['fon'];
    $req = $bdd->prepare("SELECT * FROM admin WHERE matricul = :matricul");
    $req->execute(array('matricul' => $pass_crypt));
    $count = $req->rowCount();
    if ($count == 0) {
        
    
    $reponse = $bdd->prepare("INSERT INTO admin (matricul,nom,prenom,fonction) VALUES ('$pass_crypt','$n','$pr','$fon')");
    $reponse->execute(array(
                          'nom' => $n,
                          'prenom' => $pr,
                          'fonction' => $fon,
                          'matricul' =>$pass_crypt));


                           // avec cryptage MD5
                        // 'mdpass' => $pass_crypt)); sans cryptage MD5
 /*include('maffichagefinale.php');*/
 header('location: basic_table.php');

    }else {
    $message =  "l'utilisateur existe déja.";
}
} 
?>

<!DOCTYPE html>
<head>
<title>AJOUTER UN ADMINISTRATEUR</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="shortcut icon" href="../images/logo.png" type="image/png"/>
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="index.php" class="logo">
        Bienvenue
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
       
        <!-- inbox dropdown start-->
        <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-envelope-o"></i>
                <span class="badge bg-important">4</span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <li>
                    <p class="red">You have 4 Mails</p>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="images/3.png"></span>
                                <span class="subject">
                                <span class="from">Jonathan Smith</span>
                                <span class="time">Just now</span>
                                </span>
                                <span class="message">
                                    Hello, this is an example msg.
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="images/1.png"></span>
                                <span class="subject">
                                <span class="from">Jane Doe</span>
                                <span class="time">2 min ago</span>
                                </span>
                                <span class="message">
                                    Nice admin template
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="images/3.png"></span>
                                <span class="subject">
                                <span class="from">Tasi sam</span>
                                <span class="time">2 days ago</span>
                                </span>
                                <span class="message">
                                    This is an example msg.
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="images/2.png"></span>
                                <span class="subject">
                                <span class="from">Mr. Perfect</span>
                                <span class="time">2 hour ago</span>
                                </span>
                                <span class="message">
                                    Hi there, its a test
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">See all messages</a>
                </li>
            </ul>
        </li>
        <!-- inbox dropdown end -->
        
    </ul>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
       <!--  <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li> -->
        <!-- user login dropdown start-->
       <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="../images/av.png">
                <span class="username"><?php echo "".$_SESSION["nom"]."";?>&nbsp;<?php echo "".$_SESSION["prenom"]."";?></a></span>
                <!-- <b class="caret"></b> -->
            </a>
            <ul class="dropdown-menu extended logout">
               <!--  <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li> -->
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="../deconnexion.php"><i class="fa fa-key"></i>Deconnection</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="index.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Accueil</span>
                    </a>
                </li>
                
                
               
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Liste des employés </span>
                    </a>
                    <ul class="sub">
                        <li><a href="basic_table.php">Liste des employés ajouter</a></li>
                        <li><a href="responsive_table.php">Gestion du personnel </a></li>
                          
                    </ul>
                </li>
               <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Formulaires</span>
                    </a>
                    <ul class="sub">
                        <li><a href="form_component.php">Form Elements</a></li>
                        <li><a href="form_validation.php">Form D'ajout </a></li>
                          
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-envelope"></i>
                        <span>Mail </span>
                    </a>
                    <ul class="sub">
                        <li><a href="mail.php">Reception de mail</a></li>
                        <li><a href="mail_compose.php">Envoyer Mail</a></li>
                    </ul>
                </li>
               
               
               
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->
            
           
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Ajouter Un Administrateur
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="signupForm" method="post" action="" >
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Nom</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="n" name="n" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Prenom</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="pr" name="pr" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-3">Fonction</label>
                                        
                                        <div class="col-lg-6">
                                            <input class="form-control " id="fon" name="fon" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password" class="control-label col-lg-3">Mot de passe</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="mat" name="mat" type="password">
                                        </div>
                                    </div>
                                 <!--    <div class="form-group ">
                                        <label for="confirm_password" class="control-label col-lg-3">Confirmation du mot de passe</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="confirm_password" name="confirm_password" type="password">
                                        </div>
                                    </div> -->
                                   
                                   
                                   

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit" value="Envoyer">Envoyer</button>
                                            <button class="btn btn-default" type="button">Annuler</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>
</section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
              <p>© 2018 Visitors. All rights reserved | Design by Simon</p>
            </div>
		  </div>
  <!-- / footer -->
</section>

<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
