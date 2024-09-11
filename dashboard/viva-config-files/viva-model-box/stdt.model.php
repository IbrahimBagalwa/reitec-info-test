<?php 
    class Student {

        public $id;
        public $nom;
        public $prenom;
        public $email;
        public $telephone;
        public $genre;
        public $NN;

        public function __construct($id,$nom,$prenom,$email,$telephone,$genre,$NN){

            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->email = $email;
            $this->telephone = $telephone;
            $this->genre = $genre;
            $this->NN = $NN;
        }
    }
?>