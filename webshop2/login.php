<!doctype html>
<html lang="en">
<?php session_start();
if (isset($_SESSION['auth'])) {

    $_SESSION['message'] = 'Več ste projavljeni';
    header('Location: index.php');
    exit();
}
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Prijava </title>
</head>

<body>
    <?php include 'includes/navbar.php' ?>
    <div class="row">
        <div class="py-5 col">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
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
                        <div class="card">
                            <div class="card-header">
                                <h1>Prijava</h1>
                            </div>
                            <div class="card-body">
                                <form action="functions/authcode.php" method="POST">

                                    <div class="form-group">
                                        <!-- <label for="exampleInputEmail1">Email address</label> -->
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                                    </div>

                                    <div class="form-group">
                                        <!-- <label for="exampleInputPassword1">Password</label> -->
                                        <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Lozinka">
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember_me">
                                        <label class="form-check-label" for="exampleCheck1">Zapamti prijavu</label>

                                    </div>

                                    <button type="submit" name="login_btn" class="btn btn-success">Prijava</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="py-5 col">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <p>Zašto otvoriti korisnički račun?
                                Registracijom na Tvornicazdravehrane.com moći ćete brže i lakše kupovati, pratiti stanje svojih narudžbi te steći mnoge druge pogodnosti.

                                Brža i jednostavnija kupovina
                                Bolje korištenje na više uređaja
                                Posebne ponude
                                Već ste registrirani? Prijavite se!
                                Prijava
                                Zaboravio/la si lozinku?
                                Zatraži novu
                                Brza prijava putem društvenih mreža</p>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
<script>
    // Dohvaćanje checkbox elementa
    var checkbox = document.getElementById('exampleCheck1');

    // Spremanje stanja checkboxa u lokalnu pohranu prilikom prijave
    if (checkbox.checked) {
        localStorage.setItem('rememberMe', 'true');
    } else {
        localStorage.setItem('rememberMe', 'false');
    }

    window.onload = function() {
        var rememberMe = localStorage.getItem('rememberMe');
        if (rememberMe === 'true') {
            checkbox.checked = true;
        } else {
            checkbox.checked = false;
        }
    };
</script>

</html>