<?php
    include 'konekcija.php';
    include 'igriceClass.php';
    include 'konzolaClass.php';
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
    <?php

    $niz = [];
    $rez = $conn->query("select * from igrice i join konzole k on i.konzolaID=k.konzolaID");

    while($red= $rez->fetch_assoc()){
      $konzola = new Konzola($red['konzolaID'],$red['NazivKonzole']);
      $igrica = new Igrica($red['igricaID'],$red['nazivIgrice'],$red['Cena'], $konzola);
      array_push($niz,$igrica);
    }
    ?>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Naziv</th>
          <th>Cena</th>
          <th>Konzola</th>
          <th>Obrisi</th>
          <th>Izmeni</th>
        </tr>
      </thead>
      <tbody>
    <?php
      foreach($niz as $vrednost){
        ?>
            <tr>
              <td><?php echo $vrednost->nazivIgrice ?>  </td>
              <td><?php echo $vrednost->Cena ?>  </td>
              <td><?php echo $vrednost->konzola->nazivKonzole ?></td>
              <td><a class="btn btn-danger" href="obrisi.php?id=<?php echo $vrednost->igricaID ?>">Obrisi</a></td>
              <td><a class="btn btn-info" href="izmeni.php?id=<?php echo $vrednost->igricaID ?>">Izmeni</a></td>
            </tr>
        <?php
      }
    ?>
      </tbody>
    </table>
    
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

  </body>
</html>
