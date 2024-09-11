<?php 
    class GeneConnexion {
        
        private $_dbName = '_db_reitec_info'; //name of database reite1501280
        private $_userName = 'root'; // user name to acces db zaqxswcde1234567890
        private $_passWord = ''; // user password to access db
        private $datastatus = 'datastatus';
        public function __construct(){
        }
        public function onRetrieveData($tbl, $clause){
            $re = $this->onConn()->prepare("SELECT * FROM $tbl $clause");
            // var_dump($re);
            // return array();
            try {
                $re->execute();
                $re = $re->fetchAll();
                if(!empty($re)){
                    if(count($re) > 0){
                        return $re;
                    }else return array();
                }else return array();
            } catch (PDOException $e) {
                $exc = new LogNotification([Date('d/m/Y, H:i:s')],["SHOW COLUMNS FROM $tbl"],['Failed'],[$e->getMessage()]);
                $this->errorWritter($exc,2);
                return array();
            }
        }
        public function tryConn(){
            if($this->onConn() !== null){
                $this->addFiveExtraColumn();
                return true;
            }else return null;
        }
        // crud start
        public function sendMail($im){
            $from_ = 'Reitec INFO';
            $message = $im['message'];
            $from = $im['from'];
            $subject = $im['subject'];
            $headers  = "MIME-Version: 1.0 \n";
            $headers .= "Content-type: text/html; charset=iso-8859-1 \n";
            $headers .= "From: $from_ <$from>\r\n".
                        "MIME-Version: 1.0" . "\r\n" .
                        "Content-type: text/html; charset=UTF-8" . "\r\n";
            $headers .= "Disposition-Notification-To: $from  \n";
            $message = wordwrap($message, 85, "\r\n");
            $to = $im['email'];
            // Message de Priorité haute
            // -------------------------
            $headers .= "X-Priority: 1  \n";
            $headers .= "X-MSMail-Priority: High \n";
              // 'X-Mailer: PHP/' . phpversion();
            if(@mail($to,$subject,$message,$headers)) return true;
            else return false; 
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
                $exc = new LogNotification([Date('d/m/Y, H:i:s')],["SHOW COLUMNS FROM $table"],['Failed'],[$e->getMessage()]);
                $this->errorWritter($exc,2);
                return false;
                // die($e->getMessage());
            }
        }
        public function onCatchLastElement($tbl,$clause,$sortby){
            $req = $this->onConn()->prepare("SELECT MAX($sortby) FROM $tbl");
            // return $sortby;
            try {
                $req->execute();
                $req = $req->fetchAll();
                $lstIdx = (int) $req[0][0];
                return ($lstIdx + 1);
            } catch (PDOException $e) {
                $exc = new LogNotification([Date('d/m/Y, H:i:s')],["GETTING LAST ELEM IN $tbl"],['Failed'],[$e->getMessage()]);
                $this->errorWritter($exc,2);
                return 0;
            }
        }
        public function onCountKLK($tbl, $clause){
            $req = $this->onConn()->prepare("SELECT * FROM $tbl $clause");
            try {
                $req->execute();
                $req = $req->fetchAll();
                return (!empty($req) ? count($req) : 0);
            } catch (PDOException $e) {
                $exc = new LogNotification([Date('d/m/Y, H:i:s')],["SHOW POS"],['Failed'],[$e->getMessage()]);
                $this->errorWritter($exc,2);
                return 0;
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
        public function onGenRetrieve($idents,$output, $clause, $tbl){
            if(is_array($idents) && ($this->onConn()) !== null){
                $req = $this->onConn()->prepare("SELECT * FROM $tbl $clause");
                $opt = [];
                $tb = array();
                try {
                    $req->execute($idents);
                    $req = $req->fetchAll();
                    if(!empty($req)){
                        for($i = 0; $i < count($req); ++$i){
                            // $opt = array(iconv('UTF-8','ISO-8859-1//IGNORE', $req[$i]['id'])=>iconv('UTF-8','ISO-8859-1//IGNORE', $req[$i][$output]));
                            $opt = array(iconv('UTF-8','ISO-8859-1//IGNORE', $req[$i]['id'])=>utf8_encode($req[$i][$output]));
                            array_push($tb, $opt);
                        }
                        // echo(json_encode($tb));
                        return $tb;
                    }else{
                        return array();
                    }
                } catch (PDOException $e) {
                    $exc = new LogNotification([Date('d/m/Y, H:i:s')],["ERROR ON CONNECTION TO $table"],['Failed'],[$e->getMessage()]);
                    $this->errorWritter($exc,2);
                    return 500;
                }
            }else return 500;
        }
        public function onConnexion($idents, $clause, $tbl){
            if(is_array($idents) && ($this->onConn()) !== null){
                $req = $this->onConn()->prepare("SELECT * FROM $tbl WHERE email = ? AND pwd = ? AND datastatus = ?");
                try {
                    $req->execute($idents);
                    $req = $req->fetch();
                    if(!empty($req)){
                        setcookie("tkn",md5('dav.me'),time()+3600,'/');
                        $_SESSION['ident-me-'] = new Facilitateur($req['id'],$req['nom'], $req['prenom'], $req['telephone'], $req['email'], $req['accesslevel']);
                        $_SESSION['token'] = md5($req['email']);
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
                        foreach ($tbValues as $key => $value) {$val = ('"'.($value).'"');array_push($tabvalues, $val);}
                        try {
                            $vls = implode(',',$tabvalues);
                            $req = $this->onConn()->prepare("INSERT INTO $table ($cls) VALUES ($vls)");
                            $req->execute();
                        } catch (PDOException $e) {
                            $exc = new LogNotification([Date('d/m/Y, H:i:s')],["CRUD ERROR ON ADDING : $table"],['Failed'],[$e->getMessage()]);
                            $this->errorWritter($exc,2);
                            // var_dump($e->getMessage());
                            return 503; // violation constraint
                        }
                        return 200;
                    }return 500;
                }return 500;
            }return 500;
        }
        public function onSavingLot($idents, $clause,$identified, $tbl){
            $tbOfArticles = '_tbl_articles';
            $compteur = 0;
            if(json_decode($idents)){
                $dt = json_decode($idents,true);
                if(is_array($dt)){
                    $id_lot = $dt['lot'];
                    $addlot = $this->onAdd([$id_lot,$dt['provider'],$dt['filterPos']],$clause,false,$identified,$tbl);
                    switch ((int)$addlot) {
                        case 200:
                            foreach($dt['items'] as $item){
                                $additems = $this->onAdd([$item['name'],$item['code'],$item['price'],$id_lot,$item['qty']],$clause,false,$identified,$tbOfArticles);
                                if($additems === 200) $compteur++; 
                            }
                            if(count($dt['items']) === $compteur) return 200;
                            else return 502;
                        case 503:
                            return 503;
                        default:
                            return 500;
                        break;
                    }
                }else return 500;
            }else return 501;
        }
        public function onSendMail($im,$tbl,$clause){
            $im['from'] = !isset($im['from']) ? $im['from'] : 'info@reitecinfo.net';
            // var_export($im);
            if($this->sendMail($im)){
                if($this->onAdd([$im['name'],'formation@reitecinfo.net',$im['subject'],$im['message'],6363373,$im['idTo'],1111],$clause,19000,0,$tbl) === 200){
                    return 200;
                }else return 203;
            }else return 500;
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
                    $exc = new LogNotification([Date('d/m/Y, H:i:s')],["UPDATE_ ON $table"],['Failed'],[$e->getMessage()]);
                    $this->errorWritter($exc,2);
                    var_dump($e->getMessage());
                    return 503;
                }
            }return 500;
        }
        public function onRMV($table, $clause){
            $state = $this->datastatus;
            $re = $this->onConn()->prepare("UPDATE $table SET $state = ? $clause");
            try {
                $re->execute([0]);
                return true;
            } catch (PDOException $e) {
                $exc = new LogNotification([Date('d/m/Y, H:i:s')],["DELETE_ ON $table"],['Failed'],[$e->getMessage()]);
                $this->errorWritter($exc,2);
                return null;
            }
        }
        // end crud
        public function onVerifierAccessLevel($token){
        }
        public function listPOS(){
            // high level 19000
            $req = $this->onConn()->prepare('SELECT * FROM _tbl_pos WHERE accesslevel != ?');
            try {
               $req->execute([19000]);
               $req = $req->fetchAll();
                if(!empty($req)){
                    $t = [];
                    for($i = 0; $i < count($req); $i++){
                        $pos = new Pos($req[$i]['username_1'], $req[$i]['username_2'], $req[$i]['email'], $req[$i]['accesslevel'],$req[$i]['identnumber'], $req[$i]['img']);
                        array_push($t, $pos);
                    }
                    return $t;
                }return array();
            } catch (PDOException $e) {
                $exc = new LogNotification([Date('d/m/Y, H:i:s')],["SHOW POS"],['Failed'],[$e->getMessage()]);
                $this->errorWritter($exc,2);
                return null;
            }
        }
        private function onConn(){
            try {
                $conn = new PDO("mysql:host=localhost;dbname=$this->_dbName", "$this->_userName", "$this->_passWord");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            } catch (PDOException $e) {
                $exc = new LogNotification([Date('d/m/Y, H:i:s')],["Connexion to DB"],['Failed'],[$e->getMessage()]);
                $this->errorWritter($exc,2);
                // die($e->getMessage());
                return null;
            }
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
                $exc = new LogNotification([Date('d/m/Y, H:i:s')],["Add Missing columns"],['Failed'],[$e->getMessage()]);
                $this->errorWritter($exc,2);
            } 
        }
        public function errorWritter($array, $to){
            // ./viva-config-files/viva-assoc-file/
            $file = ($to === 1) ? 'ini.initialize.ini' : 'ini.file.ini';
            $res = array();
            foreach($array as $key => $val)
            {
                if(is_array($val))
                {
                    $res[] = "[$key]";
                    foreach($val as $skey => $sval) $res[] = (is_numeric($sval) ? $sval : '"'.$sval.'"');
                }
                else $res[] = "$key = ".(is_numeric($val) ? $val : '"'.$val.'"');
                
            }
            $res[] = '-------------------------------------------------------------'.PHP_EOL;
            $this->safefilerewrite(implode("\r\n", $res),$file);
        }
        private function safefilerewrite($dataToSave, $fileName){
            if ($fp = fopen($fileName, 'a++'))
            {
                $startTime = microtime(TRUE);
                do
                {            
                    $canWrite = flock($fp, LOCK_EX);
                    // If lock not obtained sleep for 0 - 100 milliseconds, to avoid collision and CPU load
                    if(!$canWrite) usleep(round(rand(0, 100)*1000));
                } while ((!$canWrite)and((microtime(TRUE)-$startTime) < 5));
                //file was locked so now we can store information
                if ($canWrite)
                {          
                    // fwrite($fp, $dataToSave);
                    flock($fp, LOCK_UN);
                    file_put_contents($fileName, $dataToSave.PHP_EOL,FILE_APPEND);
                }
                fclose($fp);
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
                        $re = ($column === 'createdon') 
                        ? $conn->prepare("ALTER TABLE `$table` ADD `$column` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `$lastColumn`")
                        : $conn->prepare("ALTER TABLE `$table` ADD `$column` INT(11) NOT NULL DEFAULT '1' AFTER `$lastColumn`");
                        try {
                            $re->execute();
                            $lastColumn = $column;
                        } catch (PDOException $e) {
                            $exc = new LogNotification([Date('d/m/Y, H:i:s')],["Add Missing columns"],['Failed'],[$e->getMessage()]);
                            $this->errorWritter($exc,2);
                        }
                    }
                }

            } catch (PDOException $e) {
                $exc = new LogNotification([Date('d/m/Y, H:i:s')],["Connexion"],['Failed'],[$e->getMessage()]);
                $this->errorWritter($exc,2);
            }
        }
    }
?>