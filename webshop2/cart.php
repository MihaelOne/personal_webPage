<?php include 'includes/header.php';
include 'authenticate.php'
?>

<?php if (isset($_SESSION['message'])) {
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong> <?= $_SESSION['message']; ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
    unset($_SESSION['message']);
} ?>

<div class="py-3 bg-primary">
    <div class="container">
        <h5 class="text-white">Košara/</h5>
    </div>
</div>


<div class="py-5 mx-5">
    <div class="conteiner">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div id="myCart">
                        <?php $items = getCartItems();
                        $totalPrice = 0;
                        if (mysqli_num_rows($items) > 0) {
                        ?>
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <h6></h6>
                                </div>
                                <div class="col-md-3">
                                    <h6>Proizvod</h6>
                                </div>
                                <div class="col-md-3">
                                    <h6>Cijena</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Količina</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6></h6>
                                </div>
                            </div>

                            <div id="">
                                <?php
                                foreach ($items as $citem) {
                                ?>
                                    <div class="card shadow-sm mb-3 product_data">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <img src="uploads/<?= $citem['image']; ?>" alt="Slika proizvoda" width="80px" class="mx-5">
                                            </div>
                                            <div class="col-md-3">
                                                <h5><?= $citem['name']; ?> </h5>
                                            </div>
                                            <div class="col-md-3">
                                                <h5><?= $citem['selling_price']; ?> €</h5>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="hidden" class="prodID" value="<?= $citem['prod_id']; ?>">
                                                <div class="input-group mb-3 product_data" style="width:130px ">
                                                    <button class="input-group-text decrement-btn updateQty">-</button>
                                                    <input type="number" class="form-control bg-white input-qty text-center" value="<?= $citem['prod_qty']; ?>">
                                                    <button class="input-group-text increment-btn updateQty">+</button>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-danger deleteFromCart" value="<?= $citem['cid']; ?>">
                                                    <i class="fa fa-trash mr-2"></i>
                                                    Ukloni iz košare</button>
                                            </div>
                                        </div>
                                    </div>


                                <?php
                                    $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
                                }
                                ?>

                                <div class="float-right mx-5 mb-4">
                                    <!-- Prikaz ukupne cijene -->
                                    <h5>Ukupna cijena: <?php echo $totalPrice; ?> €</h5>
                                    <a href="checkout.php" class="btn btn-outline-primary mr-4">Dovršite kupnju </a>
                                </div>

                            <?php
                        } else {
                            ?>
                                <div class="card card-body text-center shadow">
                                    <h4 class="py-3">Košarica je prazna</h4>
                                </div>
                            <?php
                        }
                            ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Ostali JavaScript kod -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="assets/js/custom1.js"></script>

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