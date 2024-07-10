<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<?php include('../middlewere/adminmiddlewere.php');
include('../functions/myfunctions.php')   ?>

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
                                    <h4>Uredi kategoriju
                                        <a href="kategorije.php" class="btn btn-danger float-end">Back</a>
                                    </h4>

                                </div>
                                <?php if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $category = getByID('kategorije', $id);
                                    if (mysqli_num_rows($category) > 0) {
                                        $data = mysqli_fetch_array($category);
                                ?>
                                        <div class="card-body">
                                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="hidden" name="category_id" value="<?= $data['id'] ?>">
                                                        <label for="">Ime</label>
                                                        <input type="text" name="ime" value="<?= $data['ime'] ?>" class="form-control" placeholder="">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="">Slug</label>
                                                        <input type="text" name="slug" value="<?= $data['slug'] ?>" class="form-control" placeholder="">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="">Opis</label>
                                                        <textarea row="3" name="opis" class="form-control" placeholder=""><?= $data['opis'] ?></textarea>
                                                    </div>
                                                    <div class="col-md-12" style="margin-top: 10px;">
                                                        <label for="" style="margin-top: 10px;">Dodaj sliku</label>
                                                        <input type="file" name="slika" class="form-control" placeholder="">
                                                        <label for="" style="margin-top: 10px;">Trenutna slika</label>
                                                        <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                                        <img src="../uploads/<?= $data['image'] ?>" height="50px" width="50px" alt="">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="">Meta title</label>
                                                        <input type="text" name="meta_title" value="<?= $data['meta_title'] ?>" class=" form-control" placeholder="">
                                                    </div>
                                                    <div class="col-md-12" style="margin-top: 10px;">
                                                        <label for="">Meta opis</label>
                                                        <textarea row="3" name="meta_description" class="form-control" placeholder=""><?= $data['meta_description'] ?></textarea>
                                                    </div>
                                                    <div class="col-md-12" style="margin-top: 10px;">
                                                        <label for="">Meta keywords</label>
                                                        <textarea row="3" name="meta_keywords" class="form-control" placeholder=""><?= $data['meta_keywords'] ?></textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Status</label>
                                                        <input type="checkbox" <?= $data['status'] ? "checked" : "" ?> name="status">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Popular</label>
                                                        <input type="checkbox" <?= $data['popular'] ? "checked" : "" ?> name="popular">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-primary" name="edit_article_btn">Uredi</button>
                                                    </div>
                                            </form>
                                        </div>

                            </div>
                    <?php
                                    } else {
                                        echo "Nije pronađena kategorija";
                                    }
                                } else {
                                    echo "Nije pronađen ID";
                                }

                    ?>
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