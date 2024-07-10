<!--view/webshop.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
  <div>
    <header>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li>
                    <a class="dropdown-item" href="#">Another action</a>
                  </li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
              <button class="btn btn-outline-success" type="submit">
                Search
              </button>
            </form>
          </div>
        </div>
      </nav>
    </header>

    <main>
      <?php
      if (isset($Artikli) && !is_null($Artikli)) {
        foreach ($Artikli as $artikl) : ?>
          <div class="container">
            <h2>Popis proizvoda</h2>
            <div class="proizvod">
              <h3><?php echo $artikl->ime; ?></h3>
              <img src="<?php echo $artikl->slika; ?>" alt="<?php echo $artikl->ime; ?>" />
              <p>Kategorija: <?php echo $artikl->kategorija; ?></p>
              <p>Cijena: <?php echo $artikl->cijena . ' €'; ?></p>
              <!-- Dodajte ostale informacije o proizvodu koje želite prikazati -->
            </div>
        <?php endforeach;
      } else {
        echo "Error: \$Artikli is not set or is null";
      } ?>
          </div>
    </main>

    <!-- <main>
      <div class="container">
        <h2>Unos proizvoda</h2>
        <form>
          <div>
            <label for="ime">Ime proizvoda:</label>
            <input type="text" id="ime" name="ime" required />
          </div>
          <div>
            <label for="slika">Slika URL:</label>
            <input type="url" id="slika" name="slika" required />
          </div>
          <div>
            <label for="kategorija">Kategorija:</label>
            <input type="text" id="kategorija" name="kategorija" required />
          </div>
          <div>
            <label for="cijena">Cijena:</label>
            <input type="number" id="cijena" name="cijena" required />
          </div>
          <div>
            <button type="button" id="detalji-btn">Detalji</button>
          </div>
          <div>
            <button type="submit">Dodaj u košaricu</button>
          </div>
        </form>
      </div> -->


    <div id="detalji-modal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Detalji proizvoda</h3>
        <p>Ovdje možete prikazati detalje proizvoda.</p>
      </div>
    </div>
    </main>

    <footer></footer>
  </div>
</body>

<!-- <script>
  // Pronalazi elemente na stranici
  var detaljiBtn = document.getElementById("detalji-btn");
  var modal = document.getElementById("detalji-modal");
  var closeBtn = document.getElementsByClassName("close")[0];

  // Dodaje događaj klik na gumb "Detalji"
  detaljiBtn.addEventListener("click", function() {
    modal.style.display = "block";
  });

  // Zatvara prozor s detaljima kada se klikne na ikonu "X"
  closeBtn.addEventListener("click", function() {
    modal.style.display = "none";
  });

  // Zatvara prozor s detaljima kada se klikne izvan prozora
  window.addEventListener("click", function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  });
</script> -->

</html>