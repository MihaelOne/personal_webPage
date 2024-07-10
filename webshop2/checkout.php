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
        <h5 class="text-white">Blagajna/</h5>
    </div>
</div>


<div class="py-5 mx-5">
    <div class="conteiner">
        <div class="card">
            <div class="card-body shadow">
                <div class="row">
                    <div class="col md-7">
                        <h5>Osnovni podaci</h5>
                        <hr class="bg-danger">
                        <form action="functions/placeorder.php" method="POST">
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="" class="fx-bold">Ime</label>
                                    <input type="text" required name="name" placeholder="Unesi puno ime i prezime" class="form-control">
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="" class="fx-bold">E-mail</label>
                                    <input type="email" required name="email" placeholder="Unesi e-mail" class="form-control">
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="" class="fx-bold">Telefon</label>
                                    <input type="number" required name="phone" placeholder="Unesi broj mobitela" class="form-control">
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="" class="fx-bold">Pin kod</label>
                                    <input type="number" name="pincode" required placeholder="Unesi pin kartice" class="form-control">
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="" class="fx-bold">Adresa</label>
                                    <textarea name="address" id="" required cols="1" rows="3" class="form-control" placeholder="Unesi adresu"></textarea>
                                </div>
                            </div>

                    </div>
                    <div class="col-md-5">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <h6></h6>
                            </div>
                            <div class="col-md-5">
                                <h6><strong>Proizvod</strong></h6>
                            </div>
                            <div class="col-md-2">
                                <h6><strong>Cijena</strong></h6>
                            </div>
                            <div class="col-md-2">
                                <h6><strong>Količina</strong></h6>
                            </div>
                        </div>


                        <?php $items = getCartItems();
                        $totalPrice = 0;

                        foreach ($items as $citem) {
                        ?>
                            <div class="card shadow-sm mb-3 product_data">
                                <div class="row align-items-center px-1">
                                    <div class="col-md-3">
                                        <img src="uploads/<?= $citem['image']; ?>" alt="Slika proizvoda" width="60px" class="ml-5">
                                    </div>
                                    <div class="col-md-5">
                                        <h6><?= $citem['name']; ?> </h6>
                                    </div>
                                    <div class="col-md-2">
                                        <h6><?= $citem['selling_price'] * $citem['prod_qty']; ?> €</h6>
                                    </div>
                                    <div class="col-md-2">
                                        <h6><?= $citem['prod_qty']; ?> </h6>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
                        }
                        ?>
                        <hr class="bg-danger">
                        <h4> <strong>Ukopno:</strong> <span class="float-right"><?= $totalPrice ?> €</span> </h4>
                        <div class="">
                            <input type="hidden" name="payment_mode" value="COD">
                            <button type="submit" name="placeOrderBtn" class="btn btn-primary w-50 items-align-center"> Potvrdi naruđbu </button>
                        </div>
                    </div>
                    </form>
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