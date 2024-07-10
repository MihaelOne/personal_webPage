<?php
// session_start();
include('../config/dbcon.php');
function getAll($table)
{

    global $conn;
    $querry = "SELECT * FROM $table";
    return $querry_run = mysqli_query($conn, $querry);
}
function getByID($table, $id)
{

    global $conn;
    $querry = "SELECT * FROM $table WHERE id='$id'";
    return $querry_run = mysqli_query($conn, $querry);
}

function getAllActive($table)
{

    global $conn;
    $querry = "SELECT * FROM $table WHERE status='0'";
    return $querry_run = mysqli_query($conn, $querry);
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: ' . $url);
    exit();
}
