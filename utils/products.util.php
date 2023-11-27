<?php

class UtilProducts
{
	public static function registerProduct($product)
	{
		require_once "../classes/r.class.php";

		R::setup("mysql:host=localhost;dbname=cantina", "root", "");

		$existingProduct = R::findOne("products", "email = ?", [$product->name]);


		if (!$existingProduct) {
			$productDB = R::dispense("products");
			$productDB->name = $product->name;
			$productDB->value = $product->value;
			$productDB->description = $product->description;

			if (session_status() !== PHP_SESSION_ACTIVE) {
				session_start();
			}

			R::store($productDB);
			R::close();
		}
	}

	public static function getProducts()
	{
		require_once __DIR__ . "/../classes/r.class.php";

		R::setup("mysql:host=localhost;dbname=cantina", "root", "");

		$products = R::findAll("products", "ORDER BY name ASC");

		if (count($products) > 0) {
			foreach ($products as $product) {
				echo "<li>";
				echo "<div class='name-value-ofprocuct'>";
				echo "<p>" . $product->name . "</p>";
				echo "<p>R$ " . $product->value . "</p>";
				echo "</div>";
				echo "<p class='description-product'>" . $product->description . "</p>";
				echo "</li>";
			}
		} else {
			echo "<p>Nenhum produto cadastrado</p>";
		}
	}
}
