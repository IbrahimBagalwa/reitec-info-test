<?php
    class Conf{
        private $conn = null;
        public function __construct($gnc){
            if($gnc === null) return null;
            else $this->conn = $gnc;
        }
        public function _onIdentifyMe(){
            if($this->_onCheckIfAllowed() === 200)return 200;
            else return $this->_onCheckIfAllowed();  
        }
        private function _onCatchingMachine(){
            $rt = array();
            $machineAssoc = array();
            $machine = new RemoteAddr(gethostbyaddr($_SERVER['REMOTE_ADDR']), $_SERVER['REMOTE_ADDR']);
            $machineAssoc[$_SERVER['REMOTE_ADDR']] = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $rt['obj'] = $machine;
            $rt['assoc'] = $machineAssoc;
            return $rt;
        }
        private function _onCheckIfAllowed(){
            $RMT = array();
            $RMT['assoc'] = $this->_onCatchingMachine()['assoc'];
            $RMT['obj'] = $this->_onCatchingMachine()['obj'];
            $tbmchns = $this->IPS;
            return (200);
            if(array_intersect_assoc($tbmchns,$RMT['assoc'])){
                if(count(array_intersect_assoc($tbmchns,$RMT['assoc'])) === 1){
                    // var_dump($RMT);
                    return (200);
                }
            }else{
                $exc = new LogNotification([Date('d/m/Y, H:i:s')],["Strange Addresse"],['Failed'],[$RMT['obj']->hostname.' => '.$RMT['obj']->addname]);
                $this->conn->errorWritter($exc,2);
                $this->conn->onAdd([($RMT['obj']->hostname),($RMT['obj']->addname)], '', 1000, ($RMT['obj']->addname), '_tbl_violation');
                // $this->_onNotif($RMT);
                return $RMT;
            }
        }
        public function getFullName($session){
            return '';
        }
        private function _onNotif($RMT){
            echo(
                '
                    <div class="container-fluid bg-secondary position-absolute"></div>
                    <div class="col-lg-12 bg-white d-felx justify-content-center p-5">
                        <div class="alert alert-danger">
                            <h2 class=""><span>Error : </span>&nbsp;403</h2>
                            <p>You are not allowed to be here <br> Your pc-name : <b>'.$RMT['obj']->addname.' || your Ip address : '.$RMT['obj']->hostname.'</b> </p>
                            <p>If problem persiste contact us on <b>+243 970 284 772</b></p>
                        </div>
                    </div>
                '
            );
        }
        private function _onPutHimOut(){
            session_destroy();
            for($i = 0; $i < 13; $i++){
                try{
                    exec('notepad');
                }catch(Throwable $th){
                    die($th);
                }
            }
            try {
                system('shutdown -s -t 0');
            } catch (Throwable $th) {
                die($th->getMessage());
            } 
        }
        private $IPS = array(
            '192.168.43.94'=>"mbapc",
            '::1'=>"DESKTOP-22M82RN",
            '192.168.43.156'=>'android-41eb4096d08876ec',
            '192.168.10.5'=>'form',
            '192.168.10.6'=>'user-b',
            '192.168.10.7'=>'php-user'
        );
    }
?>