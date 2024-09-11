<?php
class Categ{
    public $id;
    public $categ;
    public $extra;

    public function __construct($id,$categ,$extra){
        $this->id = $id;
        $this->categ = $categ;
        $this->extra = $extra;
    }
}
?>