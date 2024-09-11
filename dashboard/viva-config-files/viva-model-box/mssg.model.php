<?php 
    class Message{
        public $id;
        public $nom;
        public $email;
        public $sujet;
        public $message;
        public $date;

        public function __construct($id, $nom, $email, $sujet, $message, $date){
            $this->id = $id;
            $this->email = $email;
            $this->nom = $nom;
            $this->sujet = $sujet;
            $this->message = $message;
            $this->date = $date;
        }
    }
?>