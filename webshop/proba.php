<!-- proba.php -->

<?php
$dsn = "mysql:host=localhost;dbname=hrana;charset=UTF8";
$user = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $user, $password);
    echo "Uspješna veza s bazom podataka 'hrana'.";

    // Izvršavanje upita i ispisivanje rezultata
    $query = $pdo->query("SELECT * FROM hrana");
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        echo "ID: " . $row['id'] . "<br>";
        echo "<img src='" . $row['slika'] . "' alt='Slika'><br>";
        echo "Ime: " . $row['ime'] . "<br>";
        echo "Kategorija: " . $row['kategorija'] . "<br>";
        echo "Cijena: " . $row['cijena'] . "<br>";
        echo "Opis: " . $row['opis'] . "<br>";
        echo "<hr>";
    }
} catch (PDOException $e) {
    echo "Greška prilikom povezivanja s bazom podataka: " . $e->getMessage();
}
