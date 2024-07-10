<?php
session_start();
include('../config/dbcon.php');
include('../functions/myfunctions.php');

if (isset($_POST['add_article_btn'])) {
    $ime = $_POST['ime'];
    $slug = $_POST['slug'];
    $opis = $_POST['opis'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ?  '1' : '0';
    $popular = isset($_POST['popular']) ?  '1' : '0';

    $slika = $_FILES['slika']['name'];
    $path = "../uploads";
    $slika_ext = pathinfo($slika, PATHINFO_EXTENSION);
    $filename = time() . '.' . $slika_ext;

    $cate_querry =  "INSERT INTO kategorije (ime, slug, opis, meta_title, meta_description, meta_keywords, status, popular, novo, image)
VALUES ('$ime', '$slug', '$opis', '$meta_title', '$meta_description', '$meta_keywords', '$status', '$popular', '$filename', $novo)";


    $cate_querry_run = mysqli_query($conn, $cate_querry);
    if ($cate_querry_run) {
        move_uploaded_file($_FILES['slika']['tmp_name'], $path . '/' . $filename);
        redirect("../admin/dodajKategoriju.php", "Uspiješno dodana kategorija");
    } else {
        redirect("../admin/dodajKategoriju.php", "Nešto nije u redu");
    }
} else if (isset($_POST['edit_article_btn'])) {

    $category_id = $_POST['category_id'];
    $ime = $_POST['ime'];
    $slug = $_POST['slug'];
    $opis = $_POST['opis'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ?  '1' : '0';
    $popular = isset($_POST['popular']) ?  '1' : '0';
    $novo = isset($_POST['novo']) ?  '1' : '0';

    $new_image = $_FILES['slika']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != "") {
        // $update_filename = $new_image;
        $slika_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $slika_ext;
    } else {
        $update_filename = $old_image;
    }
    $path = "../uploads";
    $update_query = "UPDATE kategorije SET ime='$ime', slug='$slug', opis='$opis', meta_title='$meta_title', meta_description='$meta_description', meta_keywords='$meta_keywords', status='$status',popular='$popular',image='$update_filename' WHERE id= '$category_id' ";
    $update_query_run = mysqli_query($conn, $update_query);

    if ($update_query_run) {
        if ($_FILES['slika']['name'] != "") {
            move_uploaded_file($_FILES['slika']['tmp_name'], $path . '/' . $update_filename);
            if (file_exists("../uploads/" . $old_image)) {
                unlink("../uploads/" . $old_image);
            }
        }
        redirect("edit_category.php?id=$category_id", "Kategorija uspješno izmjenjena");
    }
} else if (isset($_POST['delete_category_btn'])) {

    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $category_query = "SELECT * FROM kategorije WHERE id='$category_id'";
    $category_querry_run = mysqli_query($conn, $category_query);
    $category_data = mysqli_fetch_array($category_querry_run);
    $image = $category_data['image'];

    $delete_query = "DELETE FROM kategorije WHERE id='$category_id'";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {

        if (file_exists("../uploads/" . $image)) {
            unlink("../uploads/" . $image);
        }
        // redirect("kategorije.php", "Kategorija uspješno obrisana");
        echo 200;
        exit();
    } else {
        // redirect("kategorije.php", "Nije uspješno obrisana kategorija");
        echo 500;
        exit();
    }
} else if (isset($_POST['add_product_btn'])) {
    $category_id = $_POST['category_id'];
    $ime = $_POST['ime'];
    $slug = $_POST['slug'];
    $kratki_opis = $_POST['kratki_opis'];
    $opis = $_POST['opis'];
    $prava_cijema = $_POST['prava_cijena'];
    $prodajna_cijena = $_POST['prodajna_cijena'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ?  '1' : '0';
    $trending = isset($_POST['trending']) ?  '1' : '0';

    $slika = $_FILES['slika']['name'];
    $path = "../uploads";
    $slika_ext = pathinfo($slika, PATHINFO_EXTENSION);
    $filename = time() . '.' . $slika_ext;

    if ($ime != "" && $slug != "" && $opis != "") {
        $product_querry = "INSERT INTO artikli (category_id, name, slug, small_description, description, orginal_price, selling_price, qty, meta_title, meta_description, meta_keywords,status, trending, novo, image) 
        VALUES ('$category_id','$ime','$slug', '$kratki_opis', '$opis', '$prava_cijena', '$prodajna_cijena', '$qty', '$meta_title', '$meta_description', '$meta_keywords', '$status', '$trending', '$filename' )";

        $product_querry_run = mysqli_query($conn, $product_querry);

        if ($product_querry_run) {
            move_uploaded_file($_FILES['slika']['tmp_name'], $path . '/' . $filename);
            redirect("../admin/dodajArtikl.php", "Artikl uspiješno dodan");
        } else {
            redirect("../admin/dodajArtikl.php", "Nešto nije u redu");
        }
    } else {
        redirect("../admin/dodajArtikl.php", "Popuniti sva polja");
    }
} else if (isset($_POST['update_product_btn'])) {
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $ime = $_POST['ime'];
    $slug = $_POST['slug'];
    $kratki_opis = $_POST['kratki_opis'];
    $opis = $_POST['opis'];
    $prava_cijena = $_POST['prava_cijena'];
    $prodajna_cijena = $_POST['prodajna_cijena'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ?  '1' : '0';
    $trending = isset($_POST['trending']) ?  '1' : '0';
    $novo = isset($_POST['novo']) ?  '1' : '0';

    $path = "../uploads";

    $new_image = $_FILES['slika']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != "") {
        // $update_filename = $new_image;
        $slika_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $slika_ext;
    } else {
        $update_filename = $old_image;
    }
    $update_product_query = "UPDATE artikli SET category_id ='$category_id', name='$ime',slug ='$slug',small_description ='$kratki_opis' , description='$opis', orginal_price ='$prava_cijena', selling_price ='$prodajna_cijena' , 
   qty ='$qty', meta_title ='$meta_title',meta_description ='$meta_description', meta_keywords ='$meta_keywords' , status ='$status', trending ='$trending', novo ='$novo' ,image = '$update_filename'  WHERE id='$product_id'";
    $update_product_query_run = mysqli_query($conn, $update_product_query);

    if ($update_product_query_run) {
        if ($_FILES['slika']['name'] != "") {
            move_uploaded_file($_FILES['slika']['tmp_name'], $path . '/' . $update_filename);
            if (file_exists("../uploads/" . $old_image)) {
                unlink("../uploads/" . $old_image);
            }
        }
        redirect("artikli.php", "Proizvod uspješno izmjenjen");
    } else {
        redirect("edit_product.php?id=$product_id", "Postoji neka greška!");
    }
} else if (isset($_POST['delete_product_btn'])) {

    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $product_query = "SELECT * FROM artikli WHERE id='$product_id'";
    $product_querry_run = mysqli_query($conn, $product_query);
    $product_data = mysqli_fetch_array($product_querry_run);
    $image = $product_data['image'];

    $delete_query = "DELETE FROM artikli WHERE id='$product_id'";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {

        if (file_exists("../uploads/" . $image)) {
            unlink("../uploads/" . $image);
        }
        // redirect("artikli.php", "Proizvod je uspješno obrisan");
        echo 200;
        exit();
    } else {
        // redirect("artikli.php", "Nije uspješno obrisan proizvod");
        echo 500;
        exit();
    }
} else {
    header('Location: ../index.php');
}
