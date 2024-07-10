<?php include 'includes/header.php' ?>

<div class="py-3 bg-primary">
    <div class="container">
        <h5 class="text-white">Kategorije/</h5>
    </div>
</div>

<div class="py-5">
    <div class="conteiner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-4 ml-3">Kategorije</h1>
                <div class="row">
                    <?php
                    $kategorije = getAllActive("kategorije");
                    if (mysqli_num_rows($kategorije) > 0) {
                        foreach ($kategorije as $item) {
                    ?>
                            <div class="col-md-3 mb-2 ml-3">
                                <a href="artikli.php?category=<?= $item['slug']; ?>">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <img src="uploads/<?= $item['image']; ?>" alt="Slika kategorije" class="w-100 h-100">
                                            <h4 class="text-center"><?= $item['ime']; ?></h4>
                                        </div>
                                    </div>
                                </a>
                            </div>

                    <?php
                        }
                    } else {
                        echo "Nema dostupnih kategorija";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>