<?php
 include 'konekcija.php';
 include 'igriceClass.php';
 include 'konzolaClass.php';

 $porukaUspesnosti = "";
 $id = mysqli_real_escape_string($conn,$_GET['id']);
 $rez = $conn->query("select * from igrice i join konzole k on i.konzolaID=k.konzolaID where i.igricaID=$id");

 while($red= $rez->fetch_assoc()){
   $konzola = new Konzola($red['konzolaID'],$red['NazivKonzole']);
   $igricaIzmena = new Igrica($red['igricaID'],$red['nazivIgrice'],$red['Cena'],$konzola);
 }

 if(isset($_POST['izmeniIgricu'])){
   $naziv = trim($_POST['naziv']);
   $cena = trim($_POST['cena']);
   $konzola = trim($_POST['konzola']);

   $igrica = new Igrica($igricaIzmena->igricaID,$naziv,$cena,$konzola);
   if($igrica->change($conn)){
      $porukaUspesnosti = "Uspesno ste izmenili igricu";
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
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Igrice</title>

    <link href="css/bootstrap.css" rel="stylesheet">


    <link href="css/main.css" rel="stylesheet">

  </head>

  <body>
    <div class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Igrice</a>
            </div>
            <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Pocetna</a></li>
                <li><a href="dodajIgricu.php">Dodaj igricu</a></li>
                <li><a href="upravljaj.php">Upravljaj igricama</a></li>
            </ul>
            </div>
        </div>
    </div>

    <div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 centered">
					<img src="img/pocetna3.jpg" alt="pocetna" class="img img-circle">
                    <h1>Upravljaj igricama</h1>
				</div>
			</div>
	    </div>
    </div>



	<div class="container pt">
    <form action="" method="POST">
      <label for="naziv">Naziv</label>
      <input type="text" name="naziv" class="form-control" value="<?php echo $igricaIzmena->nazivIgrice; ?>" required>
      <label for="cena">Cena</label>
      <input type="number" name="cena" class="form-control" value="<?php echo $igricaIzmena->Cena; ?>" required>
      <label for="konzola">Konzola</label>
      <select id="konzola" name="konzola" class="form-control">
          <option value="<?php echo $igricaIzmena->konzola->konzolaID ?>"> <?php echo $igricaIzmena->konzola->nazivKonzole ?></option>
        <?php
            $rez = $conn->query("SELECT * from konzole");
            while($red = $rez->fetch_assoc()){
              ?>
            <?php if ($red['konzolaID'] != $igricaIzmena->konzola->konzolaID) { ?><option value="<?php echo $red['konzolaID'] ?>"> <?php echo $red['NazivKonzole'] ?></option>
            <?php   }
              ?>
              <?php   }
              ?>
      </select>
      <label for="izmeniIgricu"></label>
      <input type="submit" name="izmeniIgricu" class="form-control btn-primary" value="Izmeni Igricu">
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

  </body>
</html>
