<?php 
    include_once('./viva-config-files/_inc.file.php');
    $pgs = scandir('viva-box-pages/');
    $gnc = new GeneConnexion();
    if($gnc->tryConn() === null) die(throwError());
    $cfg = new Conf($gnc);
    $fs = ($cfg->_onIdentifyMe() === 200) ? 1 : 0;
    $id = (isset($_SESSION['ident-me-'])) ? $_SESSION['ident-me-'] : null;
    $tkn = (isset($_SESSION['token'])) ? $_SESSION['token'] : null;
    if($id === null && $tkn === null) header('location: login/');
    if($id !== null && $tkn === null) header('location: sessionreset/');
    if(isset($_GET['page'])){
        if(!empty($_GET['page'])){
            if(in_array($_GET['page'].'.php', $pgs, true)){
                $inc = trim($_GET['page']);
                $inc = $inc.'.php';
            }else header('location: 404/');
        }else $inc = 'home.php';
    }else $inc = 'home.php';
    $time_date = date('Y-m-d h:m:s');
    onCheckSession();
?>