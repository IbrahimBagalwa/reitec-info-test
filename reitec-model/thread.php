<?php 
    $state = true;
    $conf = new Config();
    $state = ($conf->onConn() === null) ? false : true; 
    if($state){
        function getUserIP() {
            /* $ipaddress = '';
             if (isset($_SERVER['HTTP_CLIENT_IP']))
                 $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
             else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                 $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
             else if(isset($_SERVER['HTTP_X_FORWARDED']))
                 $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
             else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
                 $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
             else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                 $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
             else if(isset($_SERVER['HTTP_FORWARDED']))
                 $ipaddress = $_SERVER['HTTP_FORWARDED'];
             else if(isset($_SERVER['REMOTE_ADDR']))
                 $ipaddress = $_SERVER['REMOTE_ADDR'];
             else
                 $ipaddress = 'UNKNOWN';
             return $ipaddress; */
             //  if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
             //     $ip = $_SERVER["REMOTE_ADDR"];
             //     if ($deep_detect) {
             //         if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
             //             $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
             //         if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
             //             $ip = $_SERVER['HTTP_CLIENT_IP'];
             //     }
             // } else {
             //     $ip = $_SERVER["REMOTE_ADDR"];
             // }
             // date_default_timezone_set("UTC");
             // $has = date("Ymd");
             // $has = sha1($has);
             // if(isset($_COOKIE["visitor_L1000_dvd_dev"])){
             //   $cookies = $_COOKIE["visitor_L1000_dvd_dev"];
             // }else{
             //   setcookie("visitor_L1000_dvd_dev",$has);
             //   // h6r6gmobhun6605f5eujqac2m2
             // }
             // setcookie('INDENTL','david maene');
             $except = rand(10,10000);
             return $cookies = $_COOKIE["PHPSESSID"] ?? $_SESSION['_userId_'] ?? $except;
         }
        function count_row($categ,$conf){
            $now = date('Y-m-d');
            $table = 'tbl_formation';
            $clause = "WHERE dateend > '$now' AND datastatus = 1"; 
            $req = $conf->onRetrieveData($table, $clause);
            return count($req);
        }
        function _checkTimesViewed($ip,$page,$bdd){
            $req = $bdd->prepare("SELECT * FROM _visitors WHERE _visitors._ipVisitor = ? AND _visitors._page = ?");
            $req->execute([$ip,$page]);
            $req = $req->fetch();
            if($req['_times'] >= 1){
                return $req['_times'];
            }else{
                return 0;
            }
        }
        function getFRMPGNT($offset,$nbppage,$categ,$conf){
            $now = date('Y-m-d');
            
            $table = 'tbl_formation';
            $clause = "JOIN 
            tbl_subcateg_cours JOIN 
            tbl_categ_cours ON 
            tbl_formation.idcateg = tbl_categ_cours.id AND 
            tbl_formation.idsubcateg = tbl_subcateg_cours.id WHERE 
            tbl_formation.datastatus = 1 AND 
            tbl_categ_cours.datastatus = 1 AND
            dateend > '$now' AND
            tbl_subcateg_cours.datastatus = 1 LIMIT :limi OFFSET :offset";
            $req = $conf->onRTPagination($offset,$nbppage,$table, $clause);
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
        function _compterUser($page,$bdd){
            $clause = "";
            $page = "'$page'";
            $output = '_times';
            $table = 'tbl_visitors';
            $ip = getUserIP();
            $ip = "'$ip'";
            $cls = "WHERE _page = $page AND _ipVisitor = $ip";
            // $bdd = $bdd->onConn();
            $times = $bdd->onCatchingVLS($output,$table,$cls); //$times = $times[$output]; //_checkTimesViewed($ip,$page,$bdd);
            var_dump($times);
            // var_dump($ip);
            if ((int)$times !== 0) {
                $times = (int)$times + 1;
                $req = $bdd->onUpdate(['_times'],[$times],$table,$cls);
            }else{
                $req = $bdd->onAdd([$ip,$page,1,date('Y-m-d, H:i:s')], $clause, 1211, base64_encode('dav.me'), $table);
            
            } 
        }
        function getCoursPGNT($offset,$nbppage,$categ,$conf){
            $table = 'tbl_cours';
            $clause = 'JOIN 
            tbl_subcateg_cours JOIN 
            tbl_categ_cours ON 
            tbl_cours.idCateg = tbl_categ_cours.id AND 
            tbl_cours.idSubcateg = tbl_subcateg_cours.id WHERE 
            tbl_cours.datastatus = 1 AND 
            tbl_categ_cours.datastatus = 1 AND
            tbl_subcateg_cours.datastatus = 1 LIMIT :limi OFFSET :offset';
            $req = $conf->onRTPagination($offset,$nbppage,$table, $clause);
            // if(count($conf->onRetrieveAllCours()) > 0){
            if(count($req)>0){
                $tab = [];
                $tab_dist = [];
                $tab_notdist = [];
                for($i = 0; $i < count($req); $i++){
                    $infosFlt = [];
                    $noInfos = '';
                    $idx = (int)$req[$i]['idFacilitateur'];
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
                            $cours = new Cours($req[$i]['0'],$req[$i]['title'],$req[$i]['delai'],$req[$i]['prix'],$req[$i]['description'],
                            [
                                $infosFlt['name'],$infosFlt['postnom'],$infosFlt['email']
                            ],null,$req[$i]['category'],$req[$i]['subcateg']);
                            array_push($tab_notdist,$cours);
                        }else{
                            $cours = new Cours($req[$i]['0'],$req[$i]['title'],$req[$i]['delai'],$req[$i]['prix'],$req[$i]['description'],
                            [
                                $infosFlt['name'],$infosFlt['postnom'],$infosFlt['email']
                            ],null,$req[$i]['category'],$req[$i]['subcateg']);
                            array_push($tab_dist,$cours);
                        }
                    }else{
                        $cours = new Cours($req[$i]['0'],$req[$i]['title'],$req[$i]['delai'],$req[$i]['prix'],$req[$i]['description'],
                        [
                            null,null,null
                        ],null,$req[$i]['category'],$req[$i]['subcateg']);
                        array_push($tab_notdist,$cours);
                    }
                }
                $tab['distCours'] = ($tab_dist);
                $tab['notDistCours'] = ($tab_notdist);
                return $tab;
            }return 0;
        }
        function getCouurs($offset,$nbppage,$categ,$conf){
            $table = 'tbl_cours';
            $clause = 'JOIN 
            tbl_subcateg_cours JOIN 
            tbl_categ_cours ON 
            tbl_cours.idCateg = tbl_categ_cours.id AND 
            tbl_cours.idSubcateg = tbl_subcateg_cours.id WHERE 
            tbl_cours.datastatus = 1 AND 
            tbl_categ_cours.datastatus = 1 AND
            tbl_subcateg_cours.datastatus = 1';
            $req = $conf->onRetrieveData($table, $clause);
            // if(count($conf->onRetrieveAllCours()) > 0){
            if(count($req)>0){
                $tab = [];
                $tab_dist = [];
                $tab_notdist = [];
                for($i = 0; $i < count($req); $i++){
                    $infosFlt = [];
                    $noInfos = '';
                    $idx = (int)$req[$i]['idFacilitateur'];
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
                            $cours = new Cours($req[$i]['0'],$req[$i]['title'],$req[$i]['delai'],$req[$i]['prix'],$req[$i]['description'],
                            [
                                $infosFlt['name'],$infosFlt['postnom'],$infosFlt['email']
                            ],null,$req[$i]['category'],$req[$i]['subcateg']);
                            array_push($tab_notdist,$cours);
                        }else{
                            $cours = new Cours($req[$i]['0'],$req[$i]['title'],$req[$i]['delai'],$req[$i]['prix'],$req[$i]['description'],
                            [
                                $infosFlt['name'],$infosFlt['postnom'],$infosFlt['email']
                            ],null,$req[$i]['category'],$req[$i]['subcateg']);
                            array_push($tab_dist,$cours);
                        }
                    }else{
                        $cours = new Cours($req[$i]['0'],$req[$i]['title'],$req[$i]['delai'],$req[$i]['prix'],$req[$i]['description'],
                        [
                            null,null,null
                        ],null,$req[$i]['category'],$req[$i]['subcateg']);
                        array_push($tab_notdist,$cours);
                    }
                }
                $tab['distCours'] = ($tab_dist);
                $tab['notDistCours'] = ($tab_notdist);
                return $tab;
            }return 0;

        }
        function isActivatedCRS($conf,$me,$crs){
            $clause = '';
            $tbl = 'tbl_etudier';
            $me = (int) $me;
            $crs = (int) $crs;
            $str = $conf->onCatchingSomeCLN(['idEtudiant','idCours','status'],[$me,$crs,1],$clause,$tbl);
            $str = (int) $str;
            switch ($str) {
                case 200:
                    return 200;
                case 500:
                    return 500;
                case 403:
                    return 403;
                default:
                    return 503;
            }
        }
        function onAddingToMyLSTCRS($conf,$me,$crs){
            $accLVL = 1122;
            $state = 0; //means not activate : 1 ie. active 
            $tbl = 'tbl_etudier'; $table = 'tbl_formation';
            $crs = (is_numeric($crs)) ? $crs : 0;
            $output = 'datestart'; // from cours
            $output_ = 'dateend'; // from cours
            $cls = 'AND datastatus = 1';
            $clause = '';
            $tm = $conf->onCatchVLCOLLN($crs,$output,$table,$cls)[0];
            $tm_ = $conf->onCatchVLCOLLN($crs,$output_,$table,$cls)[0];
            $rmt = (($tm !== 'undefined' && $tm !== 0) ? $tm : 0); $rmt = $rmt[$output];
            $rmt_ = (($tm_ !== 'undefined' && $tm_ !== 0) ? $tm_ : 0); $rmt_ = $rmt_[$output_];
            $mes = (is_numeric($me)) ? $me : 0;
            // $remaining = $rmt_;
            $remaining = date_diff(date_create($rmt),date_create($rmt_));
            $remaining = $remaining->format('%R%a');
            $remaining = substr($remaining,1);
            // echo($remaining);
            // return 505;
            // structure _dav.me:reitec-idCours_idMIME
            $sha = base64_encode("_dav.me:reitec-$crs-$me");
            // var_dump($sha);
            // echo(base64_decode($sha));
            $op = $conf->onAdd([$mes,$crs,$sha,$remaining,$state],$clause,$accLVL,$me,$tbl);
            $add = (int) $op;
            switch($add){
                case 200:
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
        function getCoursACTMENOTActivate($conf,$offset,$identme){
            $identme = (is_numeric($identme) ? $identme : 0);
            $offset = (is_numeric($offset) ? $offset : 1);
            $mtable = 'tbl_etudier';
            $table = 'tbl_formation';
            $rmt = 0; // getCoursACTMENOTActivate
            $mclause = "WHERE idEtudiant = $identme AND status = 0 AND datastatus = 1 ORDER BY id DESC LIMIT $offset";
            $clause = "JOIN 
            tbl_subcateg_cours JOIN 
            tbl_categ_cours ON 
            tbl_formation.idcateg = tbl_categ_cours.id AND 
            tbl_formation.idsubcateg = tbl_subcateg_cours.id WHERE 
            tbl_formation.datastatus = 1 AND 
            tbl_categ_cours.datastatus = 1 AND
            tbl_subcateg_cours.datastatus = 1";
            // return $mclause;
            $req = $conf->onRetrieveData($mtable, $mclause);
            $mesc = [];
            $crs = [];
            // if(count($conf->onRetrieveAllCours()) > 0){
            if(count($req)>0){
               for($i = 0; $i < count($req); $i++){
                   $crs['rmTime'] = $req[$i]['remaningTime'];
                   $crs_ = getCoursById($req[$i]['idCours'],$conf); /*$crs_ = array_merge($crs_['distCours'],$crs_['notDistCours'])[0];*/
                   $crs['cours'] = $crs_;
                   array_push($mesc,$crs);
               }
               return $mesc;
            }return 0;
        }
        function getCoursACTME($conf,$offset,$identme){
            $identme = (is_numeric($identme) ? $identme : 0);
            $offset = (is_numeric($offset) ? $offset : 1);
            $mtable = 'tbl_etudier';
            $table = 'tbl_formation';
            $rmt = 0;
            $mclause = "WHERE idEtudiant = $identme AND status = 1 AND remaningTime > $rmt AND datastatus = 1 ORDER BY id DESC LIMIT $offset";
            $clause = "JOIN 
            tbl_subcateg_cours JOIN 
            tbl_categ_cours ON 
            tbl_formation.idcateg = tbl_categ_cours.id AND 
            tbl_formation.idsubcateg = tbl_subcateg_cours.id WHERE 
            tbl_formation.datastatus = 1 AND 
            tbl_categ_cours.datastatus = 1 AND
            tbl_subcateg_cours.datastatus = 1";
            // return $mclause;
            $req = $conf->onRetrieveData($mtable, $mclause);
            $mesc = [];
            $crs = [];
            // if(count($conf->onRetrieveAllCours()) > 0){
            if(count($req)>0){
               for($i = 0; $i < count($req); $i++){
                   $crs['rmTime'] = $req[$i]['remaningTime'];
                   $crs_ = getCoursById($req[$i]['idCours'],$conf); /*$crs_ = array_merge($crs_['distCours'],$crs_['notDistCours'])[0];*/
                   $crs['cours'] = $crs_;
                   array_push($mesc,$crs);
               }
               return $mesc;
            }return 0;
        }
        function getCours($conf,$offset){
            $now = date('Y-m-d');
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
            dateend > '$now' AND
            tbl_subcateg_cours.datastatus = 1 ORDER BY tbl_formation.id DESC LIMIT $offset";
            $req = $conf->onRTPaginations($table, $clause);
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
        function gettingVLSCLS($g,$table,$cls,$output){
            $tm = $g->onCatchingVLS($output,$table,$cls)[0];
            return $tm[$output];
        }
        function getCateg($g, $idx){
        }
        function getCoursById($idx,$conf){
            $idx = is_numeric($idx) ? $idx : 0;
            $table = 'tbl_formation';
            $clause = "JOIN 
            tbl_subcateg_cours JOIN 
            tbl_categ_cours ON 
            tbl_formation.idcateg = tbl_categ_cours.id AND 
            tbl_formation.idsubcateg = tbl_subcateg_cours.id WHERE 
            tbl_formation.datastatus = 1 AND 
            tbl_categ_cours.datastatus = 1 AND
            tbl_subcateg_cours.datastatus = 1 AND tbl_formation.id = $idx";
            $req = $conf->onRetrieveData($table, $clause);
            // var_dump($req);
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
                            ],$req[$i]['idcontent'],$req[$i]['category'],$req[$i]['subcateg']);
                            array_push($tab_notdist,$cours);
                        }else{
                            $cours = new Formation($req[$i]['0'],$req[$i]['title'],$req[$i]['datestart'],$req[$i]['dateend'],$req[$i]['couts'],$req[$i]['synthese'],
                            [
                                $infosFlt['name'],$infosFlt['postnom'],$infosFlt['email']
                            ],$req[$i]['idcontent'],$req[$i]['category'],$req[$i]['subcateg']);
                            array_push($tab_dist,$cours);
                        }
                    }else{
                        $cours = new Formation($req[$i]['0'],$req[$i]['title'],$req[$i]['datestart'],$req[$i]['dateend'],$req[$i]['couts'],$req[$i]['synthese'],
                        [
                            null,null,null
                        ],$req[$i]['idcontent'],$req[$i]['category'],$req[$i]['subcateg']);
                        array_push($tab_notdist,$cours);
                    }
                }
                $tab['distCours'] = ($tab_dist);
                $tab['notDistCours'] = ($tab_notdist);
                return array_merge($tab['distCours'],$tab['notDistCours']);
            }return 0;
        }
        function getContentCRS($idx,$conf){
            $idx = is_numeric($idx) ? $idx : 0;
            $table = 'tbl_content';
            $clause = "WHERE id = $idx";
            $req = $conf->onRetrieveData($table, $clause);
            if(count($req)>0){
                $tab = [];
                for($i = 0; $i < count($req); $i++){
                    $cat = new Categ($req[$i]['id'],$req[$i]['categ'],$req[$i]['content']);
                    array_push($tab,$cat);
                }
                return $tab[0];
            }else return 0;
        }

    }
?>