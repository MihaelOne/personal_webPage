<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<?php include('../middlewere/adminmiddlewere.php');
include('../functions/myfunctions.php')  ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Page</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col custom-border">

                <ul class="nav justify-content-center bg-secondary ">
                    <li class="nav-item text-white p-4">
                        <h4> ZDRAVA HRANA - admin page</h4>
                    </li>
                </ul>
            </div>
        </div>
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
        <div class="row">
            <?php include('sidebar.php'); ?>
            <div class="col custom-border">
                <!-- Drugi stupac -->

                <div class="conteiner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Dodaj artikl</h4>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label class="mb-0">Odaberi kategoriju</label>
                                                <select required name="category_id" class="form-select">
                                                    <option selected>Odaberi kategoriju</option>
                                                    <?php
                                                    $categories = getAll('kategorije');
                                                    if (mysqli_num_rows($categories) > 0) {
                                                        foreach ($categories as $item) {
                                                    ?>
                                                            <option value="<?= $item['id']; ?>"><?= $item['ime']; ?></option>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "Nema dostupne kategorije";
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="mb-0">Ime</label>
                                                <input type="text" required name="ime" class="form-control mb-2" placeholder="">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="mb-0">Slug</label>
                                                <input type="text" required name="slug" class="form-control mb-2" placeholder="">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Kratki opis</label>
                                                <textarea row="3" required name="kratki_opis" class="form-control mb-2" placeholder=""></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Opis</label>
                                                <textarea row="3" required name="opis" class="form-control mb-2" placeholder=""></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="mb-0">Prava cijena</label>
                                                <input type="text" name="prava_cijena" class="form-control mb-2" placeholder="">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="mb-0">Prodajna cijena</label>
                                                <input type="text" required name="prodajna_cijena" class="form-control mb-2" placeholder="">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Dodaj sliku</label>
                                                <input type="file" required name="slika" class="form-control mb-2" placeholder="">
                                            </div>

                                            <div class="col-md-6">
                                                <label class="mb-0">Količina</label>
                                                <input type="number" required name="qty" class="form-control mb-2" placeholder="">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="mb-0 mt-4">Status</label>
                                                <input type="checkbox" name="status">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="mb-0 mt-4">Trending</label>
                                                <input type="checkbox" name="trending">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="mb-0 mt-4">Novo</label>
                                                <input type="checkbox" name="trending">
                                            </div>

                                            <div class="col-md-12">
                                                <label class="mb-0">Meta title</label>
                                                <input type="text" required name="meta_title" class="form-control mb-2" placeholder="">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Meta opis</label>
                                                <textarea row="3" required name="meta_description" class="form-control mb-2" placeholder=""></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Meta keywords</label>
                                                <textarea row="3" required name="meta_keywords" class="form-control mb-2" placeholder=""></textarea>
                                            </div>

                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary" name="add_product_btn">Spremi</button>
                                            </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col custom-border">
            <!-- Treći redak -->
            <div class="bg-secondary text-white p-4">
                About us
            </div>
        </div>
    </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>