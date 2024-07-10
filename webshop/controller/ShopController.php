<!-- controller\ShopController.php  -->
<?php
include_once("model/shopModel.php");
class ShopController
{
    public $model;
    public static $pdo = null;
    public function __construct()
    {

        $dsn = "mysql:host=localhost;dbname=hrana;charset=UTF8";
        $user = "root";
        $password = "";

        try {
            ShopController::$pdo = new PDO($dsn, $user, $password);

            if (ShopController::$pdo) {
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $this->model = new Artikl();
    }
    function invoke()
    {
        if (!empty($_GET['action'])) {
            switch ($_GET['action']) {
                case 'delete':
                    $this->model->obrisiArtikl($_GET['id']);
                    break;
                case 'CreateForma':
                    include 'view/Create.php';
                    return;
                case 'CreateG';
                    $this->model->unesiArtiklUBazu();
                    break;
                case 'EditForma':
                    $Artikli = $this->model->getArtikl($_GET['id']);
                    include 'view/Edit.php';
                    return;
                case 'EditG':
                    $this->model->editArtiklinDatabase();
                    break;
                case 'DetailsG':
                    $Artikli = $this->model->getArtikl($_GET['id']);
                    include 'view/Details.php';
                    return;
                case 'SearchG':
                    $Artikli = $this->model->getFindArtikl($_GET['ime'], $_GET['kategorija']);
                    include 'view/webshop.php';
                    return;
            }
        }

        $Artikli = $this->model->getArtikli();
        var_dump($Artikli); // Debugging code
        $data = array('Artikli' => $Artikli);
        extract($data);
        include 'view/webshop.php';
    }
}
?>