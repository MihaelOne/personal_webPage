<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<?php include('../middlewere/adminmiddlewere.php')    ?>

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
            <div class="row p-0 bg-white ">
                <!-- Drugi stupac -->
                <div class="text-primary p-4">
                    <a href="../index.php">Idi na Webshop</a>
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

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>