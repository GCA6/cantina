<?php

require_once "../utils/products.util.php";
require_once "../classes/products.class.php";

$name = $_POST["name"];
$value = $_POST["value"];
$description = $_POST["description"];

$product = new Product();
$product->name = $name;
$product->value = number_format($value, 2, ',', '.');
$product->description = $description;

UtilProducts::registerProduct($product);
header("Location: ../pages/registerProducts.php");
exit();
