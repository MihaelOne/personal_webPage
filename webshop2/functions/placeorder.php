<?php

session_start();
include('../config/dbcon.php');

if (isset($_SESSION['auth'])) {

    if (isset($_POST['placeOrderBtn'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
        $payment_id = mysqli_real_escape_string($conn, $_POST['payment_id']);


        if ($name == "" || $email == "" || $phone == "" || $pincode == "" || $address == "") {
            $_SESSION['message'] = "Sva polja moraju biti popunjena";
            header('Location: ../checkout.php');
            exit(0);
        }

        $user_id = $_SESSION['auth_user']['user_id'];
        echo "Test ispis 1";
        $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, a.id as aid , a.name, a.image, a.selling_price FROM carts c, artikli a WHERE c.prod_id=a.id AND c.user_id='$user_id' ORDER BY c.id DESC ";
        $query_run = mysqli_query($conn, $query);
        $totalPrice = 0;

        foreach ($query_run as $citem) {
            $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
        }

        $random_number = rand(1111, 9999); // Generira slučajni broj između 1111 i 9999
        $tracking_no = "webShopNAME" . $random_number . substr($phone, 2); // Dodaje slučajno generirani broj uz "webShopNAME"


        $insert_query = "INSERT INTO orders (tracking_no, user_id, name, email, phone, address, pincode, total_price, payment_mode, payment_id) 
                        VALUES ('$tracking_no', '$user_id', '$name', '$email', '$phone','$address','$pincode' , '$totalPrice', '$payment_mode', '$payment_id')";
        $insert_query_run = mysqli_query($conn, $insert_query);

        if ($insert_query_run) {
            $order_id = mysqli_insert_id($conn);
            foreach ($query_run as $citem) {
                $prod_id = $citem['prod_id'];
                $prod_qty = $citem['prod_qty'];
                $price = $citem['selling_price'];

                $insert_items_query = "INSERT INTO order_items (order_id, prod_id, qty, price) VALUES ('$order_id', '$prod_id', '$prod_qty', '$price')";
                $insert_items_query_run = mysqli_query($conn, $insert_items_query);

                $product_querry = "SELECT * FROM artikli WHERE id='$prod_id' ";
                $product_querry_run = mysqli_query($conn, $product_querry);

                $productData = mysqli_fetch_array($product_querry_run);
                $current_qty = $productData['qty'];

                $new_qty = $current_qty - $prod_qty;

                $updateQty_query = "UPDATE artikli SET qty='$new_qty' WHERE id='$prod_id' ";
                $updateQty_query_run = mysqli_query($conn, $updateQty_query);
            }

            $deleteCartQuery = "DELETE FROM carts WHERE user_id='$user_id'";
            $deleteCartQuery_run = mysqli_query($conn, $deleteCartQuery);

            $_SESSION['message'] = "Narudžba dovršena";
            header('Location: ../my_orders.php');
            exit();
        } else {
            $_SESSION['message'] = "Greška pri izvršavanju narudžbe";
            header('Location: ../checkout.php');
            exit();
        }
    }
} else {
    header('Location: ../index.php');
    exit();
}
