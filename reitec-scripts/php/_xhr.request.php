<?php
    // ------------------------------------------------------
    include_once('../../reitec-model/model.cours.php');
    include_once('../../reitec-model/model.facilitateur.php');
    include_once('../../reitec-model/model.student.php');    
    include_once('_config.php');
    // --------------------------------------------------------
    $cfg = new Config();
    function _onCreatingSession(){
        $_SESSION['reitec-std-session'] = $_POST['email_cnnx'];
        $_SESSION['name_1'] = $_POST['nom_cnnx'];
        $_SESSION['name_2'] = $_POST['pst_cnnx'];
    }
    function _onConnexion($cfg){
        $clause = '';
        $tbl = 'tbl_etudiant';
        $cnnx = $cfg->onConnexion([trim($_POST['email_cnnx']),md5(ucwords($_POST['pwd_cnnx']))],$clause,$tbl);
        $cnnx = (int) $cnnx;
        switch ($cnnx) {
            case 200:
                echo(200);
                break;
            case 403:
                echo(403);
                break;
            case 500:
                echo(500);
                break;
            default:
                echo(505);
                break;
        }
    }
    function onAddingToMyLSTCRS($conf,$me,$crs){
        $accLVL = 1122;
        $now = date('Y-m-d');
        $state = 0; // 0 means not activate : 1 ie. active 
        $tbl = 'tbl_etudier'; $table = 'tbl_formation';
        $crs = (is_numeric($crs)) ? $crs : 0;
        $output = 'datestart'; // from formation
        $output_ = 'dateend'; // from formation
        $cls = 'AND datastatus = 1'; // 
        $clause = '';
        // -----------------------------
        $tm = $conf->onCatchVLCOLLN($crs,$output,$table,$cls)[0];
        $tm_ = $conf->onCatchVLCOLLN($crs,$output_,$table,$cls)[0];
        // ------------------------------
        $rmt_S = (($tm !== 'undefined' && $tm !== 0) ? $tm : 0); $rmt_S = $rmt_S[$output];
        $rmt_E = (($tm_ !== 'undefined' && $tm_ !== 0) ? $tm_ : 0); $rmt_E = $rmt_E[$output_];
        $place = ( $_POST['type_form'] === 'offline') ? $_POST['place_reitec_case'] : $_POST['place_o_cnnx'];
        // ------------------------------
        $mes = (is_numeric($me)) ? $me : 0;
        $rmt_t = ($rmt_S < $now) ? ($now) : ($rmt_S); $rmt_t = date_create($rmt_t);

        $remaining = date_diff($rmt_t,date_create($rmt_E));
        $remaining = $remaining->format('%R%a');
        $remaining = substr($remaining,1); $remaining = (int) $remaining;
        $remaining = ($remaining === 0) ? 1 : $remaining;

        $sha = base64_encode("_dav.me:reitec-$crs-$me");
        $op = $conf->onAdd([
            $mes,
            $crs,
            $sha,
            $remaining,
            $state,
            htmlentities($_POST['type_form']),
            htmlentities($_POST['add_cnnx']),
            htmlentities($_POST['center_cnnx']),
            $place,
            $_POST['kind-pos']
        ],$clause,$accLVL,$me,$tbl);

        $add = (int) $op;
        switch($add){
            case 200:
                $im = [];
                // ---------------------------
                $formtitle = isset($_POST['ttle']) ? $_POST['ttle'] : 'Formation';
                $name = $_POST['nom_cnnx'].'&nbsp;'.$_POST['pst_cnnx'];
                $type = htmlentities($_POST['type_form']);
                $status = htmlentities($_POST['kind-pos']);
                $email = htmlentities($_POST['email_cnnx']);
                $tel = htmlentities($_POST['tele_cnnx']);
                // ----------------------------
                $im['message'] = '
                <!DOCTYPE html>
                <html lang="fr">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Reitec Info - Activation </title>
                        <style>
                            body{
                                margin: 0;
                                padding: 0;
                                height: 100vh;
                            }
                            .container{
                                width: 100%;
                                height: auto;
                                padding-top: 5px;
                                padding-bottom: 5px;
                                /* padding-left: 5px; */
                                background-color: #fff;
                            }
                            .for-badge{
                                padding: 2px 10px;
                                background-color: beige;
                                border: 1px solid #0000;
                            }
                            .inner{
                                padding: 10px 40px;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <div class="inner">
                                <h4>Bonjour;</h4>
                                <p>
                                    Une nouvelle démande de formation venant de '.$name.' à la formation '.$formtitle.'
                                    pour plus de détail visiter le pannel <a href="https://reitec-info.org/dashboard/" target="_blank" rel="noopener noreferrer">ici</a>
                                </p>
                                <h4>Informations</h4>
                                <p>
                                    <table border="1" width="80%">
                                        <tr>
                                            <td>Nom : </td>
                                            <th>'.$name.'</th>
                                        </tr>
                                        <tr>
                                            <td>Email : </td>
                                            <th>'.$email.'</th>
                                        </tr>
                                        <tr>
                                            <td>Téléphone : </td>
                                            <th>'.$tel.'</th>
                                        </tr>
                                        <tr>
                                            <td>Mode de formation : </td>
                                            <th>'.$type.'</th>
                                        </tr>
                                        <tr>
                                            <td>Statut : </td>
                                            <th>'.$status.'</th>
                                        </tr>
                                    </table>
                                </p>
                                <p>Merci ,<br><br> l\'Equipe <strong>Reitec - Info</strong></p>
                            </div>
                        </div>
                    </body>
                </html>
                ';
                $im['from'] = 'notification@reitecinfo.org';
                $im['subject'] = '<< DEMANDE DE FORMATION >>';
                $im['email'] = 'information@reitecinfo.org';
                $conf->sendMail($im);
                return 200;
            case 500:
                return 500;
            case 503:
                return 503;
            default:
            var_dump($op);
                return 505;
        }
    }
    if(isset($_GET['_updateRMT'])){
        if(trim($_GET['_updateRMT']) === 'updatermt'){
            $now = date('Y-m-d');
            $table = 'tbl_formation';
            $tbl = 'tbl_etudier';
            $output = 'remaningTime';
            $cls = "WHERE datastatus = 1";
            $req = $cfg->onRetrieveData($table, $cls);
            if($req !== 0){
                for($i = 0; $i < count($req); $i++){
                    $id_ = $req[$i]['id'];
                    $clause = "WHERE datastatus = 1 AND idCours = $id_";
                    $s = ($req[$i]['datestart']);
                    $e = ($req[$i]['dateend']);

                    if($e > $now){ echo("formation $id_ en attente --------<br>"); }
                    if($e < $now){ echo("formation $id_ termin&eacute;e -------<br>"); }
                    if($now >= $s && $now <= $e){
                       echo("formations $id_ en cours ----------<br>");
                       $cls_fr = "WHERE id = $id_";
                       $rmt__ =  $cfg->onCatchingVLS($output,$tbl,$clause);
                       $rt = (int) $rmt__;
                    //    echo("<br> $rt");
                       if($rt === 1) {
                            $cfg->onUpdate(['remaningTime','status','datastatus'],[$rt-1,0,0],$tbl,$clause);
                            $cfg->onUpdate(['datastatus'],[0],$table,$cls_fr);
                       }
                       else if($rt > 0) $cfg->onUpdate(['remaningTime'],[$rt-1],$tbl,$clause);
                    }
                }
            }
        }
    }
    if(isset($_POST['email_cnnx'])){
        $clause = '';
        $sortby ='id';
        $accesslevel = 1122;
        $ident = md5('dav.me');
        $tbl = 'tbl_etudiant';
        $tble = 'tbl_etudier';
        $place = ( $_POST['type_form'] === 'offline') ?  $_POST['place_reitec_case'] : $_POST['place_o_cnnx'];
        // var_dump($_POST);
        $add = $cfg->onAdd(
            [
                $_POST['nom_cnnx'],
                $_POST['pst_cnnx'],
                $_POST['pst_cnnx'],
                $_POST['gender_cnnx'],
                htmlentities($_POST['email_cnnx']),
                md5(ucwords($_POST['pwd_cnnx'])),
                $_POST['tele_cnnx'],
                $accesslevel
            ],$clause,$accesslevel,$ident,$tbl
        );
        $add = (int) $add;
        switch ($add) {
            case 200:
                $newIdEtudiant = $cfg->onCatchLastElement($tbl,$clause,$sortby);
                $add_ = onAddingToMyLSTCRS($cfg,(int)$newIdEtudiant,$_POST['idformation']);
                $etd = (int) $add_;
                switch($etd){
                    case 200:
                        _onConnexion($cfg);
                        // echo 200;
                        break;
                    case 503:
                        echo 305;
                        break;
                    case 500:
                        echo 500;
                        break;
                    default:
                    echo $add_;
                    break;
                }
                break;
            case 503:
                $email = trim($_POST['email_cnnx']);
                $clause_ = "WHERE email = '$email'";
                $outpt = 'id';
                // $cfg->onCatchLastElement($tbl,$clause,$sortby);
                $newIdEtudiant =  $cfg->onCatchingVLS($outpt,'tbl_etudiant',$clause_)[0];
                $newIdEtudiant = $newIdEtudiant[0];
                // var_dump($newIdEtudiant);
                // return false;
                $add_ = onAddingToMyLSTCRS($cfg,(int)$newIdEtudiant,$_POST['idformation']);
                $etd = (int) $add_;
                switch($etd){
                    case 200:
                        _onConnexion($cfg);
                        // echo 200;
                        break;
                    case 503:
                        echo 305;
                        break;
                    case 500:
                        echo 500;
                        break;
                    default:
                    echo $add_;
                    break;
                }
                // echo(503);
                break;
            case 500:
                echo(500);
                break;
            default:
                echo(555);
                break;
        }
    }
    if(isset($_POST['pwd_cnnx_'])){
        $clause = '';
        $tbl = 'tbl_etudiant';
        $cnnx = $cfg->onConnexion([trim($_POST['nom_cnnx_']),md5(ucwords($_POST['pwd_cnnx_']))],$clause,$tbl);
        $cnnx = (int) $cnnx;
        switch ($cnnx) {
            case 200:
                echo(200);
                break;
            case 403:
                echo(403);
                break;
            case 500:
                echo(500);
                break;
            default:
                echo(505);
                break;
        }
    }
    if(isset($_POST['email'])){
        $clause = '';
        $tbl = ' tbl_contact';
        $cnnx = $cfg->onAdd([
            strtolower($_POST['name']),
            strtolower($_POST['email']),
            strtolower($_POST['subject']),
            strtolower($_POST['message']),6363373,19000,1],$clause,6363373,2020,$tbl);
        $cnnx = (int) $cnnx;
        switch ($cnnx) {
            case 200:
                $im = [];
                $im['message'] = '
                <!DOCTYPE html>
                <html lang="fr">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Reitec Info - Activation </title>
                        <style>
                            body{
                                margin: 0;
                                padding: 0;
                                height: 100vh;
                            }
                            .container{
                                width: 100%;
                                height: auto;
                                padding-top: 5px;
                                padding-bottom: 5px;
                                /* padding-left: 5px; */
                                background-color: #fff;
                            }
                            .for-badge{
                                padding: 2px 10px;
                                background-color: beige;
                                border: 1px solid #0000;
                            }
                            .inner{
                                padding: 10px 40px;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <div class="inner">
                                <h4>Bonjour;</h4>
                                <p>
                                    Une nouvelle d&eacute;mande d\'information venant de '.ucfirst(strtolower($_POST['name'])).' <br>
                                    Son adresse mail est '.strtolower($_POST['email']).'
                                </p>
                                <h4>Contenu du message</h4>
                                <p>
                                    '.strtolower($_POST['message']).'
                                </p>
                                pour plus de détail visiter le pannel <a href="https://reitec-info.org/dashboard/index.php?page=readmail" target="_blank" rel="noopener noreferrer">ici</a>
                                <p>Merci ,<br><br> l\'Equipe <strong>Reitec - Info</strong></p>
                            </div>
                        </div>
                    </body>
                </html>
                ';
                $im['from'] = strtolower($_POST['email']);
                $im['subject'] = '<< -- DEMANDE DE FORMATION -- >>';
                $im['email'] = 'davidmened@gmail.com' ?? 'formation@reitecinfo.net';
                $cfg->sendMail($im);
                echo(200);
                break;
            case 403:
                echo(403);
                break;
            case 500:
                echo(500);
                break;
            default:
                echo(505);
                break;
        }
    }
    if(isset($_POST['ident_me'])){
        $clause = '';
        $tbl = 'tbl_etudier';
        $identme = $_POST['ident_me'];
        $identcrs = $_POST['ident_crs'];
        $codeactivator = $_POST['codeactivator'];
        $st = ($cfg->onCatchingSomeCLN(['idEtudiant','idCours','shaCours'],
        [(int)$identme,(int) $identcrs, trim($codeactivator)],$clause,$tbl));
        $stt = (int) $st;

        switch ($stt) {
            case 200:
                $cls_ = "WHERE idEtudiant = $identme AND idCours = $identcrs AND datastatus = 1";
                $up = $cfg->onUpdate(['status'],[1],$tbl,$cls_);
                $up = (int) $up;
                switch ($up) {
                    case 200:
                        echo(200);
                        break;
                    case 503:
                        echo(503);
                        break;
                    default:
                        echo(500);
                        break;
                }
                break;
            case 500:
                echo(500);
                break;
            case 403:
                echo(403);
                break;
            default:
                echo(503);
                break;
        }
    }
    if(isset($_POST['email_sub'])){
        $cnnx_ = $cfg->onAdd([trim($_POST['email_sub'])],'',1112,0,'tbl_newsletter');
        $cnnx = (int) $cnnx_;
        switch ($cnnx) {
            case 200:
                echo(200);
                break;
            default:
                var_export($cnnx_);
                echo(500);
                break;
        }
    }
?>