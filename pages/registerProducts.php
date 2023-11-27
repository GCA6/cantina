<?php
require_once "../utils/user.util.php";

if (UtilUser::isAdmin() === false && UtilUser::isManager() === false) {
	header("location: ../index.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cantina - Registro de Notícias</title>

	<link rel="stylesheet" href="../globals.css">
	<link rel="stylesheet" href="./styles/registerProducts.css">
</head>

<body>
	<?php require_once "../components/header.inc.php" ?>

	<main>
		<h1>Registro de Produtos</h1>

		<form action="../actions/registerProducts.action.php" method="post">
			<div class="label-input">
				<label for="name">Nome: </label>
				<input type="text" name="name" id="name" required>
			</div>
			<div class="label-input">
				<label for="value">Valor (R$): </label>
				<input type="number" name="value" id="value" step="0.01" required>
			</div>
			<div class="label-input">
				<label for="description">Descrição: </label>
				<textarea name="description" id="description" cols="20" rows="5" required></textarea>
			</div>
			<button type="submit">Registrar</button>
		</form>
	</main>

	<?php require_once "../components/footer.inc.php" ?>
</body>

</html>