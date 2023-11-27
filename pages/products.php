<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Produtos - Cantina</title>

	<link rel="stylesheet" href="../globals.css">
	<link rel="stylesheet" href="./styles/products.css">
</head>

<body>
	<?php require_once "../components/header.inc.php" ?>

	<main>
		<div class="box-products">
			<h1>Produtos</h1>

			<div class="products">
				<ul>
					<?php
					require_once "../utils/products.util.php";
					UtilProducts::getProducts();
					?>
				</ul>
			</div>
		</div>
	</main>

	<?php require_once "../components/footer.inc.php" ?>
</body>

</html>