<?php
    // ----------------------------------------------------
    session_start();
    // -----------------------------------------------------
    class Config{
        public $dbName = '_db_reitec_info';
        public $server = 'localhost';
        public $userName = 'root';
        public $password = '';
        private $statusData = 1;
        function __construct(){
            $this->addFiveExtraColumn();
        }
        public function onRetrieveData($tbl, $clause){
            $re = $this->onConn()->prepare("SELECT * FROM $tbl $clause");
            try {
                $re->execute();
                $re = $re->fetchAll();
                if(!empty($re)){
                    if(count($re) > 0){
                        return $re;
                    }else return array();
                }else return array();
            } catch (PDOException $e) {
                // $exc = new LogNotification([Date('d/m/Y, H:i:s')],["SHOW COLUMNS FROM $tbl"],['Failed'],[$e->getMessage()]);
                // $this->errorWritter($exc,2);
                return array();
            }
        }
        public function onRTPaginations($tbl,$clause){
            // $per_page = (int) $offset;
            // $start = (int) $recordPerPage;
            $pre = $this->onConn()->prepare("SELECT * FROM $tbl $clause");
            // $pre->bindValue(':limi', (int) $start, PDO::PARAM_INT);
            // $pre->bindValue(':offset', (int) $per_page, PDO::PARAM_INT);
            // $pre->bindValue(':cat', (int) $categ, PDO::PARAM_INT);
            try {
                $pre->execute();
                $pre = $pre->fetchAll();
                if(!empty($pre)){
                    if(count($pre) > 0){
                        return $pre;
                    }else return array();
                }else return array();
            } catch (PDOException $e) {
                // $exc = new LogNotification([Date('d/m/Y, H:i:s')],["SHOW COLUMNS FROM $tbl"],['Failed'],[$e->getMessage()]);
                // $this->errorWritter($exc,2);
                return array();
            }
        }
        public function onRTPagination($offset,$recordPerPage,$tbl,$clause){
            $per_page = (int) $offset;
            $start = (int) $recordPerPage;
            $pre = $this->onConn()->prepare("SELECT * FROM $tbl $clause");
            $pre->bindValue(':limi', (int) $start, PDO::PARAM_INT);
            $pre->bindValue(':offset', (int) $per_page, PDO::PARAM_INT);
            // $pre->bindValue(':cat', (int) $categ, PDO::PARAM_INT);
            try {
                $pre->execute();
                $pre = $pre->fetchAll();
                if(!empty($pre)){
                    if(count($pre) > 0){
                        return $pre;
                    }else return array();
                }else return array();
            } catch (PDOException $e) {
                // $exc = new LogNotification([Date('d/m/Y, H:i:s')],["SHOW COLUMNS FROM $tbl"],['Failed'],[$e->getMessage()]);
                // $this->errorWritter($exc,2);
                return array();
            }
        }
        public function onRetrieveAllCours(){
            $cnx = $this->onConn();
            if($cnx !== null){
                $req = $cnx->prepare('SELECT * FROM 
                tbl_cours JOIN 
                tbl_content JOIN 
                tbl_subcateg_cours JOIN 
                tbl_categ_cours ON 
                tbl_cours.idContent = tbl_content.id AND 
                tbl_cours.idCateg = tbl_categ_cours.id AND 
                tbl_categ_cours.id = tbl_subcateg_cours.idcategcours WHERE 
                tbl_cours.datastatus = ? AND 
                tbl_content.datastatus = ?');
                try {
                    $req->execute([$this->statusData,$this->statusData]);
                    $req = $req->fetchAll();
                    if(!empty($req)){
                        // var_export($req);
                        // $tbCours = [];
                        // for($i = 0; $i < count($req); ++$i){
                        //     $cours = new Cours($req[$i]['0'],$req[$i]['title'],$req[$i]['delai'],$req[$i]['prix'],$req[$i]['description'],
                        //     [
                        //         $req[$i]['nom'],
                        //         $req[$i]['prenom'],	
                        //         $req[$i]['photo']
                        //     ],$req[$i]['content'],$req[$i]['category'],$req[$i]['subcateg']);
                        //     array_push($tbCours,$cours);
                        // }
                        return $req;
                    }else return array();
                } catch (PDOException $e) {
                    return $e->getMessage();
                }
            }else return array();
            
        }
        public function onRetrieveAllCours_($offset){
            $cnx = $this->onConn();
            if($cnx !== null){
                $req = $cnx->prepare('SELECT * FROM 
                tbl_cours JOIN 
                tbl_facilitateur JOIN 
                tbl_content JOIN 
                tbl_subcateg_cours JOIN 
                tbl_categ_cours ON 
                tbl_cours.idFacilitateur = tbl_facilitateur.id AND 
                tbl_cours.idContent = tbl_content.id AND 
                tbl_cours.idCateg = tbl_categ_cours.id AND 
                tbl_categ_cours.id = tbl_subcateg_cours.idcategcours WHERE 
                tbl_cours.datastatus = ? AND 
                tbl_facilitateur.datastatus = ? AND 
                tbl_content.datastatus = ? LIMIT 4');
                try {
                    $req->execute([$this->statusData,$this->statusData,$this->statusData]);
                    $req = $req->fetchAll();
                    if(!empty($req)){
                        // var_export($req);
                        $tbCours = [];
                        for($i = 0; $i < count($req); ++$i){
                            $cours = new Cours($req[$i]['0'],$req[$i]['title'],$req[$i]['delai'],$req[$i]['prix'],$req[$i]['description'],
                            [
                                $req[$i]['nom'],
                                $req[$i]['prenom'],	
                                $req[$i]['photo']
                            ],$req[$i]['content'],$req[$i]['category'],$req[$i]['subcateg']);
                            array_push($tbCours,$cours);
                        }
                        return $tbCours;
                    }else return array();
                } catch (PDOException $e) {
                    return $e->getMessage();
                }
            }else return array();
            
        }
        public function onUpdate($cols=[],$values=[],$table,$clause){
            if(is_array($cols) && is_array($values) && (count($cols) === count($values))){
                $line = '';
                $tab = [];
                for($i = 0; $i < count($cols); $i++){
                    $val = (is_numeric($values[$i])) ? $values[$i] : "'".$values[$i]."'";
                    array_push($tab,$cols[$i]."=".$val);
                }
                $line = implode(',',$tab);
                // var_dump($line);
                $re = $this->onConn()->prepare("UPDATE $table SET $line $clause");
                try {
                    $re->execute();
                    return 200;
                } catch (PDOException $e) {
                    // $exc = new LogNotification([Date('d/m/Y, H:i:s')],["UPDATE_ ON $table"],['Failed'],[$e->getMessage()]);
                    // $this->errorWritter($exc,2);
                    var_dump($e->getMessage());
                    return 503;
                }
            }return 500;
        }
        public function onCatchingSomeCLN($cols = [], $vls = [], $clause, $tbl){
            $tb = [];
            $string = '';
            if(is_array($cols) && is_array($vls) && (count($vls) === count($cols))){
                for($i = 0; $i < count($cols); $i++){
                    $vl = (is_numeric($vls[$i]) ? $vls[$i] : "'".$vls[$i]."'");
                    $string .= $cols[$i]."=".$vl." AND ";
                    // $string .= $string;
                }
                $string = $string." datastatus = $this->statusData";
                $req = $this->onConn()->prepare("SELECT * FROM $tbl WHERE $string $clause");
                try {
                    $req->execute();
                    $req = $req->fetchAll();
                    if(!empty($req)){
                        return 200;
                    }else return 403;
                } catch (PDOException $e) {
                    var_dump($e->getMessage());
                    return 500;
                }
            }else return 500;
        }
        public function getCoursByID($idx){
            $idx = (int) $idx;
            $cnx = $this->onConn();
            if($cnx !== null){
                $req = $cnx->prepare('SELECT * FROM 
                tbl_cours JOIN 
                tbl_facilitateur JOIN 
                tbl_content JOIN 
                tbl_subcateg_cours JOIN 
                tbl_categ_cours ON 
                tbl_cours.idFacilitateur = tbl_facilitateur.id AND 
                tbl_cours.idContent = tbl_content.id AND 
                tbl_cours.idCateg = tbl_categ_cours.id AND 
                tbl_categ_cours.id = tbl_subcateg_cours.idcategcours WHERE 
                tbl_cours.datastatus = ? AND 
                tbl_facilitateur.datastatus = ? AND 
                tbl_content.datastatus = ? AND
                tbl_cours.id = ?');
                try {
                    $req->execute([$this->statusData,$this->statusData,$this->statusData,$idx]);
                    $req = $req->fetch();
                    if(!empty($req)){
                        $tbCours = [];
                        // for($i = 0; $i < count($req); ++$i){
                            $cours = new Cours($req['id'],$req['title'],$req['delai'],$req['prix'],$req['description'],
                            [
                                $req['nom'],
                                $req['prenom'],	
                                $req['photo']
                            ],$req['content'],$req['category'],$req['subcateg']);
                            array_push($tbCours,$cours);
                        // }
                        return $tbCours;
                    }else return array();
                } catch (PDOException $e) {
                    return $e->getMessage();
                }
            }else return array();
        }
        private function addFiveExtraColumn(){
            $conn = $this->onConn();
            $req = $conn->prepare('SHOW TABLES');  
            try {
                $req->execute();
                $req = $req->fetchAll();
                if(count($req) > 0){
                    foreach ($req as $key => $table) {
                        $this->verifyAndWriteExtraColumn($conn, $table[0]);
                    }
                }
            } catch (PDOException $e){
                // $exc = new LogNotification([Date('d/m/Y, H:i:s')],["Add Missing columns"],['Failed'],[$e->getMessage()]);
                // $this->errorWritter($exc,2);
            } 
        }
        private function verifyAndWriteExtraColumn($conn,$table){
            $tabExtraColumn = array('createby', 'modifiedby', 'deletedby', 'createdon', 'datastatus');
            $tabColumn = $conn->prepare("SHOW COLUMNS FROM $table");
            $fictiveTable = [];

            try {
                $tabColumn->execute();
                $tabColumn = $tabColumn->fetchAll();
                $lastColumn = end($tabColumn);
                $lastColumn = $lastColumn[0];

                for($i = 0; $i < count($tabColumn); $i++){
                    array_push($fictiveTable, $tabColumn[$i]['Field']);
                }
                foreach ($tabExtraColumn as $key => $column) {
                    if(!(in_array($column, $fictiveTable, true))){
                        $re = $conn->prepare("ALTER TABLE `$table` ADD `$column` VARCHAR(60) NOT NULL AFTER `$lastColumn`");
                        try {
                            $re->execute();
                            $lastColumn = $column;
                        } catch (PDOException $e) {
                            // $exc = new LogNotification([Date('d/m/Y, H:i:s')],["Add Missing columns"],['Failed'],[$e->getMessage()]);
                            // $this->errorWritter($exc,2);
                        }
                    }
                }

            } catch (PDOException $e) {
                // $exc = new LogNotification([Date('d/m/Y, H:i:s')],["Connexion"],['Failed'],[$e->getMessage()]);
                // $this->errorWritter($exc,2);
            }
        }
        private function retrievesColumn($table, $alias){
            $columnname = [];
            $tabColumn = $this->onConn()->prepare("SHOW COLUMNS FROM $table");
            try {
                $tabColumn->execute();
                $tabColumn = $tabColumn->fetchAll();
                for($i = 0; $i < count($tabColumn); $i++){
                    array_push($columnname, $tabColumn[$i]['Field']);
                }
                return implode(",", $columnname);
            } catch (PDOException $e) {
                // $exc = new LogNotification([Date('d/m/Y, H:i:s')],["SHOW COLUMNS FROM $table"],['Failed'],[$e->getMessage()]);
                // $this->errorWritter($exc,2);
                return false;
                // die($e->getMessage());
            }
        }
        public function sendMail($im){
            $from_ = 'Reitec Info | Partenaire';
            $message = $im['message'];
            $from = $im['from'];
            $subject = $im['subject'];
            $headers  = "MIME-Version: 1.0 \n";
            $headers .= "Content-type: text/html; charset=iso-8859-1 \n";
            $headers .= "From: $from_ <$from>\r\n".
                        "MIME-Version: 1.0" . "\r\n" .
                        "Content-type: text/html; charset=UTF-8" . "\r\n";
            $headers .= "Disposition-Notification-To: $from  \n";
            $message = wordwrap($message, 70, "\r\n");
            $to = $im['email'];
            // Message de Priorité haute
            // -------------------------
            $headers .= "X-Priority: 1  \n";
            $headers .= "X-MSMail-Priority: High \n";
              // 'X-Mailer: PHP/' . phpversion();
            if(@mail($to,$subject,$message,$headers)) return true;
            else return false; 
        }
        public function onCatchLastElement($tbl,$clause,$sortby){
            $req = $this->onConn()->prepare("SELECT MAX($sortby) FROM $tbl");
            // return $sortby;
            try {
                $req->execute();
                $req = $req->fetchAll();
                $lstIdx = (int) $req[0][0];
                return ($lstIdx);
            } catch (PDOException $e) {
                // $exc = new LogNotification([Date('d/m/Y, H:i:s')],["GETTING LAST ELEM IN $tbl"],['Failed'],[$e->getMessage()]);
                // $this->errorWritter($exc,2);
                return 0;
            }
        }
        public function onCatchingVLS($output,$tbl,$cls){
            $req = $this->onConn()->prepare("SELECT $output FROM $tbl $cls ");
            try {
                $req->execute();
                $req = $req->fetchAll();
                if(!empty($req)) return $req;
                else return 0;
            } catch (PDOException $e) {
                //throw $th;
                var_dump($e->getMessage());
                return 'undefined';
            }
        }
        public function onCatchVLCOLLN($id,$output,$tbl,$cls){
            $req = $this->onConn()->prepare("SELECT $output FROM $tbl WHERE id = $id $cls");
            try {
                $req->execute();
                $req = $req->fetchAll();
                if(!empty($req)) return $req;
                else return 0;
            } catch (PDOException $e) {
                //throw $th;
                return 'undefined';
            }
        }
        public function onAdd($tbValues = [], $clause, $accessLevel, $indentified, $table){
            if(is_array($tbValues) && (count($tbValues) > 0)){
                $cls = $this->retrievesColumn($table, false);
                $tabvalues = [];
                if(strlen($cls) > 0){
                    $cls = substr($cls,strpos($cls,',',0)+1);
                    if($cls){
                        array_push($tbValues, $indentified);
                        array_push($tbValues, 0);
                        array_push($tbValues, 0);
                        array_push($tbValues, Date('d/m/Y, H:i:s'));
                        array_push($tbValues, 1);
                        foreach ($tbValues as $key => $value) {$val = ("'".$value."'");array_push($tabvalues, $val);}
                        try {
                            $vls = implode(',',$tabvalues);
                            $req = $this->onConn()->prepare("INSERT INTO $table ($cls) VALUES ($vls)");
                            $req->execute();
                        } catch (PDOException $e) {
                            // $exc = new LogNotification([Date('d/m/Y, H:i:s')],["CRUD ERROR ON ADDING : $table"],['Failed'],[$e->getMessage()]);
                            // $this->errorWritter($exc,2);
                            // var_dump($cls);
                            // var_dump($vls);
                            // var_dump($e->getMessage());
                            return 503; // violation constraint
                        }
                        return 200;
                    }return 500;
                }return 500;
            }return 500;
        }
        public function onConnexion($idents, $clause, $tbl){
            if(is_array($idents) && ($this->onConn()) !== null){
                $req = $this->onConn()->prepare("SELECT * FROM $tbl WHERE email = ? AND pwd = ? AND datastatus = $this->statusData");
                try {
                    $req->execute($idents);
                    $req = $req->fetch();
                    if(!empty($req)){
                        // setcookie("tkn",md5('dav.me'),time()+3600,'/');
                        $_SESSION['ident-me'] = new Student($req['id'],
                                                            $req['nom'], 
                                                            $req['postnom'], 
                                                            $req['email'], 
                                                            $req['telephone'], 
                                                            $req['genre'],
                                                            $req['prenom']);
                        $_SESSION['reitec-std-session'] = md5($req['email']);
                        return 200;
                    }else{
                        return 403;
                    }
                } catch (PDOException $e) {
                    var_dump($e->getMessage());
                    return 500;
                }
            }else return 500;
        }
        public function onConn(){
            try {
                $db = new PDO("mysql:host=$this->server;dbname=$this->dbName", "$this->userName", "$this->password");
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $db;
            } catch (PDOException $e) {
                return null;
            //    die($e->getMessage());
            }
        }
    }
?>