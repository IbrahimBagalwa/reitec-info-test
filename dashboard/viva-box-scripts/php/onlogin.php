<?php 
header('Content-Type: text/html; charset=utf-8');
include_once('../../viva-config-files/_inc.file.php');
// include_once('../../point/point.php');
function onLoginFull($cnx, $tbl, $clause){
    $ident_ = [$_POST['useremail'], (md5(ucwords($_POST['userpassord']))), 1];
    $pos = $cnx->onConnexion($ident_, $clause, $tbl);
    $pos = (is_numeric($pos)) ? (int)$pos : '500';
    switch ($pos) {
        case 403:
            echo(403);
            break;
        case 200:
            echo(200);
            break;
        default:
            echo(500);
            break;
    }
}
function onLoginMini($cnx, $tbl, $clause){

}
if(count($_POST) > 0){
    $cnx = new GeneConnexion();
    $tbl = 'tbl_facilitateur';
    $clause = '';
    if(isset($_POST['useremail'])) onLoginFull($cnx, $tbl, $clause);
    if(isset($_POST['userpass_retrieve'])) onLoginMini($cnx, $tbl, $clause);
}else echo(500);

?>