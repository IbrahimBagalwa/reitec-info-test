<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Reitec | Admin</title>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="viva-box-scripts/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="viva-box-scripts/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="viva-box-styles/dist/css/adminlte.min.css">
  <!--  -->
  <link rel="stylesheet" href="viva-box-styles/fa/css/font-awesome.css">
  <!--  -->
  <link rel="stylesheet" href="viva-box-scripts/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="viva-box-scripts/plugins/toastr/toastr.min.css">
  <!--  -->
  <link rel="icon" sizes="" href="../reitec-images/favicon/logo.png">
  <!--  -->
  <link rel="stylesheet" href="viva-box-styles/css/style.min.css">
  <!--  -->
  <link rel="stylesheet" href="viva-box-scripts/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!--  -->
  <script src="viva-box-scripts/plugins/jquery/jquery.min.js"></script>
  <link rel="stylesheet" href="viva-box-scripts/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="viva-box-scripts/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<?php  include_once('./action.php'); ?>
<?php 
   switch ($fs) {
    case 0:
?>
  <!-- wrapper -->
    <div class="wrapper">
        <?php 
            $RMT = $cfg->_onIdentifyMe(); 
            echo(
              '
                  <div class="container-fluid bg-secondary position-absolute"></div>
                  <div class="col-lg-12 bg-white d-felx justify-content-center p-5">
                      <div class="alert alert-danger">
                          <h2 class=""><span>Error : </span>&nbsp;403</h2>
                          <p>You are not allowed to be here <br> Your pc-name : <b>'.$RMT['obj']->addname.' || your Ip address : '.$RMT['obj']->hostname.'</b> </p>
                          <p>If problem persiste contact us on <b>+243 970 284 772</b></p>
                      </div>
                  </div>
              '
            );
        ?>
    </div>
  <!-- ./wrapper -->
<?php
      break;
    case 1:
  ?>
  <!-- wrapper -->
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="?page=home" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="button">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <li class="navbar-nav ml-auto">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fas fa-user-circle"></i>
              <!-- <span class="badge badge-warning navbar-badge">15</span> -->
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
              <span class="dropdown-item dropdown-header"><b>Profile</b></span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-user-circle"></i>
                Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file"></i>
                Informations
              </a>
              <div class="dropdown-divider"></div>
              <a href="?page=logout" class="dropdown-item">
                <b><span class="fas fa-sign-out-alt"></span> Log out</b>
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                class="fas fa-th-large"></i></a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link">
          <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8"> -->
          <span class="brand-text font-weight-light">Reitec Dashboard.<b>LTE</b></span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="../reitec-images/favicon/logo.png" class="img-circle elevation-2" alt="viva User Image" width="128">
            </div>
            <div class="info">
              <a href="#" class="d-block"><b><?php echo(onRetrieveName(true)) ?></b></a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="?page=home" class="nav-link">
                        <i class="far fa-circle nav-icon text-primary"></i>
                        <p>Home</p>
                      </a>
                    </li>
                  <?php 
                    if(onRetrieveLevel()){
                  ?>
                    <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th "></i>
                        <p>
                          Options
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="?page=formation" class="nav-link">
                            <i class="far fa-circle nav-icon text-danger"></i>
                            <p>Add new <b>Formation</b></p>
                          </a>
                        </li>
                        <li class="nav-item">
                        <a href="?page=addFaciliator" class="nav-link">
                          <i class="far fa-circle nav-icon text-danger"></i>
                          <p>Add new facilitator</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="?page=facilitator" class="nav-link">
                          <i class="far fa-circle nav-icon text-danger"></i>
                          <p>List of facilitators</p>
                        </a>
                      </li>
                      <li class="nav-item disabled d-none">
                        <a href="?page=addCours" class="nav-link disabled">
                          <i class="far fa-circle nav-icon text-danger"></i>
                          <p>Add a new cours</p>
                        </a>
                      </li>
                      </ul>
                    </li>
                  <?php   
                    }
                  ?>
                  <li class="nav-item">
                    <a href="?page=listing-formation" class="nav-link">
                      <i class="far fa-circle nav-icon text-primary"></i>
                      <p>List of Formation</p>
                    </a>
                  </li>
                  <li class="nav-item d-none">
                    <a href="?page=courslisting" class="nav-link">
                      <i class="far fa-circle nav-icon text-primary"></i>
                      <p>List of cours</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="?page=studentlist" class="nav-link">
                      <i class="far fa-circle nav-icon text-primary"></i>
                      <p>List of students</p>
                    </a>
                  </li>
                  <?php if(onRetrieveLevel()){ ?>
                  <li class="nav-item">
                    <a href="?page=inbox" class="nav-link">
                      <i class="far fa-circle nav-icon text-primary"></i>
                      <span class="badge badge-primary float-right"><?php echo(onRetrieveMSGS($g)); ?></span>
                      <p>Inbox message</p>
                    </a>
                  </li>
                  <?php } ?>
                </ul>
              </li>
              <li class="nav-item has-treeview d-none">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    Reports
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">3</span>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/layout/top-nav.html" class="nav-link">
                      <i class="far fa-circle nav-icon text-danger"></i>
                      <p>Daily Report</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                      <i class="far fa-circle nav-icon text-danger"></i>
                      <p>Monthly Report</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/layout/boxed.html" class="nav-link">
                      <i class="far fa-circle nav-icon text-danger"></i>
                      <p>Yearly Report</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-header text-uppercase d-none">LINK</li>
              <li class="nav-item d-none">
                <a href="https://davidmened.l1000services.com" target="blank" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Documentation</p>
                </a>
              </li>
              <li class="nav-item bg-secondary">
                <a href="https://davidmened.l1000services.com" target="blank" class="nav-link">
                  <!-- <i class="nav-icon fas fa-file"></i> -->
                  <!-- <p>By <b>davidmened@gmail.com</b></p> -->
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark pl-2" >Dashboard</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#"><b><?php echo(ucfirst(substr($inc,0, strpos($inc,'.')))) ?></b></a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <!-- <?php var_export(onRetrieveUnreadMSSG($g)); ?> -->
          <?php require("viva-box-pages/$inc"); ?>
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->

      <!-- Main Footer -->

      <footer class="main-footer">
        <strong>Copyright &copy; 2019 - <script>document.write(new Date().getFullYear()) </script> <a href="">Reitec Info</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.0.3-pre
        </div>
      </footer>
    </div>
  <!-- ./wrapper -->
  <?php
        break;
     default:
       break;
   }
