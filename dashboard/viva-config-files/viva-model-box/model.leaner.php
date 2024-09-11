<?php 
class Learner extends Student{
    // public $id;
    // public $nom;
    // public $email;
    // public $phone;
    public $key;
    public $emplacement;
    public $status,$type;

    public function __construct($id,$nom,$prenom,$email,$telephone,$genre,$NN,$status,$type,$key,$emplacement){
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->genre = $genre;
        $this->NN = $NN;
        $this->key = $key;
        $this->emplacement = $emplacement;
        $this->status = $status;
        $this->type = $type;
    }
}
?>