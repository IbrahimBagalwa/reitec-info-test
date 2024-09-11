<?php 

    class Pos{

        public $name_1;
        public $name_2;
        public $email;
        public $img;
        public $access;
        public $idnumber;

        public function __construct($name_1, $name_2, $email, $access,$idnumber, $img){
            $this->name_1 = $name_1;
            $this->name_2 = $name_2;
            $this->img = $img;
            $this->email = $email;
            $this->idnumber = $idnumber;
            $this->access = $access;
        }
    }

?>