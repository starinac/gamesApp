<?php
 include 'konekcija.php';
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prodaja igrica</title>

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
					<img src="img/pocetna2.jpg" alt="pocetna" class="img img-circle">
                    <h1>Najbolje igrice za vas</h1>
                    <p>Ovo su neke od igrica koje mi preporučujemo</p>
				</div>
			</div>
	    </div>
    </div>

    <div class="container pt">
    <label for="pretraga">Pretrazi igrice za odabranu konzolu</label>
    <select id="pretraga" onchange="pretraga()" class="form-control">
      <?php
          $rez = $conn->query("SELECT * from konzole");
          while($red = $rez->fetch_assoc()){
            ?>
          <option value="<?php echo $red['konzolaID'] ?>"> <?php echo $red['NazivKonzole'] ?></option>
        <?php   }
            ?>
    </select>
    <div id="podaciPretraga"></div>
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
    </div>
    
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    function pretraga(){
      $.ajax({
        url: "pretraga.php",
        data: {konzolaID: $("#pretraga").val()},
        success: function(html){
          $("#podaciPretraga").html(html);
        }
      })
    }
    </script>
    <script>
        pretraga();
    </script>
</body>
</html>