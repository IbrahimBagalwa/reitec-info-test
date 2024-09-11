<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reitec | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../viva-box-scripts/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../viva-box-scripts/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../viva-box-scripts/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../viva-box-scripts/plugins/toastr/toastr.min.css">
  <!--  -->
  <link rel="stylesheet" href="../viva-box-styles/dist/css/adminlte.min.css">
  <!--  -->
  <link rel="stylesheet" href="../viva-box-styles/css/style.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><span class="brand-text font-weight-light">Reitec-INFO.<b>LTE</b></span></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="#" method="post" id="form-login">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="useremail" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="userpassord" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text" id="pslock" viva-attr="true">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <b class="output text-danger d-none"><span class="fas fa-exclamation-triangle mr-1"></span>email or password incorrect</b>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-submit">
              <span>Sign In</span>
            </button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3 hidden d-none">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1 d-none">
        <a href="#">I forgot my password</a>
      </p>
      <p class="mb-0 d-none">
        <a href="#" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../viva-box-scripts/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../viva-box-scripts/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../viva-box-styles/dist/js/adminlte.min.js"></script>
<!--  -->
<script src="../viva-box-scripts/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../viva-box-scripts/plugins/toastr/toastr.min.js"></script>
<!--  -->
<script>
  $(document).ready(function(){
    $('[name="userpassord"]').on('keyup', function(e){
        $('#pslock').html('<span class="fas fa-eye hoverOn"></span>')
      })
    $('#pslock').on('click', function(e){
      if($('#pslock').attr('viva-attr') === 'true'){
        $('[name="userpassord"]').attr('type','text')
        $('#pslock').html('<span class="fas fa-eye-slash hoverOn"></span>')
        $('#pslock').attr('viva-attr','false')
      }else{
        $('[name="userpassord"]').attr('type','password')
        $('#pslock').html('<span class="fas fa-eye hoverOn"></span>')
        $('#pslock').attr('viva-attr','true')
      }
    })
    $('#form-login').on('submit', function(e){
      e.preventDefault();
      let canSubmit = function(){
        let Ys = false;
        let eM = false;
        let pW = false;
        if((/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/).test($('[name="useremail"]').val())){
          eM = true;
          $('[name="useremail"]').removeClass('border-danger');
        }else{
          eM = false;
          $('[name="useremail"]').addClass('border-danger');
        }
        if($('[name="userpassord"]').val() !== ''){
          pW = true;
          $('[name="userpassord"]').removeClass('border-danger');
        }else{
          pW = false;
          $('[name="userpassord"]').addClass('border-danger');
        }
        return Ys = eM && pW;
      }
      if(canSubmit()){
        let attempt = 0;
        const grw_ = document.createElement('span');
        $(grw_).attr({'id':'span-grw','class':'spinner-grow spinner-grow-sm'})
        const frm = new FormData(document.getElementById('form-login'));
        const xhr = new XMLHttpRequest();
        xhr.open('POST','../viva-box-scripts/php/onlogin.php', true);
        xhr.timeout = 25000;
        $('.btn-submit').append(grw_).attr('disabled','disabled');

        xhr.onreadystatechange = function(){
          if(xhr.readyState == 4 && xhr.status == 200){
            console.log(xhr.responseText)
            const status = (parseInt(xhr.responseText)) ? parseInt(xhr.responseText) : 500;
            console.log(xhr.responseText)
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
      }
    })
  })
</script>
</body>
</html>
