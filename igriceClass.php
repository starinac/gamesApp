<?php

class Igrica{
  public $igricaID;
  public $nazivIgrice;
  public $Cena;
  public $konzola;

  function __construct($igricaID,$nazivIgrice,$Cena,$konzola) {
        $this->igricaID = $igricaID;
        $this->nazivIgrice = $nazivIgrice;
        $this->Cena = $Cena;
        $this->konzola = $konzola;
    }


    public function save($conn){
        if($conn->query("INSERT INTO igrice(nazivIgrice,Cena,konzolaID) VALUES ('$this->nazivIgrice',$this->Cena,$this->konzola)")){
          return true;
        }else{
          return false;
        }
    }

    public function change($conn){
        if($conn->query("UPDATE igrice SET nazivIgrice='$this->nazivIgrice',Cena=$this->Cena,konzolaID=$this->konzola where igricaID=$this->igricaID")){
          return true;
        }else{
          return false;
        }
    }
    public function delete($conn,$id){
        if($conn->query("DELETE FROM igrice where igricaID=$id")){
          return true;
        }else{
          return false;
        }
    }
}

 ?>