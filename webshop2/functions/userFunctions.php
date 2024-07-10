<?php
// session_start();
include('config/dbcon.php');

function getAll($table)
{
    global $conn;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($conn, $query);
}

function getByID($table, $id)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE id='$id'";
    return $query_run = mysqli_query($conn, $query);
}

function getProductByCategory($category_id)
{
    global $conn;
    $query = "SELECT * FROM artikli WHERE category_id='$category_id'AND status='0' ";
    return $query_run = mysqli_query($conn, $query);
}

function getSlugActive($table, $slug)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE slug='$slug'AND status='0' LIMIT 1";
    return $query_run = mysqli_query($conn, $query);
}

function getIDActive($table, $id)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE id='$id'AND status='0' ";
    return $query_run = mysqli_query($conn, $query);
}

function getAllActive($table)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE status='0'";
    return $query_run = mysqli_query($conn, $query);
}

function getAllTrending()
{
    global $conn;
    $query = "SELECT * FROM artikli WHERE trending='1'";
    return $query_run = mysqli_query($conn, $query);
}

function getNovo()
{
    global $conn;
    $query = "SELECT * FROM artikli WHERE novo='1'";
    return $query_run = mysqli_query($conn, $query);
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: ' . $url);
    exit();
}

function getCartItems()
{
    global $conn;
    $userid = $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, a.id as aid , a.name, a.image, a.selling_price FROM carts c, artikli a WHERE c.prod_id=a.id AND c.user_id='$userid' ORDER BY c.id DESC ";
    return $query_run = mysqli_query($conn, $query);
}

function getOrders()
{
    global $conn;
    $userid = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE user_id='$userid' ORDER BY id DESC";
    return $query_run = mysqli_query($conn, $query);
}

function checkTrackingNoValid($trackingNo)
{
    global $conn;
    $userid = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE tracking_no='$trackingNo' AND user_id='$userid'";
    return $query_run = mysqli_query($conn, $query);
}
