<?php 
    class Facilitateur{
        public $id;
        public $nom;
        public $postnom;
        // public $cours = [];
        public $tele;
        public $email;
        public $accsslevel;
        public function __construct($id,$nom,$postnom,$tele,$email,$accsslevel){
            $this->id = $id;
            $this->nom = $nom;
            $this->postnom = $postnom;
            // $this->cours = $cours;
            $this->tele = $tele;
            $this->email = $email;
            $this->accsslevel = $accsslevel;
        }
    }
?>