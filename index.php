<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Reitec | info</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="reitec-images/favicon/logo.png" rel="icon">
  <link href="reitec-images/favicon/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="reitec-styles/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="reitec-styles/assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet"> -->
  <link href="reitec-styles/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="reitec-styles/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="reitec-styles/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="reitec-styles/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="reitec-styles/assets/vendor/aos/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="reitec-styles/fa/css/font-awesome.css">
  <!--  -->
  <script src="reitec-styles/assets/vendor/jquery/jquery.min.js"></script>
  <!-- Template Main CSS File -->
  <link href="reitec-styles/assets/css/style.css" rel="stylesheet">
</head>
<body>
    <!--  -->
    <?php require('routing.php'); ?>
    <!--  -->
    <!-- header -->
    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-none d-lg-block">
        <div class="container d-flex">
            <div class="contact-info mr-auto">
                <ul>
                    <li><i class="icofont-envelope"></i><a href="mailto:info@reitec-info.org">info@reitecinfo.org</a></li>
                    <li><i class="icofont-phone"></i>+234 995 443 664 | +234 975 200 116</li>
                    <li><i class="icofont-clock-time icofont-flip-horizontal"></i> Lundi - Vendredi 8H - 16H | Samedi 8H - 12H</li>
                </ul>

            </div>
            <?php 
                if(isset($_SESSION['reitec-std-session'])){
                $n1 = (isset($_SESSION['ident-me'])) ? $_SESSION['ident-me']->nom: 'reitec';
                $n2 = (isset($_SESSION['ident-me'])) ? $_SESSION['ident-me']->prenom : 'Info';
                $flname = substr($n1,0,1).substr($n2,0,1);
            ?>
                <div class="cta">
                    <a href="#">
                        <b class="badge badge-default border rounded-pill p-1 text-uppercase">
                            <?php echo($flname) ?>
                        </b>
                        <strong>
                            <?php echo(ucfirst($n1).'&nbsp;'.ucfirst($n2)); ?>
                        </strong>
                        <span class="fa fa-caret-down ml-3"></span>
                    </a>
                </div>
                <!-- ------------------------ -->
                <div class="cta d-none">
                    <a href="?page=signin" class="scrollto d-none">
                        <span class="fa fa-user"></span>
                        <span>Connexion</span>
                    </a>
                    <a href="?page=signup&_cbb=true" class="scrollto">
                        <span class="fa fa-file"></span>
                        <span>Démande de formation</span>
                    </a>
                </div>
            <?php
                }else{
            ?>
                <div class="cta">
                    <a href="?page=signin" class="scrollto">
                        <span class="fa fa-user"></span>
                        <span>Connexion</span>
                    </a>
                    <a href="?page=signup&_cbb=true" class="scrollto">
                        <span class="fa fa-file"></span>
                        <span>Démande de formation</span>
                    </a>
                </div>
            <?php
                }
            
            ?>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container d-flex">

            <div class="logo mr-auto">
                <h1 class="text-light">
                    <a href="?page=home"><img src="reitec-images/favicon/logo.png" alt="" class="img-fluid"></a>
                    <a href="?page=home"><span class="color-primary">Reitec Info</span></a>
                </h1>
                <!-- Uncomment below if you prefer to use an image logo -->
            </div>
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="?page=home" class="active-">Acceuil</a></li>
                    <li class="d-none"><a href="?page=cours" class="active--">Cours</a></li>
                    <li><a href="?page=formations" class="active---">Formations</a></li>
                    <li><a href="?page=services" class="active----">Nos Services</a></li>
                    <!-- <li><a href="?page=galeries" class="active----">Galeries</a></li> -->
                    <li><a href="?page=contact" class="active----">Contact</a></li>
                    <li class="drop-down"><a href="#" class="active-----">Infos</a>
                        <ul>
                            <li><a href="?page=galeries">Galeries</a></li>
                            <li><a href="?page=about">About</a></li>
                            <!-- <li><a href="?page=contact">Contact</a></li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="?page=signup&_cbb=true" class="active-- border rounded">
                            <b>Démande de formation</b>
                        </a>
                    </li>
                    <?php   
                        if(isset($_SESSION['reitec-std-session'])){             
                            $n1 = (isset($_SESSION['ident-me'])) ? $_SESSION['ident-me']->nom: 'reitec';
                            $n2 = (isset($_SESSION['ident-me'])) ? $_SESSION['ident-me']->prenom : 'Info';
                            $flname = substr($n1,0,1).substr($n2,0,1);
                    ?>
                            <li class="drop-down border rounded mx-3">
                                <a href="#">
                                    <b class="badge badge-default border rounded-pill p-1 text-uppercase">
                                        <?php echo($flname); ?>
                                    </b>
                                    <strong>
                                        <?php echo(ucfirst($n1).'&nbsp;'.ucfirst($n2)); ?>
                                    </strong>
                                </a>
                                <ul>
                                    <li><a href="?page=mypannel"><span class="fa fa-bars mr-2"></span>Tableau de bord</a></li>
                                    <!-- <li><a href="#"><span class="fa fa-user-circle mr-2"></span>Profil</a></li> -->
                                    <li><div class="dropdown-divider"></div></li>
                                    <li><a href="?page=logout"><span class="fa fa-sign-out mr-2"></span>Deconnexion</a></li>
                                </ul>
                            </li>
                    <?php
                        }else{
                    ?>
                    <li class="d-sm-only"><a href="?page=signin">Connexion</a></li>
                    <li class="d-sm-only bg-prmy"><a href="?page=signup" class="text-white"><b>Démande de formation</b></a></li>
                     <?php  } ?>
                </ul>
            </nav>
            <!-- .nav-menu -->

        </div>
    </header>
    <!-- End Header -->
    <!-- end header -->
    <!-- --------------------------------------------------------------------------------------- -->
    <!-- ------------------------------------------ inc page ----------------------------------- -->
    <?php if($state) include("./reitec-pages/$incPage"); else include('./reitec-pages/error.page.php') ?>
    <!-- -------------------------------------------- end  ---------------------------------------->
    <!-- --------------------------------------------------------------------------------------- -->
    <!-- footer -->
    <footer id="footer" class="">

        <div class="footer-top bg-prmy">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Reitec Info</h3>
                        <p class="text-white">
                            <strong>Address:</strong><br>No 07 Avenu Accacia3, Quartier les Volcans, <br> Commune de Goma, <br>Ville de Goma, <br>Province du Nord-Kivu en République Démocratique du Congo, <br>
                            <!-- Q. Les volcans | C. Goma <br> NK, Goma<br> RDCongo <br><br> -->
                            <strong>Phone:</strong> <br><span class="">(+234) 995 443 664</span> <br> <span clas="">(+234) 975 200 116</span><br>
                            <strong>Email:</strong> info@reitecinfo.org <br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4 class="text-white">Liens Utilisateur</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right text-white"></i> <a href="?page=home" class="text-white">Acceuil</a></li>
                            <li><i class="bx bx-chevron-right text-white"></i> <a href="?page=cours" class="text-white">Cours</a></li>
                            <li><i class="bx bx-chevron-right text-white"></i> <a href="?page=formation" class="text-white">Formations</a></li>
                            <li><i class="bx bx-chevron-right text-white"></i> <a href="?page=services" class="text-white">Nos Services</a></li>
                            <li><i class="bx bx-chevron-right text-white"></i> <a href="?page=galeries" class="text-white">Galeries</a></li>
                            <li><i class="bx bx-chevron-right text-white"></i> <a href="?page=contact" class="text-white">Contact</a></li>
                            <li><i class="bx bx-chevron-right text-white"></i> <a href="?page=about" class="text-white">About</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4 class="text-white">Nos domaines</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right text-white"></i> <a href="#" class="text-white">Le domaine Humanitaire</a></li>
                            <li><i class="bx bx-chevron-right text-white"></i> <a href="#" class="text-white">Informatique et bureautique</a></li>
                            <li><i class="bx bx-chevron-right text-white"></i> <a href="#" class="text-white">Atelier</a></li>
                            <!-- <li><i class="bx bx-chevron-right text-white"></i> <a href="#" class="text-white">service4</a></li>
                            <li><i class="bx bx-chevron-right text-white"></i> <a href="#" class="text-white">service5</a></li> -->
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4 class="text-white">Inscrivez vous à notre NewsLetter</h4>
                        <p class="text-white">Recevez regulièrement les nouvelles de nos services</p>
                        <form id="newsletter-form">
                            <input type="email" name="email_sub" required>
                            <input type="submit" value="Subscribe" class="btn-create">
                        </form>
                        <p class="text-success d-none output"></p>
                        <script>
                            $('#newsletter-form').on('submit', function(e){
                                const sp = document.createElement('span');
                                $(sp).attr({'id':'span-loader','class':'spinner-grow spinner-grow-sm'})
                                e.preventDefault();
                                if($('[name=email_sub]').val().length > 6){
                                    $('[name=email_sub]').removeClass('border-danger');
                                    $('.btn-create').attr({'disabled':'disabled'}).append(sp);
                                    const xhr = new XMLHttpRequest();
                                    const frm = new FormData(document.getElementById('newsletter-form'))
                                    xhr.open('POST', 'reitec-scripts/php/_xhr.request.php', true);
                                    xhr.onreadystatechange = function(){
                                        if(xhr.readyState === 4 && xhr.status === 200){
                                            const rs = parseInt(xhr.response);
                                            switch (rs) {
                                                case 200:
                                                    // setTimeout(function(){
                                                        $('.btn-create').removeAttr('disabled');
                                                        $(sp).remove();
                                                        $('.output').removeClass('d-none');
                                                    $('.output').html('<span class="fa fa-check mr-2"></span><span>Ajouté avec succès !</span>')
                                                    // }, 30000)
                                                    break;
                                                default:
                                                    $('.btn-create').removeAttr('disabled');
                                                    $(sp).remove();
                                                    $('.output').removeClass('d-none');
                                                    $('.output').html('<span class="fa fa-warning mr-2"></span><span>Error inconnue !</span>')
                                                    break;
                                            }
                                        }
                                    }
                                    xhr.send(frm)
                                }else{
                                    $('[name=email_sub]').addClass('border-danger');
                                }
                            })
                        </script>
                    </div>

                </div>
            </div>
        </div>

        <div class="container d-lg-flex py-4">

            <div class="mr-lg-auto text-center text-lg-left">
                <div class="copyright">
                    &copy; Copyright <strong><span>reitec info</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Designed by <a href="https://github.com/davmaene">David Maene</a> | <a href="https://github.com/IbrahimBagalwa">Ibrahim Bagalwa</a>
                </div>
            </div>
            <div class="social-links text-center text-lg-right pt-3 pt-lg-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="reitec-styles/assets/vendor/jquery/jquery.min.js"></script>
    <script src="reitec-styles/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="reitec-styles/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="reitec-styles/assets/vendor/php-email-form/validate.js"></script>
    <script src="reitec-styles/assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="reitec-styles/assets/vendor/venobox/venobox.min.js"></script>
    <script src="reitec-styles/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="reitec-styles/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="reitec-styles/assets/vendor/aos/aos.js"></script>
    <!--  -->
    <script src="reitec-scripts/js/popper.js"></script>
    <script src="reitec-styles/assets/js/main.js"></script>
    <script src="reitec-styles/assets/js/reitec-me.js"></script>
    <!--  -->
    <script>
        $(document).ready(function(){
            // alert(window.screen.availWidth);
            // console.log(window.screen.availWidth); 
        })
    </script>
</body>
</html>