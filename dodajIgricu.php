<?php
 include 'konekcija.php';
 include 'igriceClass.php';


 $porukaUspesnosti = "";

 if(isset($_POST['sacuvajIgricu'])){
   $nazivIgrice = trim($_POST['naziv']);
   $Cena = trim($_POST['cena']);
   $konzola = trim($_POST['konzola']);

   $igrica = new Igrica(-1,$nazivIgrice,$Cena,$konzola);
   if($igrica->save($conn)){
      $porukaUspesnosti = "Uspesno ste uneli novu igricu";
   }else{
     $porukaUspesnosti = "Nazalost, doslo je od greske, pokusajte ponovo !!! ";
   }
 }

  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Igrice</title>

    <link href="css/bootstrap.css" rel="stylesheet">


    <link href="css/main.css" rel="stylesheet">


  </head>

  <body>
    <div id="header"></div>

    <div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 centered">
					<img src="img/pocetna1.jpg" alt="pocetna" class="img img-circle">
                    <h1>Dodaj novu igricu</h1>
				</div>
			</div>
	    </div>
    </div>



	<div class="container pt">
    <form action="" method="POST">
      <label for="naziv">Naziv</label>
      <input type="text" name="naziv" class="form-control" placehodler="Unesite igricu" required>
      <label for="cena">Cena</label>
      <input type="number" name="cena" class="form-control" placehodler="Unesite cenu" required>
      <label for="konzola">Konzola</label>
      <select id="konzola" name="konzola" class="form-control">
        <?php
            $rez = $conn->query("SELECT * from konzole");
            while($red = $rez->fetch_assoc()){
              ?>
            <option value="<?php echo $red['konzolaID'] ?>"> <?php echo $red['NazivKonzole'] ?></option>
          <?php  }
              ?>
      </select>
      <label for="sacuvajIgricu"></label>
      <input type="submit" name="sacuvajIgricu" class="form-control btn-primary" value="Sacuvaj Igricu">
  </form>
  <h3><?php echo $porukaUspesnosti ?> </h3>
	</div>

    <div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<h4>Adresa</h4>
					<p>
						Jove Ilica 154,<br/>
						011 3950800, <br/>
						Beograd, Srbija.
					</p>
				</div>

				<div class="col-lg-4">
					<h4>Društvene mreže</h4>
					<p>
						<a href="https://www.facebook.com/fon.bg.ac.rs">Facebook</a><br/>
						<a href="https://twitter.com/fonbg">Twitter</a><br/>
						<a href="http://plus.google.com/106390371419524147048/posts">Google+</a>
					</p>
				</div>

				<div class="col-lg-4">
                    <h4>Aktuelno</h4>
                    <p>
                        <a href="https://www.playstation.com/sr-rs/ps5/">PlayStation 5</a><br/>
                        <a href="https://www.xbox.com/en-US/consoles/xbox-series-x">Xbox Series X</a><br/>
                        <a href="https://www.cyberpunk.net/rs/en/">Cyberpunk 2077</a>
                    </p>
				</div>

			</div>

		</div>

  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
    function header(){
      $.ajax({
        url: "header.php",
        success: function(html){
          $("#header").html(html);
        }
      })
    }
    </script>
    <script>
    header();
    </script>
  </body>
</html>
