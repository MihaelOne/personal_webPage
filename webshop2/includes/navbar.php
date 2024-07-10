<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow sticky-top">
    <a class="navbar-brand" href="index.php">Zdrava hrana </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="container" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
            <!-- <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li> -->
            <?php
            if (isset($_SESSION['auth'])) {
            ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle, text-success" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $_SESSION['auth_user']['ime']; ?> <?= $_SESSION['auth_user']['prezime']; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="my_orders.php">Moje narudžbe</a>
                        <a class="dropdown-item" href="admin\index.php">Admin page</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="kategorije.php" class="nav-link">Kategorije</a>
                </li>
                <li>
                    <form class="form-inline mx-5">
                        <input class="form-control mr-sm-2" type="search" placeholder="Pretraži proizvode.." aria-label="Search" style="width:330px">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </li>


            <?php
            } else {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Registracija</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Prijava</a>
                </li>

            <?php
            }
            ?>

            <!-- <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li> -->
        </ul>
        <?php
        if (isset($_SESSION['auth'])) {
        ?>
            <span class="navbar-item text-white">
                <a href="cart.php" class="nav-link"><i class="fa fa-shopping-cart"></i> Košara</a>
            </span>
        <?php
        }
        ?>

    </div>
</nav>
<script src="assets/js/jquery-3.7.0.min.js"></script>
<script src="assets/js/custom.js"></script>