<?php

$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
?>
<div class="col-2 custom-border custom-border-secondary">

    <div>
        <nav>
            <a class="nav-link" <?= $page == "index.php" ? ' text-danger' : ''; ?> href="./index.php"><i class="fa fa-home"></i> Početna</a>
            <a class="nav-link" <?= $page == "dodajKategoriju.php" ? ' text-danger' : ''; ?> href="./dodajKategoriju.php"> <i class="fa fa-plus-square"></i> Dodaj kategoriju</a>
            <a class="nav-link" <?= $page == "kategorije.php" ? ' text-danger' : ''; ?> href="./kategorije.php"><i class="fa fa-map"></i> Kategorije</a>
            <a class="nav-link" <?= $page == "dodajArtikl.php" ? ' text-danger' : ''; ?> href="./dodajArtikl.php"> <i class="fa fa-plus-square"></i> Dodaj artikl</a>
            <a class="nav-link" <?= $page == "artikli.php" ? ' text-danger' : ''; ?> href="./artikli.php"><i class="fa fa-map"></i> Artikli</a>
        </nav>
        <!-- <script>
            // Dohvaćanje trenutnog URL-a
            var currentUrl = window.location.href;

            // Dohvaćanje svih linkova u navigaciji
            var navLinks = document.querySelectorAll(".nav-link");

            // Provjera svakog linka i označavanje trenutne stranice
            navLinks.forEach(function(link) {
                // Usporedba href atributa linka s trenutnim URL-om
                if (link.href === currentUrl) {
                    link.classList.add("active"); // Dodavanje klase "active" ako je URL jednak
                }
            });
        </script> -->
    </div>
</div>