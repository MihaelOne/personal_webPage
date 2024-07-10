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
}
if (isset($_GET['t'])) {
    $tracking_no = $_GET['t'];
    $orderData = checkTrackingNoValid($tracking_no);
    if (mysqli_num_rows($orderData) < 0) {
    ?>
        <h5>Nešto nije u redu</h5>
    <?php
        die();
    }
} else {
    ?>
    <h5>Nešto nije u redu</h5>
<?php
    die();
}
$data = mysqli_fetch_array($orderData);
?>

<div class="py-3 bg-primary">
    <div class="container">
        <h5 class="text-white">
            <a href="my_orders.php"> Narudžbe </a>
            <a href="#">Pregled narudžbe</a>
        </h5>
    </div>
</div>


<div class="py-5 mx-5">
    <div class="conteiner">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h2>Detalji narudžbe <a href="my_orders.php" class="btn btn-warning float-right"><i class="fa fa-reply"> </i>Natrag</a></h2>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Detalji o dostavi</h4>
                                    <hr class="bg-primary border-3">
                                    <div class="row">
                                        <div class="col-md-12 mb-2 ">
                                            <label class="fw-bold">Ime i prezime</label>
                                            <div class="border p-1">
                                                <?= $data['name']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">E-mail</label>
                                            <div class="border p-1">
                                                <?= $data['email']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Telefon</label>
                                            <div class="border p-1">
                                                <?= $data['phone']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Adresa</label>
                                            <div class="border p-1">
                                                <?= $data['address']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Broj narudžbe</label>
                                            <div class="border p-1">
                                                <?= $data['tracking_no']; ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <h4>Pregled narudžbe</h4>
                                    <hr class="bg-primary border-3">

                                    <table class="table table-responsive table-full-width">
                                        <thead>
                                            <tr>
                                                <th class="col-6 text-center">Proizvod</th>
                                                <th class="col-2 text-center">Količina</th>
                                                <th class="col-2 text-center">Cijena</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $userid = $_SESSION['auth_user']['user_id'];
                                            $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*,oi.qty as orderqty, a.*, a.selling_price as aprice FROM orders o,order_items oi, 
                                    artikli a WHERE o.user_id='$userid' AND oi.order_id=o.id AND a.id=oi.prod_id AND o.tracking_no='$tracking_no'";
                                            $order_query_run = mysqli_query($conn, $order_query);

                                            if (mysqli_num_rows($order_query_run) > 0) {
                                                foreach ($order_query_run as $item) {
                                                    $totalPrice = $item['aprice'] * $item['orderqty'];
                                            ?>
                                                    <tr>
                                                        <td class="text-left">
                                                            <img src="uploads/<?= $item['image']; ?>" alt="<?= $item['name']; ?>" width=50px; height=50px>
                                                            <?= $item['name']; ?>
                                                        </td>


                                                        <td class="text-center">
                                                            <?= $item['orderqty']; ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?= $totalPrice; ?> €
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <hr class="bg-primary border-3">
                                    <h4> Ukupna cijena: <b><?= $data['total_price']; ?> € </b> </h4>

                                    <hr class="bg-primary border-3">
                                    <label for=""><b>Model plačanja</b></label>
                                    <div class="border p-1 mb-3">
                                        <?= $data['payment_mode']; ?>
                                    </div>
                                    <label for=""><b>Status</b></label>
                                    <div class="border p-1 mb-3">
                                        <?php
                                        if ($data['status']  == 0) {
                                            echo "U obradi";
                                        } else if ($data['status']  == 1) {
                                            echo "Dostavljeno";
                                        } else if ($data['status']  == 2) {
                                            echo "Obustavljeno";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
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