?>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="viva-box-scripts/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="viva-box-scripts/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="viva-box-scripts/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="viva-box-styles/dist/js/adminlte.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="viva-box-styles/dist/js/demo.js"></script>
<!-- PAGE PLUGINS -->
<!--  -->
<script src="viva-box-scripts/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="viva-box-scripts/plugins/toastr/toastr.min.js"></script>
<!-- jQuery Mapael -->
<script src="viva-box-scripts/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="viva-box-scripts/plugins/raphael/raphael.min.js"></script>
<script src="viva-box-scripts/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="viva-box-scripts/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="viva-box-scripts/plugins/chart.js/Chart.min.js"></script>
<!-- PAGE SCRIPTS -->
<script src="viva-box-scripts/dist/js/pages/dashboard2.js"></script>
<!-- daterangepicker -->
<script src="viva-box-scripts/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="viva-box-scripts/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="viva-box-scripts/plugins/sparklines/sparkline.js"></script>
<script src="viva-box-scripts/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="viva-box-scripts/plugins/moment/moment.min.js"></script>
<script src="viva-box-scripts/plugins/daterangepicker/daterangepicker.js"></script>
<script src="viva-box-scripts/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="viva-box-scripts/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Page Script -->
<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
</script>
<!-- Summernote -->

<!-- <script src="viva-box-scripts/js/jspdf.js"></script> -->
<!-- <script src="viva-box-scripts/js/jspdfunpuck.js"></script> -->
<!--  -->
<script src="viva-box-scripts/js/readscanner.js"></script>
<script>
    $(function() {
        //Enable check and uncheck all functionality
        $('.checkbox-toggle').click(function() {
            var clicks = $(this).data('clicks')
            if (clicks) {
                //Uncheck all checkboxes
                $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
                $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
            } else {
                //Check all checkboxes
                $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
                $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
            }
            $(this).data('clicks', !clicks)
        })

        //Handle starring for glyphicon and font awesome
        $('.mailbox-star').click(function(e) {
            e.preventDefault()
                //detect type
            var $this = $(this).find('a > i')
            var glyph = $this.hasClass('glyphicon')
            var fa = $this.hasClass('fa')

            //Switch states
            if (glyph) {
                $this.toggleClass('glyphicon-star')
                $this.toggleClass('glyphicon-star-empty')
            }

            if (fa) {
                $this.toggleClass('fa-star')
                $this.toggleClass('fa-star-o')
            }
        })
    })
</script>
</body>
</html>
