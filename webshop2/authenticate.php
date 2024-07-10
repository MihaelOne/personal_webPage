<?php
if (!isset($_SESSION['auth'])) {

    redirect("login.php", 'Prijavi se za nastavak');
}
