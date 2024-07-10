<?php include 'includes/header.php' ?>
<?php include 'includes/slider.php' ?>



<ul class="nav nav-tabs justify-content-center pt-5" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Najprodavaniji proizvodi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Novi proizvodi</a>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <?php
                    $trendingProducts = getAllTrending();
                    if (mysqli_num_rows($trendingProducts) > 0) {
                        foreach ($trendingProducts as $item) {
                    ?>
                            <div class="col-md-3 mb-2">
                                <a href="product_view.php?product=<?= $item['slug']; ?>">
                                    <div class="card shadow h-100">
                                        <div class="card-body" style="height: 250px;">
                                            <img src="uploads/<?= $item['image']; ?>" alt="Slika proizvoda" class="card-img-top">
                                            <div class="card-body">
                                                <h4 class="card-title text-center"><?= $item['name']; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
    <div class="card mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <?php
                $newProducts = getNovo();
                if (mysqli_num_rows($newProducts) > 0) {
                    foreach ($newProducts as $item) {
                ?>
                        <div class="card col-md-3 mb-2 ml-3">
                            <a href="product_view.php?product=<?= $item['slug']; ?>">
                                <div class="card shadow" style="height: 350px;">
                                    <img src="uploads/<?= $item['image']; ?>" alt="Slika proizvoda" class="w-100 h-100">
                                    <div class="card-body h-100">
                                        <h4 class="text-center pt-2"><?= $item['name']; ?></h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>






<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>