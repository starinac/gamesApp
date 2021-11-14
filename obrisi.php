<?php
include 'konekcija.php';
include 'igriceClass.php';

    $porukaUspesnosti = "";
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    $igrica = new Igrica($id,null,null,null);
    if($igrica->delete($conn,$id)){
      header("Location:upravljaj.php");
    }else{
      echo "Nazalost, doslo je do greske, pokusajte ponovo";
    }

 ?>
