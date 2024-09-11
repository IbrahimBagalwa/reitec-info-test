<?php 
    class Cours{
        public $id;
        public $titre;
        public $delai;
        public $prix;
        public $facilitateur = [];
        public $description;
        public $content;
        public $categ;
        public $subCateg;

        public function __construct($id,$titre,$delai,$prix,$description,$facilitateur=[],$content,$categ,$subCateg){
            $this->id = $id;
            $this->facilitateur = $facilitateur;
            $this->titre = $titre;
            $this->delai = $delai;
            $this->prix = $prix;
            $this->description = $description;
            $this->content = $content;
            $this->categ = $categ;
            $this->subCateg = $subCateg;
        }

    }
?>