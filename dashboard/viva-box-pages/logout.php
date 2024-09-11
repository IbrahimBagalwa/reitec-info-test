<?php
if(isset($_SESSION['token']) && isset($_SESSION['ident-me-'])){
    unset($_SESSION['token']);
    unset($_SESSION['ident-me-']);
?>
  <script>window.location.replace('./')</script>
<?php
}
?>