<?php 

    class Product {
        public $id;
        public $name;
        public $categ;
        public $price;
        public $barcode;

        public function __construct($id, $name, $categ, $price, $barcode){
            $this->id = $id;
            $this->name = $name;
            $this->categ = $categ;
            $this->price = $price;
            $this->barcode = $barcode;
        }
    }

?>