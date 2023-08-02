<?php
$slike=['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg'];
// funkcija za nasumicno generisanje slike
// function randSlika($slike)
// {
//   $randIndex = array_rand($slike);
//   return $slike[$randIndex];
// }

//php kod za nasumicno generisanje array-a od 3 vrednosti/indexa iz arraya $slike koje su dodeljene promenjivoj da bi se izbeglo ponavljanje nasumicnih slika
$indexSlike = array_slice(array_rand($slike, 3), 0, 3);
$s1 = $slike[$indexSlike[0]];
$s2 = $slike[$indexSlike[1]];
$s3 = $slike[$indexSlike[2]];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Citati</title>
  <!-- Bootsrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <!-- css style link -->
  <link rel="stylesheet" href="style.css">
  <!-- Google font link -->
  <!-- font-family: 'Libre Baskerville', serif; -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
  <!-- Font awesome ikonice -->
  <script src="https://kit.fontawesome.com/13d2bd3102.js" crossorigin="anonymous"></script>
</head>
<body>
  <!-- Zaglavlje -->
  <header class="container-fluid">
    <!-- navigacija -->
    <div class="row">
      <div class="navbar navbar-expand-lg navbar-dark">
        <a href="index.php" class="logo-nav">CITATI</a>
        <a href="https://itbootcamp.rs/" class="logo-nav it-logo"><span class="it-span">IT</span>Bootcamp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
          <span>
          <i class="fa-solid fa-bars fa-lg" style="color: #eeeeee;"></i>
          </span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navmenu">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="index.php?link=posao#citati" class="nav-link">Posao</a>
            </li>
            <li class="nav-item">
              <a href="index.php?link=zdravlje#citati" class="nav-link">Zdravlje</a>
            </li>
            <li class="nav-item">
              <a href="index.php?link=ljubav#citati" class="nav-link">Ljubav</a>
            </li>
            <li class="nav-item">
              <a href="index.php?link=motivacija#citati" class="nav-link">Motivacija</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <section>
  <div class="row">
    <!-- Carousel -->
    <div id="carousel-slike" class="carousel slide" data-ride="carousel">
      <!-- carousel indikatori -->
      <ol class="carousel-indicators">
        <li data-bs-target="#carousel-slike" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carousel-slike" data-bs-slide-to="1"></li>
        <li data-bs-target="#carousel-slike" data-bs-slide-to="2"></li>
      </ol>
        <!-- carousel slajdovi -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <?php
            echo "<img src='slike/" . $s1 . "' alt = 'slika' class='d-block w-100 img-fluid'>";
          ?>
           <div class="carousel-caption"><!-- carousel text -->
            <h3>Prva slika</h3>
            <p>Lorem ipsum dolor sit amet.!</p>
          </div>
        </div>
        <div class="carousel-item">
          <?php
            echo "<img src='slike/" . $s2 . "' alt = 'slika' class='d-block w-100 img-fluid'>";
          ?>
          <div class="carousel-caption">
            <h3>Druga slika</h3>
            <p>Lorem ipsum dolor sit amet.!</p>
          </div>
        </div>
        <div class="carousel-item">
          <?php
            echo "<img src='slike/" . $s3 . "' alt = 'slika' class='d-block w-100 img-fluid'>";
          ?>
          <div class="carousel-caption">
            <h3>Treca slika</h3>
            <p>Lorem ipsum dolor sit amet.!</p>
          </div>
        </div>
      </div>
      <!-- kontrole za carousel levo i desno -->
      <a href="#carousel-slike" class="carousel-control-prev" role="button" data-bs-target="#carousel-slike" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Nazad</span><!-- za screen reader-->
      </a>
      <a href="#carousel-slike" class="carousel-control-next" role="button" data-bs-target="#carousel-slike" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Napred</span><!-- za screen reader-->
      </a>
    </div>
  </div>
  </section>
  <!-- sekcija za citate -->
    <section id="citati">
      <div class="container-fluid">
        <div class="row bg-custom align-items-center row-custom ">
          <div class="col-md p-5">
            <div class="citati-border">
            <?php
              $default = ['posao','zdravlje', 'ljubav', 'motivacija'];
              $link = $_GET['link'] ?? $default[array_rand($default)];
              $imeFile = $link . '.txt';
              $tekst = file($imeFile, FILE_IGNORE_NEW_LINES);

              $citat = [];
              $autor = [];

              for($i = 0;$i<count($tekst); $i+=2)
              {
                $citat[] = $tekst[$i]; //parni indexi 0,2,4..
                $autor[] = $tekst[$i+1];//neparni indexi 1,3,5..
              }

              $randomPar = rand(0, count($citat) - 1);//-1 zato sto indeks/key u array-u pocinju od 0
              echo "<p>Citat:<br> " . $citat[$randomPar] . "</p>";
              echo "<p>Autor:<br> " . $autor[$randomPar] . "</p>";
              ?>
            </div>
          </div>
          <!-- slika pored citata -->
          <div class="col-lg p-5">
            <img src="slike/slika1.jpg" alt="slika" class="img-fluid">
          </div>
        </div>
      </div>
    </section>
    <!-- sekcija sa karticama/boxes -->
    <section class="p-5">
      <div class="container">
        <div class="row text-center g-4">
          <div class="col-md">
            <div class="card card-custom">
              <div class="card-body text-center text-light">
                <div class="h1 mb-3">
                  <i class="fa-solid fa-face-grin-hearts" style="color: #ffffff;"></i>
                </div>
                <h3 class="card-title mb-3">
                  Lorem, ipsum.
                </h3>
                <p class="card-text">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam eos aliquid autem voluptas fuga corporis officiis explicabo blanditiis ipsa quo.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md">
          <div class="card card-custom">
              <div class="card-body text-center text-light">
                <div class="h1 mb-3">
                  <i class="fa-solid fa-briefcase" style="color: #ffffff;"></i>
                </div>
                <h3 class="card-title mb-3">
                  Lorem, ipsum.
                </h3>
                <p class="card-text">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam eos aliquid autem voluptas fuga corporis officiis explicabo blanditiis ipsa quo.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md">
          <div class="card card-custom">
              <div class="card-body text-center text-light">
                <div class="h1 mb-3">
                 <i class="fa-solid fa-person" style="color: #ffffff;"></i>
                </div>
                <h3 class="card-title mb-3">
                  Lorem, ipsum.
                </h3>
                <p class="card-text">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam eos aliquid autem voluptas fuga corporis officiis explicabo blanditiis ipsa quo.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- footer -->
    <footer class="text-center">
    <div class="container p-1">
      <p>
        <?php 
        date_default_timezone_set("Europe/Belgrade");
        echo date('d-m-Y');
        echo "<br>";
        echo "Trenutno vreme je " . date("G:i");
        ?>
      </p>
    </div>
    </footer>
  <!-- Javascript za Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>