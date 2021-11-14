<?php
class Konzola{
  public $konzolaID;
  public $nazivKonzole;

  function __construct($konzolaID,$nazivKonzole) {
        $this->konzolaID = $konzolaID;
        $this->nazivKonzole = $nazivKonzole;
    }


    public function save($conn){
        if($conn->query("INSERT INTO konzole(NazivKonzole) VALUES ('$this->nazivKonzole')")){
          return true;
        }else{
          return false;
        }
    }
}

 ?>
