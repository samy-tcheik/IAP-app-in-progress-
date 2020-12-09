<?php
session_start();
if (!isset($_SESSION['fonction']) || $_SESSION['fonction'] != 'admin') {
  header('location:../index.php');
  exit;
}

require '../connexion/connection.php';

$query = $bdd->query('SELECT * FROM type_employe');

$query->execute();

$donnees = $query->fetchAll();

$query1 = $bdd->query('SELECT * FROM clients WHERE id = '.$_GET['id'].'');

$query1->execute();

$userData = $query1->fetch();
?>
<!DOCTYPE html>
<html dir="ltr" lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/sona.png">
  <title>IAP - Anstitut Algérien De Pétrole</title>
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="assets/libs/select2/dist/css/select2.min.css">
  <link rel="stylesheet" type="text/css" href="assets/libs/jquery-minicolors/jquery.minicolors.css">
  <link rel="stylesheet" type="text/css" href="assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" type="text/css" href="assets/libs/quill/dist/quill.snow.css">
  <link href="dist/css/style.min.css" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
  <link rel="stylesheet" type="text/css" href="st.css">
</head>

<body>
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
      <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
          <!-- This is for the sidebar toggle which is visible on mobile only -->
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
          <!-- ============================================================== -->
          <!-- Logo -->
          <!-- ============================================================== -->
          <a class="navbar-brand" href="index.html">
            <!-- Logo icon -->
            <b class="logo-icon p-l-10">
              <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
              <!-- Dark Logo icon -->
              <img src="assets/images/sona.png" alt="homepage" class="light-logo" height="60px" width="80px" />


            </b>
            <!--End Logo icon -->

            <h1> IAP </h1>
            <!-- Logo icon -->
            <!-- <b class="logo-icon"> -->
            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
            <!-- Dark Logo icon -->
            <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

            <!-- </b> -->
            <!--End Logo icon -->
          </a>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Toggle which is visible on mobile only -->
          <!-- ============================================================== -->
          <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-left mr-auto">
            <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
            <!-- ============================================================== -->
            <!-- create new -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Search -->
            <!-- ============================================================== -->
            <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
              <form class="app-search position-absolute">
                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
              </form>
            </li>
          </ul>
          <div class="inst">
            <h1> Institut Algérien Du Pétrole</h1>
          </div>
          <!-- ============================================================== -->
          <!-- Right side toggle and nav items -->
          <!-- ============================================================== -->

          <!-- ============================================================== -->
          <!-- Comment -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- End Comment -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Messages -->
          <!-- ============================================================== -->

          <!-- ============================================================== -->
          <!-- End Messages -->
          <!-- ============================================================== -->

          <!-- ============================================================== -->
          <!-- User profile and search -->
          <!-- ============================================================== -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
            <div class="dropdown-menu dropdown-menu-right user-dd animated">
              <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i><?php echo "" . $_SESSION["prenom"] . ""; ?></a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../connexion/deconnexion.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Déconnexion</a>
              <div class="dropdown-divider"></div>
            </div>
          </li>
          <!-- ============================================================== -->
          <!-- User profile and search -->
          <!-- ============================================================== -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin5">
      <!-- Sidebar scroll-->
      <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          <ul id="sidebarnav" class="p-t-30">
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="ajoute.php" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Ajout</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="suppression.php" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Suppression</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="modification.php" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Modification</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="consultation.php" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Consultation</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="validation.php" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Validation</span></a></li>
          </ul>
          </li>


          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->

      <!-- ============================================================== -->
      <!-- End Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->


        <div class="row">

          <div class="col-sm-7 col-sm-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 style="text-align:center;color:#000000" ; class="panel-title"><b>formulaire d'ajout</b></h3>
              </div>
              <div class="panel-body">

                <!--nom-->
                <form action="controllers/update.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="control-label" for="matricule">Matricule:<span class="text-danger"></span></label>
                        <input type="text" value="<?= $userData['matricule'] ?>" placeholder="Saisie le matricule" id="matricule" name="matricule" class="form-control" required="required">
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="id" value="<?= $_GET['id'] ?>">

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="control-label" for="nom">Nom:<span class="text-danger"></span></label>
                        <input type="text" value="<?= $userData['nom'] ?>" placeholder=" Saisie le nom" id="nom" name="nom" class="form-control" required="required">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="control-label" for="prenom">Prénom:<span class="text-danger"></span></label>
                        <input type="text" value="<?= $userData['prenom'] ?>" placeholder="Saisie le prénom" id="prenom" name="prenom" class="form-control" required="required">
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="control-label" for="email">Email:<span class="text-danger"></span></label>
                        <input type="email" value="<?= $userData['email'] ?>" id="email" name="email" class="form-control" placeholder=" Siasie l'émail" required="required">
                      </div>
                    </div>
                  </div>


                  <!--twitter-->
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="control-label" for="numero">Numéro permis:<span class="text-danger"></span></label>
                        <input type="number" id="numero" value="<?= $userData['numpermis'] ?>" name="numpermis" class="form-control" placeholder="Saisie numéro de permis" required="required">
                      </div>
                    </div>
                  </div>

                  <!--github-->
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="control-label" for="type">Type employé<span class="text-danger"></span></label>
                        <select name="type" class="form-control" id="type">
                          <?php foreach ($donnees as $donnee) { ?>
                            <option value="<?= $donnee['type_employe_id'] ?>"><?= $donnee['name'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="control-label" for="date">Date:<span class="text-danger"></span></label>
                        <input type="date" id="date" value="<?= $userData['date'] ?>" name="date" class="form-control" required="required">
                      </div>
                    </div>
                  </div>

                  <!--github-->
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="control-label" for="structure">Structure<span class="text-danger"></span></label>
                        <input type="text" id="structure" value="<?= $userData['structure'] ?>" name="structure" class="form-control" placeholder="Saisie la structure" required="required">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="control-label" for="fonction">Fonction:<span class="text-danger"></span></label>
                        <input type="text" id="fonction" value="<?= $userData['fonction'] ?>" name="fonction" class="form-control" placeholder="Saisie la fonction" required="required">
                      </div>
                    </div>
                  </div>
                  <!--disponibilites-->
                  <div class="row">
                    <!--  <div class="col-sm-6">
                <div class="form-group">
                
                  <label class="control-label" for="matricule" >Matricule<span class="text-danger">*</span></label>
                    <input type="text"  name="matricule" id="matricule" value="matricule" class="form-control" placeholder="matricule" />
              
                </div>
                
              </div> -->

                    <!--  <div class="col-sm-6">
                <div class="form-group">
                
                  <label class="control-label" for="password" >Password<span class="text-danger"></span></label>
                    <input type="password"  name="password" id="password" value="password" class="form-control" placeholder="password" />
              
                </div>
                
              </div> -->

                  </div>


                  <!--vile-->
                  <div class="boxbut">
                    <input class="but" type="submit" class="btn btn-primary" id="submit" value="Envoyer">
                    <input class="but anu" style=" float: right;" type="reset" class="btn btn-primary" value="Annuler">
                  </div>
                </form>

              </div>

            </div>

          </div>


        </div>

      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- This Page JS -->
    <script src="assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="dist/js/pages/mask/mask.init.js"></script>
    <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/libs/quill/dist/quill.min.js"></script>
    <script>
      //***********************************//
      // For select 2
      //***********************************//
      $(".select2").select2();

      /*colorpicker*/
      $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
          control: $(this).attr('data-control') || 'hue',
          position: $(this).attr('data-position') || 'bottom left',

          change: function(value, opacity) {
            if (!value) return;
            if (opacity) value += ', ' + opacity;
            if (typeof console === 'object') {
              console.log(value);
            }
          },
          theme: 'bootstrap'
        });

      });
      /*datwpicker*/
      jQuery('.mydatepicker').datepicker();
      jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
      });
      var quill = new Quill('#editor', {
        theme: 'snow'
      });
    </script>
</body>

</html>