<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<?php include('../middlewere/adminmiddlewere.php');
include('../functions/myfunctions.php')
?>

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
            <div class="col custom-border custom-border-secondary">

                <ul class="nav justify-content-center bg-secondary ">
                    <li class="nav-item text-white p-4">
                        <h4> ZDRAVA HRANA - admin page</h4>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row row-eq-height">
            <?php include('sidebar.php'); ?>
            <div class="bg-primary col custom-border custom-border-secondary">
                <!-- Drugi stupac -->
                <div class="conteiner">
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
                    <div class="row p-0 bg-white border-3 border-black  ">
                        <div class="col-md-12 ">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Kategorije</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped ">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th class="text-nowrap">Ime</th>
                                                <th>Slika</th>
                                                <th>Status</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $kategorije = getAll("kategorije");
                                            if (mysqli_num_rows($kategorije) > 0) {
                                                foreach ($kategorije as $item) {
                                            ?>
                                                    <tr>
                                                        <td><?= $item['id']; ?></td>
                                                        <td class="text-nowrap"><?= $item['ime']; ?></td>
                                                        <td> <img src="../uploads/<?= $item['image']; ?>" alt="<?= $item['ime']; ?>" style=" max-width: 50px; max-height: 50px"> </td>
                                                        <td><?= $item['status'] == '0' ? "Visible" : "Hidden"; ?></td>
                                                        <td>
                                                            <a href="edit_category.php?id=<?= $item['id']; ?>" class="btn btn-primary btn-sm btn-p-1">Uredi</a>
                                                        </td>
                                                        <td>
                                                            <!-- <form action="code.php" method="POST">
                                                                <input type="hidden" name="category_id" value="<?= $item['id'] ?>">
                                                                <button type="submit" class="btn btn-danger btn-sm btn-p-1" name="delete_category_btn">Obriši</button>
                                                            </form> -->
                                                            <button type="submit" class="btn btn-danger btn-sm delete_category_btn" value="<?= $item['id']; ?>">Obriši</button>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "Nije pronađeno";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col custom-border custom-border-secondary">
                <!-- Treći redak -->
                <div class="bg-secondary text-white p-4">
                    About us
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../assets/js/jquery-3.7.0.min.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>