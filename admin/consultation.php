 <?php
    session_start();
    if (!isset($_SESSION['fonction']) || $_SESSION['fonction'] != 'admin') {
        header('location:../index.php');
        exit;
    }

    require '../connexion/connection.php';

    $query = $bdd->query('SELECT * FROM clients INNER JOIN prets ON clients.type_employe_id = prets.type_employe_id INNER JOIN mensualite ON clients.type_employe_id = mensualite.type_employe_id GROUP BY clients.id');

    $donnees = $query->fetchAll();

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
     <link rel="stylesheet" type="text/css" href="assets/extra-libs/multicheck/multicheck.css">
     <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
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

                         </b></br>
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


                 <div class="card">
                     <div class="card-body">
                         <h5 class="card-title">Consultation</h5>
                         <div class="table-responsive">
                             <table id="zero_config" class="table table-striped table-bordered table-hover">
                                 <thead>
                                     <tr class="danger">
                                         <th>#</th>
                                         <th>Matricul</th>
                                         <th>Nom</th>
                                         <th>Prenom</th>
                                         <th>Date Pret</th>
                                         <th>Montant</th>
                                         <th>Mensualité</th>
                                         <th>Remboursement</th>
                                         <th>Restant</th>
                                     </tr>
                                 </thead>
                                 <tbody>

                                     <?php foreach ($donnees as $k) { ?>

                                         <tr>
                                             <td><?= $k['id'] ?></td>
                                             <td><?= $k['matricule'] ?></td>
                                             <td><?= $k['nom'] ?></td>
                                             <td><?= $k['prenom'] ?></td>
                                             <td><?= $k['date'] ?></td>
                                             <td><?= $k['montant'] ?></td>
                                             <td><?= $k['mensualite'] ?></td>
                                             <td><?php
                                                    $date1 = $k['date'];
                                                    $date2 = date('Y-m-d');

                                                    $ts1 = strtotime($date1);
                                                    $ts2 = strtotime($date2);

                                                    $year1 = date('Y', $ts1);
                                                    $year2 = date('Y', $ts2);

                                                    $month1 = date('m', $ts1);
                                                    $month2 = date('m', $ts2);

                                                    $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
                                                    $remboursement = $k['mensualite']*$diff;
                                                    echo $remboursement
                                                    ?></td>
                                             <td><?= $k['montant'] - $remboursement ?></td>
                                         </tr>
                                 </tbody>
                             <?php } ?>
                             </table>
                         </div>

                     </div>
                 </div>
             </div>
         </div>
         <!-- ============================================================== -->
         <!-- End PAge Content -->
         <!-- ============================================================== -->
         <!-- ============================================================== -->
         <!-- Right sidebar -->
         <!-- ============================================================== -->
         <!-- .right-sidebar -->
         <!-- ============================================================== -->
         <!-- End Right sidebar -->
         <!-- ============================================================== -->
     </div>
     <!-- ============================================================== -->
     <!-- End Container fluid  -->
     <!-- ============================================================== -->
     <!-- ============================================================== -->
     <!-- footer -->
     <!-- ============================================================== -->
     <footer class="footer text-center">
         | Created By "Touzouti kahina" <a href=""></a>.
     </footer>
     <!-- ============================================================== -->
     <!-- End footer -->
     <!-- ============================================================== -->
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
     <!-- this page js -->
     <script src="assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
     <script src="assets/extra-libs/multicheck/jquery.multicheck.js"></script>
     <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
     <script>
         /****************************************
          *       Basic Table                   *
          ****************************************/
         $('#zero_config').DataTable();
     </script>

 </body>

 </html>