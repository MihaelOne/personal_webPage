<?php include 'includes/header.php';

if (isset($_GET['product'])) {
    $product_slug = $_GET['product'];
    $product_data = getSlugActive('artikli', $product_slug);
    $product = mysqli_fetch_array($product_data);
    if ($product) {
?>

        <div class="py-3 bg-primary">
            <div class="container">
                <h5 class="text-white">
                    <p class="text-white">
                        Proizvodi/
                        <?= $product['name']; ?>
                    </p>
                </h5>
            </div>
        </div>
        <div class="bg-light py-4">
            <div class="d-flex align-items-center w-200 m-5 border-2 ">
                <div class="col-md-4 shadow">
                    <img src="uploads/<?= $product['image']; ?>" alt="Slika proizvoda" class="w-100 m-2">
                </div>
                <div class="col-md-8 m-2 product_data">
                    <h4 class="fw-bold"><?= $product['name']; ?></h4>
                    <hr>
                    <p><?= $product['description']; ?></p>
                    <div class="row">
                        <div class="">
                            <p class="text-danger"> <s> <?= $product['orginal_price']; ?> € </s></p>
                        </div>
                        <div class="">
                            <h4 class="text-danger"><b><?= $product['selling_price']; ?> €</b> </h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group mb-3" style="width:130px ">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="number" class="form-control bg-white input-qty text-center" value="1">
                                        <button class="input-group-text increment-btn">+</button>
                                    </div>

                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col md-2">
                                    <button class="btn btn-primary px-4 addToCartbtn" value="<?= $product['id']; ?>"><i class="fa fa-shopping-cart me-2"></i> U košaricu</button>
                                </div>
                                <div class="col md-6">
                                    <button class="btn btn-danger px-4"><i class="fa fa-heart me-2"></i> Lista želja</button>
                                </div>
                            </div>
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

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="assets/js/custom1.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    alertify.set('notifier', 'position', 'top-right');
    <?php
    if (isset($_SESSION['message'])) {
    ?>
        alertify.success('<?= $_SESSION['message']; ?>');
    <?php
        unset($_SESSION['message']);
    }
    ?>
</script>
</body>

</html>