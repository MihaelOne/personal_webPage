<?php
if (isset($_SESSION['auth'])) {
    if ($_SESSION['role_as'] != 1) {
        $_SESSION['message'] = 'Ne možete pristupiti ovoj stranici';
        header('Location: ../index.php');
    }
} else {
    $_SESSION['message'] = 'Prijavi se za nastavak';
    header('Location: ../login.php');
}
