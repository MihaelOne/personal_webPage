<!-- model/shopModel.php -->
<?php
class Artikl
{
    public $id, $slika, $ime, $kategorija, $cijena, $opis;
    private $pdo;
    public function __construct($id = null, $slika = null, $ime = null, $kategorija = null, $cijena = null, $opis = null)
    {
        $this->id = $id;
        $this->slika = $slika;
        $this->ime = $ime;
        $this->kategorija = $kategorija;
        $this->cijena = $cijena;
        $this->opis = $opis;

        $this->pdo = ShopController::$pdo;
    }
    public function getArtikli()
    {
        $sql = "SELECT * FROM hrana";
        $query = $this->pdo->prepare($sql);
        if (!$query) {
            echo "\nPDO::errorInfo():\n";
            print_r($this->pdo->errorInfo());
        }
        $query->execute();
        $result = $query->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Artikl::class);
        return $result ? $result : array();
    }

    public function obrisiArtikl($id)
    {
        $sql = "DELETE  FROM hrana WHERE id=?";
        $query = $this->pdo->prepare($sql);
        $query->execute([$id]);
    }
    public function unesiArtiklUBazu()
    {
        $sql = "INSERT INTO hrana (slika, ime, kategorija, cijena, opis) VALUES (?,?,?,?,?)";
        $query = $this->pdo->prepare($sql);
        $query->execute([$_GET['slika'], $_GET['ime'], $_GET['kategorija'], $_GET['cijena'], $_GET['opis']]);
    }
    public function getArtikl($id)
    {

        $sql = "SELECT * FROM hrana WHERE id=?;";
        $query = $this->pdo->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Artikl::class);
        return $result[0];
    }
    public function editArtiklinDatabase()
    {
        $sql = "UPDATE hrana SET slika=?, ime=?, kategorija=?, cijena=?, opis=? WHERE id=?";
        $query = $this->pdo->prepare($sql);
        $query->execute([$_GET['slika'], $_GET['ime'], $_GET['kategorija'], $_GET['cijena'], $_GET['opis'], $_GET['ID']]);
    }
    public function getFindArtikl($ime, $kategorija)
    {

        if (empty($ime) && empty($kategorija)) {
            $sql = "SELECT * FROM hrana;";
            $query = $this->pdo->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Artikl::class);
            return $result;
        } elseif (empty($kategorija)) {
            $sql = "SELECT * FROM hrana WHERE ime LIKE ? ;";
            $query = $this->pdo->prepare($sql);
            $query->execute(['%' . $ime . '%']);
            $result = $query->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Artikl::class);
            return $result;
        } else {
            $sql = "SELECT * FROM hrana WHERE ime LIKE ? AND kategorija LIKE ?;";
            $query = $this->pdo->prepare($sql);
            $query->execute(['%' . $ime . '%', '%' . $kategorija . '%']);
            $result = $query->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Artikl::class);
            return $result;
        }
    }
}
?>