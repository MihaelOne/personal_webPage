<!-- authcode.php -->
<?php
include('../config/dbcon.php');
session_start();
if (null !== $_POST['register_btn']) {
    $ime = mysqli_real_escape_string($conn, $_POST['ime']);
    $prezime = mysqli_real_escape_string($conn, $_POST['prezime']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telefon = mysqli_real_escape_string($conn, $_POST['telefon']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    $check_email_query  = "SELECT email FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {

        $_SESSION['message'] = 'Ovaj email je već registriran';
        header('Location: ../register.php');
    } else {

        if ($password == $cpassword) {
            $insert_query = "INSERT INTO users (ime, prezime, telefon, email, password) VALUES ('$ime', '$prezime', '$telefon', '$email', '$password')";
            $insert_query_run = mysqli_query($conn, $insert_query);

            if ($insert_query_run) {
                $_SESSION['message'] = 'Uspješno registrirani';
                header('Location: ../login.php');
            } else {
                $_SESSION['message'] = 'Nešto je pošlo u krivo';
                header('Location: ../register.php');
            }
        } else {
            $_SESSION['message'] = 'Lozinke se ne podudaraju';
            header('Location: ../register.php');
        }
    }
} else if (null !== $_POST['login_btn']) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email' AND password = '$password'";
    $login_query_run = mysqli_query($conn, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $_SESSION['auth'] = true;
        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['id'];
        $username1 = ucwords($userdata['ime']);
        $username2 = ucwords($userdata['prezime']);
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user'] = [
            'user_id' => $userid,
            'ime' => $username1,
            'prezime' => $username2,
            'email' => $useremail,
        ];
        $_SESSION['role_as'] = $role_as;
        if ($role_as == 1) {
            $_SESSION['message'] = 'Dobro došli u upravljačku ploču';
            header('Location: ../admin/index.php');
        } else {
            $_SESSION['message'] = 'Uspiješno prijavljen';
            header('Location: ../index.php');
        }
    } else {

        $_SESSION['message'] = 'Obrazac nije ispravno popunjen';
        header('Location: ../login.php');
    }
}

?>