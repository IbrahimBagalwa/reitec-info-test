<?php 

    class Output {
        public $title;
        public $time;
        public $body;
        public $kind;

        public function __construct($title, $time, $bode, $kind){
            $this->title = $title;
            $this->body = $body;
            $this->kind = $kind;
            $this->time = $time;
        }
    }

    class RemoteAddr{
        public $hostname;
        public $addname;

        public function __construct($hostname, $addname){
            $this->hostname = $hostname;
            $this->addname = $addname;
        }
    }
?>