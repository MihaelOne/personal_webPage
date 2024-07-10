<!-- index.php -->
<?php
include_once("controller/ShopController.php");

$ShopController = new ShopController();

$ShopController->invoke();
?>