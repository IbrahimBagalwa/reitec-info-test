<?php
    // include('../viva-box-scripts/php/services/services.php');
    $g = new GeneConnexion();

    function listOfPOS($g){
        if($g->listPOS() !== null){
            return $g->listPOS();
        }else return 0;
    }
    function onGeteSmsById($g,$id){
        $table = 'tbl_contact';
        $clause = "WHERE datastatus = 1 AND id = $id";
        if(count($g->onRetrieveData($table, $clause))){
            $cols = ['spending'];
            $values = [0];
            $up = $g->onUpdate($cols,$values,$table,$clause);
            $up = (int) $up;
            if($up === 200){
                $tab = [];
                $mssg = $g->onRetrieveData($table, $clause);
                for($i = 0; $i < count($mssg); $i++){
                    $msg = new Message($mssg[$i]['id'],
                    $mssg[$i]['nom'],
                    $mssg[$i]['email'],
                    $mssg[$i]['sujet'],
                    $mssg[$i]['message'],
                    $mssg[$i]['createdon']);
                array_push($tab, $msg);
                }
                return $tab;
            }
        }return 0;
    }
    function onRetrieveFCLTRById($g,$id){
        $table = 'tbl_facilitateur';
        $clause = "WHERE id = $id AND datastatus = 1";
        // var_dump($g->onRetrieveData($table, $clause));
        if(count($g->onRetrieveData($table, $clause))){
            $tab = [];
            $tabCours = [];
            // (onRetriveCours($g,$mssg[$i]['id']) !== 0 ) ? count(onRetriveCours($g,$mssg[$i]['id'])) : 0,
            $mssg = $g->onRetrieveData($table, $clause);
            for($i = 0; $i < count($mssg); $i++){
                $msg = new Facilitat($mssg[$i]['id'],
                $mssg[$i]['nom'],
                $mssg[$i]['prenom'],
                $mssg[$i]['telephone'],
                $mssg[$i]['email'],
                onRetriveCours($g,$mssg[$i]['id']),
                $mssg[$i]['accesslevel']);
            array_push($tab, $msg);
            }
            return $tab;
        }return 0;
    }
    function onRetriveCours($g,$id){
        $table = 'tbl_cours';
        $id = (int) $id;
        $clause = "JOIN 
                    tbl_facilitateur JOIN 
                    tbl_content JOIN 
                    tbl_subcateg_cours JOIN 
                    tbl_categ_cours ON 
                    tbl_cours.idContent = tbl_content.id AND 
                    tbl_cours.idCateg = tbl_categ_cours.id AND 
                    tbl_facilitateur.id = $id AND
                    tbl_categ_cours.id = tbl_subcateg_cours.idcategcours WHERE 
                    tbl_cours.datastatus = 1 AND 
                    tbl_cours.idFacilitateur = $id AND 
                    tbl_content.datastatus = 1";
        // var_dump($g->onRetrieveData($table, $clause));
        return $g->onRetrieveData($table, $clause);
        if(count($g->onRetrieveData($table, $clause)) > 0){
            $tab = [];
            $req = $g->onRetrieveData($table, $clause);
            for($i = 0; $i < count($req); $i++){
                $cours = new Cours($req[$i]['id'],$req[$i]['title'],$req[$i]['delai'],$req[$i]['prix'],$req[$i]['description'],
                [
                    $req[$i]['nom'],
                    $req[$i]['prenom'],	
                    $req[$i]['photo']
                ],$req[$i]['content'],$req[$i]['category'],$req[$i]['subcateg']);
                array_push($tab,$cours);
            }
            return $tab;
        }return 0;
    }
    function onRetrieveSTDT($g){
        $table = 'tbl_etudiant';
        $clause = 'WHERE datastatus = 1 ORDER BY id DESC';
        // var_dump($g->onRetrieveData($table, $clause));
        if(count($g->onRetrieveData($table, $clause))){
            $tab = [];
            $tabCours = [];
            // (onRetriveCours($g,$mssg[$i]['id']) !== 0 ) ? count(onRetriveCours($g,$mssg[$i]['id'])) : 0,
            $mssg = $g->onRetrieveData($table, $clause);
            for($i = 0; $i < count($mssg); $i++){
                $msg = new Facilitat($mssg[$i]['id'],
                $mssg[$i]['nom'],
                $mssg[$i]['prenom'],
                $mssg[$i]['telephone'],
                $mssg[$i]['email'],
                onRetriveCours($g,$mssg[$i]['id']),
                $mssg[$i]['accesslevel']);
            array_push($tab, $msg);
            }
            return $tab;
        }return 0;
    }
    function onRetrieveFCLTR($g){
        $table = 'tbl_facilitateur';
        $clause = 'WHERE datastatus = 1 ORDER BY id DESC';
        // var_dump($g->onRetrieveData($table, $clause));
        if(count($g->onRetrieveData($table, $clause))){
            $tab = [];
            $tabCours = [];
            // (onRetriveCours($g,$mssg[$i]['id']) !== 0 ) ? count(onRetriveCours($g,$mssg[$i]['id'])) : 0,
            $mssg = $g->onRetrieveData($table, $clause);
            for($i = 0; $i < count($mssg); $i++){
                $msg = new Facilitat($mssg[$i]['id'],
                $mssg[$i]['nom'],
                $mssg[$i]['prenom'],
                $mssg[$i]['telephone'],
                $mssg[$i]['email'],
                onRetriveCours($g,$mssg[$i]['id']),
                $mssg[$i]['accesslevel']);
            array_push($tab, $msg);
            }
            return $tab;
        }return 0;
    }
    function onRetriveCRSALL($g){
        $table = 'tbl_cours';
        $clause = 'WHERE datastatus = 1 ORDER BY id DESC';
        // var_dump($g->onRetrieveData($table, $clause));
        if(count($g->onRetrieveData($table, $clause))){
            $tab = [];
            $tab_dist = [];
            $tab_notdist = [];
            $req = $g->onRetrieveData($table, $clause);
            for($i = 0; $i < count($req); $i++){
                $infosFlt = [];
                $noInfos = '';
                $idx = (int)$req[$i]['idFacilitateur'];
                if($idx !== 0){
                    $fcl = onRetrieveFCLTRById($g,$idx) !== 0 ? onRetrieveFCLTRById($g,$idx)[0] : null;
                    if($fcl !== null){
                        $infosFlt['name'] = $fcl->nom;
                        $infosFlt['postnom'] = $fcl->postnom; 
                        $infosFlt['email'] = $fcl->email;
                    }else {
                        $infosFlt['name'] = null;
                        $infosFlt['postnom'] = null; 
                        $infosFlt['email'] = null;
                    }
                    if((int)$req[$i]['isattributed'] === 1){
                        $cours = new Cours($req[$i]['id'],$req[$i]['title'],$req[$i]['delai'],$req[$i]['prix'],$req[$i]['description'],
                        [
                            $infosFlt['name'],$infosFlt['postnom'],$infosFlt['email']
                        ],null,null,null);
                        array_push($tab_notdist,$cours);
                    }else{
                        $cours = new Cours($req[$i]['id'],$req[$i]['title'],$req[$i]['delai'],$req[$i]['prix'],$req[$i]['description'],
                        [
                            $infosFlt['name'],$infosFlt['postnom'],$infosFlt['email']
                        ],null,null,null);
                        array_push($tab_dist,$cours);
                    }
                }else{
                    $cours = new Cours($req[$i]['id'],$req[$i]['title'],$req[$i]['delai'],$req[$i]['prix'],$req[$i]['description'],
                    [
                        null,null,null
                    ],null,null,null);
                    array_push($tab_notdist,$cours);
                }
            }
            $tab['distCours'] = ($tab_dist);
            $tab['notDistCours'] = ($tab_notdist);
            return $tab;
        }return 0;
    }
    function onGetCours($g){
        $table = 'tbl_cours';
        $clause = 'WHERE datastatus = 1 AND isattributed = 1 ORDER BY id DESC';
        // var_dump($g->onRetrieveData($table, $clause));
        if(count($g->onRetrieveData($table, $clause))){
            $tab = [];
            $req = $g->onRetrieveData($table, $clause);
            for($i = 0; $i < count($req); $i++){
                $cours = new Cours($req[$i]['id'],$req[$i]['title'],$req[$i]['delai'],$req[$i]['prix'],$req[$i]['description'],
                [
                    null,null,null
                ],null,null,null);
                array_push($tab,$cours);
            }
            return $tab;
        }return 0;
    }
    function onRetriveDataCategorieSub($g,$id){
        $table = 'tbl_subcateg_cours';
        $clause = 'WHERE datastatus = 1';
        // var_dump($g->onRetrieveData($table, $clause));
        if(count($g->onRetrieveData($table, $clause))){
            $tab = [];
            $req = $g->onRetrieveData($table, $clause);
            for($i = 0; $i < count($req); $i++){
                $cours = new Categ($req[$i]['id'],$req[$i]['subcateg'],null);
                array_push($tab,$cours);
            }
            return $tab;
        }return 0;
    }
    function onRetriveDataCategorie($g,$id){
        $table = 'tbl_categ_cours';
        $clause = 'WHERE datastatus = 1';
        // var_dump($g->onRetrieveData($table, $clause));
        if(count($g->onRetrieveData($table, $clause))){
            $tab = [];
            $req = $g->onRetrieveData($table, $clause);
            for($i = 0; $i < count($req); $i++){
                $cours = new Categ($req[$i]['id'],$req[$i]['category'],null);
                array_push($tab,$cours);
            }
            return $tab;
        }return 0;
    }
    function onRetrieveUnreadMSSG($g){
        $table = 'tbl_contact';
        $clause = 'WHERE datastatus = 1 AND spending = 1 ORDER BY id DESC';
        // var_dump($g->onRetrieveData($table, $clause));
        if(count($g->onRetrieveData($table, $clause))){
            $tab = [];
            $mssg = $g->onRetrieveData($table, $clause);
            for($i = 0; $i < count($mssg); $i++){
                $msg = new Message($mssg[$i]['id'],
                $mssg[$i]['nom'],
                $mssg[$i]['email'],
                $mssg[$i]['sujet'],
                $mssg[$i]['message'],
                $mssg[$i]['createdon']);
            array_push($tab, $msg);
            }
            return $tab;
        }return 0;
    }
    function onRetrieveUnreadMSSGSent($g){
        $table = 'tbl_contact';
        $clause = 'WHERE datastatus = 1 AND spending = 1111 ORDER BY id DESC';
        // var_dump($g->onRetrieveData($table, $clause));
        if(count($g->onRetrieveData($table, $clause))){
            $tab = [];
            $mssg = $g->onRetrieveData($table, $clause);
            for($i = 0; $i < count($mssg); $i++){
                $msg = new Message($mssg[$i]['id'],
                $mssg[$i]['nom'],
                $mssg[$i]['email'],
                $mssg[$i]['sujet'],
                $mssg[$i]['message'],
                $mssg[$i]['createdon']);
            array_push($tab, $msg);
            }
            return $tab;
        }return 0;
    }
    function onRetrieveUnreadMSSGJnk($g){
        $table = 'tbl_contact';
        $clause = 'WHERE datastatus = 1 AND spending = 0 ORDER BY id DESC';
        // var_dump($g->onRetrieveData($table, $clause));
        if(count($g->onRetrieveData($table, $clause))){
            $tab = [];
            $mssg = $g->onRetrieveData($table, $clause);
            for($i = 0; $i < count($mssg); $i++){
                $msg = new Message($mssg[$i]['id'],
                $mssg[$i]['nom'],
                $mssg[$i]['email'],
                $mssg[$i]['sujet'],
                $mssg[$i]['message'],
                $mssg[$i]['createdon']);
            array_push($tab, $msg);
            }
            return $tab;
        }return 0;
    }
    function onCheckSession(){
        if(isset($_COOKIE['tkn']))setcookie("tkn",md5('dav.me'),time()+3600,'/');
        else unset($_SESSION['token']);
    }
    function onRetrieveName($bool){
       if(isset($_SESSION['ident-me-'])){
           $session = (array) $_SESSION['ident-me-'];
           return ucfirst($session['nom']).' '.ucfirst($session['postnom']);
       }else{
            return 'undefined';
       }
    }
    function onRetrieveCours($g){
        $tbl = 'tbl_formation';
        $clause = 'WHERE datastatus = 1';
        return $g->onCountKLK($tbl, $clause);
    }
    function onRetrieveSTD($g){
        $tbl = 'tbl_etudiant';
        $clause = 'WHERE datastatus = 1';
        return $g->onCountKLK($tbl, $clause);
    }
    function onRetrieveMSGS($g){
        $tbl = 'tbl_contact';
        $clause = 'WHERE datastatus = 1 AND spending = 1';
        return $g->onCountKLK($tbl, $clause);
    }
    function onRetrieveMSGSRead($g){
        $tbl = 'tbl_contact';
        $clause = 'WHERE datastatus = 1 AND spending = 0';
        return $g->onCountKLK($tbl, $clause);
    }
    function onRetrieveFCL($g){
        $tbl = 'tbl_facilitateur';
        $clause = 'WHERE datastatus = 1';
        return $g->onCountKLK($tbl, $clause);
    }
    function onRetrieveLRN($g){
        $tbl = 'tbl_etudier';
        $clause = 'GROUP BY idEtudiant AND datastatus = 1';
        return $g->onCountKLK($tbl, $clause);
    }
    function throwError(){
        return ('
                <div class="col-lg-12 bg-white d-felx justify-content-center p-5">
                    <div class="alert alert-danger">
                        <h2 class=""><span class="fa fa-warning"></span> Error :&nbsp;500</h2>
                        <p>Erreur du serveur : Route d\'accès non trouvée</p>
                        <p>If problem persiste contact us on <br> <span class="fa fa-phone mr-2"></span> <b>+243 970 284 772</b>
                        <br> <span class="fa fa-phone mr-2"></span> <b>+243 852 348 960</b> <br> 
                        <span class="fa fa-envelope mr-2"></span><b><a href="mailto:davidmened@gmail.com">davidmened@gmail.com</a></b></p>
                    </div>
                </div>
            ');
    }
    function onRetrieveImg(){
        if(isset($_SESSION['ident-me-'])){
            $session = (array) $_SESSION['ident-me-'];
            return $session['img'];
        }else{
            return 'undefined';
        }
    }
    function onRetrieveEmeil(){
        if(isset($_SESSION['ident-me-'])){
            $session = (array) $_SESSION['ident-me-'];
            return $session['email'];
        }else{
            return 'undefined';
        }
    }
    function onRetrieveAccessLevel(){
        if(isset($_SESSION['ident-me-'])){
            $session = (array) $_SESSION['ident-me-'];
            $access = (int)$session['accsslevel'];
            return $access;
        }else{
            return null;
        }
    }
    function onRetrieveLevel(){
        if(isset($_SESSION['ident-me-'])){
            $session = (array) $_SESSION['ident-me-'];
            $access = ((int)$session['accsslevel'] === 19000) ? true : false;
            return $access;
        }else{
            return false;
        }
    }
    function getAllFormation($conf,$offset){
        $nbppage = 3;
        $offset = (is_numeric($offset) ? $offset : 1);
        $table = 'tbl_formation';
        $clause = "JOIN 
        tbl_subcateg_cours JOIN 
        tbl_categ_cours ON 
        tbl_formation.idcateg = tbl_categ_cours.id AND 
        tbl_formation.idsubcateg = tbl_subcateg_cours.id WHERE 
        tbl_formation.datastatus = 1 AND 
        tbl_categ_cours.datastatus = 1 AND
        tbl_subcateg_cours.datastatus = 1 ORDER BY tbl_formation.id DESC LIMIT $offset";
        $req = $conf->onRTPaginations($table, $clause);
        // var_dump($req[0]);
        // return 0;
        // if(count($conf->onRetrieveAllCours()) > 0){
        if(count($req)>0){
            $tab = [];
            $tab_dist = [];
            $tab_notdist = [];
            for($i = 0; $i < count($req); $i++){
                $infosFlt = [];
                $noInfos = '';
                $idx = (int)$req[$i]['idfacilitateur'];
                if($idx !== 0){
                    $fcl = onRetrieveFCLTRById($conf,$idx) !== 0 ? onRetrieveFCLTRById($conf,$idx)[0] : null;
                    if($fcl !== null){
                        $infosFlt['name'] = $fcl->nom;
                        $infosFlt['postnom'] = $fcl->postnom; 
                        $infosFlt['email'] = $fcl->email;
                    }else {
                        $infosFlt['name'] = null;
                        $infosFlt['postnom'] = null; 
                        $infosFlt['email'] = null;
                    }
                    if((int)$req[$i]['isattributed'] === 1){
                        $cours = new Formation($req[$i]['0'],$req[$i]['title'],$req[$i]['datestart'],$req[$i]['dateend'],$req[$i]['couts'],$req[$i]['synthese'],
                        [
                            $infosFlt['name'],$infosFlt['postnom'],$infosFlt['email']
                        ],null,$req[$i]['category'],$req[$i]['subcateg']);
                        array_push($tab_notdist,$cours);
                    }else{
                        $cours = new Formation($req[$i]['0'],$req[$i]['title'],$req[$i]['datestart'],$req[$i]['dateend'],$req[$i]['couts'],$req[$i]['synthese'],
                        [
                            $infosFlt['name'],$infosFlt['postnom'],$infosFlt['email']
                        ],null,$req[$i]['category'],$req[$i]['subcateg']);
                        array_push($tab_dist,$cours);
                    }
                }else{
                    $cours = new Formation($req[$i]['0'],$req[$i]['title'],$req[$i]['datestart'],$req[$i]['dateend'],$req[$i]['couts'],$req[$i]['synthese'],
                    [
                        null,null,null
                    ],null,$req[$i]['category'],$req[$i]['subcateg']);
                    array_push($tab_notdist,$cours);
                }
            }
            $tab['distCours'] = ($tab_dist);
            $tab['notDistCours'] = ($tab_notdist);
            return array_merge($tab['distCours'],$tab['notDistCours']);
        }return 0;

    }
    function onGetParticipantById($g,$idformation){
        $id = (is_numeric($idformation) ? $idformation : 0);
        $clauseLRN = "WHERE idCours = $id AND datastatus = 1"; // status = 1
        $tabLRN = 'tbl_etudier';
        $tabSTD = 'tbl_etudiant';
        $lnrs = ($g->onRetrieveData($tabLRN, $clauseLRN));
        if(count($lnrs) !== 0){//
            $tab = [];
            for($j = 0; $j < count($lnrs); $j++){
                $pax = $lnrs[$j]['idEtudiant'];
                $clsEt = "WHERE id = $pax";
                $lnr = $g->onRetrieveData($tabSTD, $clsEt);
                for($i = 0; $i < count($lnr); $i++){
                    $std = new Learner(
                        $lnr[$i]['id'],
                        $lnr[$i]['nom'],
                        $lnr[$i]['postnom'],
                        $lnr[$i]['email'],
                        $lnr[$i]['telephone'],
                        $lnr[$i]['genre'],
                        '',
                        ((int)$lnrs[$j]['status'] === 1) ? 1 : 0,
                        $lnrs[$i]['typeSuply'],
                        $lnrs[$i]['shaCours'],	
                        $lnrs[$i]['onlineOrOffline']
                    );
                array_push($tab, $std);
                }
            }
            return $tab;
        }return 0;

    }
    function getFormationById($conf,$offset){
        $nbppage = 3;
        $offset = (is_numeric($offset) ? $offset : 0);
        $table = 'tbl_formation';
        $clause = "JOIN 
        tbl_subcateg_cours JOIN 
        tbl_categ_cours ON 
        tbl_formation.idcateg = tbl_categ_cours.id AND 
        tbl_formation.idsubcateg = tbl_subcateg_cours.id WHERE 
        tbl_formation.datastatus = 1 AND 
        tbl_categ_cours.datastatus = 1 AND
        tbl_subcateg_cours.datastatus = 1 AND tbl_formation.id = $offset";
        $req = $conf->onRTPaginations($table, $clause);
        // var_dump($req[0]);
        // return 0;
        // if(count($conf->onRetrieveAllCours()) > 0){
        if(count($req)>0){
            $tab = [];
            $tab_dist = [];
            $tab_notdist = [];
            for($i = 0; $i < count($req); $i++){
                $infosFlt = [];
                $noInfos = '';
                $idx = (int)$req[$i]['idfacilitateur'];
                if($idx !== 0){
                    $fcl = onRetrieveFCLTRById($conf,$idx) !== 0 ? onRetrieveFCLTRById($conf,$idx)[0] : null;
                    if($fcl !== null){
                        $infosFlt['name'] = $fcl->nom;
                        $infosFlt['postnom'] = $fcl->postnom; 
                        $infosFlt['email'] = $fcl->email;
                    }else {
                        $infosFlt['name'] = null;
                        $infosFlt['postnom'] = null; 
                        $infosFlt['email'] = null;
                    }
                    if((int)$req[$i]['isattributed'] === 1){
                        $cours = new Formation($req[$i]['0'],$req[$i]['title'],$req[$i]['datestart'],$req[$i]['dateend'],$req[$i]['couts'],$req[$i]['synthese'],
                        [
                            $infosFlt['name'],$infosFlt['postnom'],$infosFlt['email']
                        ],null,$req[$i]['category'],$req[$i]['subcateg']);
                        array_push($tab_notdist,$cours);
                    }else{
                        $cours = new Formation($req[$i]['0'],$req[$i]['title'],$req[$i]['datestart'],$req[$i]['dateend'],$req[$i]['couts'],$req[$i]['synthese'],
                        [
                            $infosFlt['name'],$infosFlt['postnom'],$infosFlt['email']
                        ],null,$req[$i]['category'],$req[$i]['subcateg']);
                        array_push($tab_dist,$cours);
                    }
                }else{
                    $cours = new Formation($req[$i]['0'],$req[$i]['title'],$req[$i]['datestart'],$req[$i]['dateend'],$req[$i]['couts'],$req[$i]['synthese'],
                    [
                        null,null,null
                    ],null,$req[$i]['category'],$req[$i]['subcateg']);
                    array_push($tab_notdist,$cours);
                }
            }
            $tab['distCours'] = ($tab_dist);
            $tab['notDistCours'] = ($tab_notdist);
            return array_merge($tab['distCours'],$tab['notDistCours']);
        }return 0;

    }
    function onRetrieveLRNBYFormationId($g,$trg){
        $tbl = 'tbl_etudier';
        $idc = (is_numeric($trg) ? $trg : 0);
        $clause = "WHERE idCours = $idc AND datastatus = 1";
        return $g->onCountKLK($tbl, $clause);
    }
    function _getStatus($s,$e){
        $now = date('Y-m-d');
        $status = 'unknown';
        if($e > $now){ $status = '<span class="p-2 border rounded-pill bg-info badge">En attente</span>'; }
        if($e < $now){ $status = '<span class="p-2 border rounded-pill bg-danger badge">Terminée</span>'; }
        if($now >= $s && $now <= $e){ $status = '<span class="p-2 border rounded-pill bg-success- badge"><span class="spinner-grow spinner-grow-sm mr-1 text-danger"></span>En cours</span>';}
        return $status;
    }
    // var_dump($_SESSION);
?>