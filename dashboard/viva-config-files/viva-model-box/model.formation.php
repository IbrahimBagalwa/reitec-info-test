<?php 
    class Formation{
        public $id;
        public $titre;
        public $date_s;
        public $date_e;
        public $prix;
        public $facilitateur = [];
        public $description;
        public $content;
        public $categ;
        public $subCateg;

        public function __construct($id,$titre,$date_s,$date_e,$prix,$description,$facilitateur=[],$content,$categ,$subCateg){
            $this->id = $id;
            $this->facilitateur = $facilitateur;
            $this->titre = $titre;
            $this->date_s = $date_s;
            $this->date_e = $date_e;
            $this->prix = $prix;
            $this->description = $description;
            $this->content = $content;
            $this->categ = $categ;
            $this->subCateg = $subCateg;
        }

    }
?>