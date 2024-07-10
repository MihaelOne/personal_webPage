<?php include 'includes/header.php';

if (isset($_GET['category'])) {
    $category_slug = $_GET['category'];
    $category_data = getSlugActive('kategorije', $category_slug);
    $category = mysqli_fetch_array($category_data);
    if ($category) {
        $cid = $category['id'];
?>

        <div class="py-3 bg-primary">
            <div class="container">
                <h5 class="text-white">
                    <a class="text-white" href="kategorije.php">
                        Kategorije/
                        <?= $category['ime']; ?>
                    </a>
                </h5>
            </div>
        </div>

        <div class="py-3">
            <div class="conteiner">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="mb-4 pl-5"><?= $category['ime']; ?></h1>
                            <div class="row pl-4 card-deck">
                                <?php
                                $products = getProductByCategory($cid);
                                if (mysqli_num_rows($products) > 0) {
                                    foreach ($products as $item) {
                                ?>
                                        <div class="col-md-3 mb-2 ml-3">
                                            <a href="product_view.php?product=<?= $item['slug']; ?>">
                                                <div class="card shadow" style="height: 350px;">
                                                    <div class="card-body h-100">
                                                        <img src="uploads/<?= $item['image']; ?>" alt="Slika proizvoda" class="w-100 h-100">
                                                        <div class="pt-3">
                                                            <h4 class="text-center pt-2"><?= $item['name']; ?></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                <?php
                                    }
                                } else {
                                    echo "Nema dostupnih proizvoda";
                                }
                                ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "Nema dostupnih proizvoda";
    }
} else {
    echo "Nema dostupnih proizvoda";
}
?>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>