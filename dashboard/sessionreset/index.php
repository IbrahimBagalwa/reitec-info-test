<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dav.me | Lockscreen</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../viva-box-scripts/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../viva-box-styles/dist/css/adminlte.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../viva-box-scripts/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../viva-box-scripts/plugins/toastr/toastr.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition lockscreen">
<?php include_once('../point/point.php'); ?>
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
        <a href=""><span class="brand-text font-weight-light">Reitec-INFO.<b>LTE</b></span></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"><?php echo(onRetrieveName(true)) ?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="../../reitec-images/favicon/logo.png" alt="viva User Image" width="128">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" id="form-login">
      <div class="input-group">
        <input type="password" name="userpassord" class="form-control" placeholder="password">
        <input type="text" name="useremail" value="<?php echo(onRetrieveEmeil()) ?>" class="form-control" hidden>
        <div class="input-group-append">
          <button type="submit" class="btn btn-submit"><i class="fas fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->
  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    <div class="col-lg mb-3">
          <b class="output text-danger d-none"><span class="fas fa-exclamation-triangle mr-1"></span>email or password incorrect</b>
    </div>
    Enter your password to retrieve your session, this hapens when yous spend more time of inactivity
  </div>
  <div class="text-center">
    <a href="../login/">Or sign in as a different user</a>
  </div>
  <div class="lockscreen-footer text-center">
         <strong>Copyright &copy; 2019 - <script>document.write(new Date().getFullYear()) </script> <a href="https://davidmaene.l1000services.com"> viva-rdc Group</a>.</strong>
        All rights reserved.
        <!-- <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.0.3-pre
        </div> -->
  </div>
</div>
<!-- /.center -->
    <?php #var_dump($_SESSION); ?>
<!-- jQuery -->
<script src="../viva-box-scripts/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../viva-box-scripts/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--  -->
<script src="../viva-box-scripts/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../viva-box-scripts/plugins/toastr/toastr.min.js"></script>
<!--  -->
<script>
    $(document).ready(function(){
        const grw_ = document.createElement('span');
        $(grw_).attr({'id':'span-grw','class':'spinner-grow spinner-grow-sm ml-2'})
        $('.lockscreen-credentials').on('submit', function(e){
            e.preventDefault();
            if($('[name="userpass_retrieve"]').val() !== ''){
                $('.btn-submit').append(grw_);
                const frm = new FormData(document.getElementById('form-login'));
                const xhr = new XMLHttpRequest();
                xhr.open('POST','../viva-box-scripts/php/onlogin.php', true);
                xhr.timeout = 25000;
                $('.btn-submit').append(grw_).attr('disabled','disabled');
                xhr.onreadystatechange = function(){
                if(xhr.readyState == 4 && xhr.status == 200){
                    console.log(xhr.responseText)
                    const status = (parseInt(xhr.responseText)) ? parseInt(xhr.responseText) : 500;
                    console.log(status)
                    switch (status) {
                    case 200:
                        $('.output').addClass('d-none');
                        toastr.success('Redirection in few minutes');
                        setTimeout(() => {
                        window.location.replace('../');
                        }, 300);
                        break;
                    case 403:
                        $(grw_).remove();
                        $('.btn-submit').removeAttr('disabled');
                        $('.output').removeClass('d-none');
                        toastr.error('email or password incorrect');
                        break;
                    default:
                    $(grw_).remove();
                    $('.btn-submit').removeAttr('disabled');
                    $(document).Toasts('create', {
                        class: 'bg-danger m-1',
                        body: '<strong>Tentatives de connexion</strong><br> Une erreur serveur vient de se produire',
                        title: 'Admin System',
                        subtitle: 'Connexion',
                        autohide: true,
                        delay: 2000,
                        position: 'bottomRight',
                        icon: 'fas fa-envelope fa-lg',
                        })
                        break;
                    }
                }
                }
                xhr.ontimeout = function(){
                $(grw_).remove();
                $('.btn-submit').removeAttr('disabled');
                $(document).Toasts('create', {
                        class: 'bg-danger m-1',
                        body: '<strong>Attempting to connect</strong><br> Connexion error',
                        title: 'Admin System',
                        subtitle: 'TimeOut',
                        autohide: true,
                        delay: 2000,
                        position: 'bottomRight',
                        icon: 'fas fa-envelope fa-lg',
                        })
                }
                xhr.send(frm)
            }else{
                $('[name="userpass_retrieve"]').addClass('bg-danger');
                setTimeout(() => {
                    $('[name="userpass_retrieve"]').removeClass('bg-danger')
                }, 1000);
            }
        })
    })
</script>
</body>
</html>
