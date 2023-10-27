<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cantina - Registro de Notícias</title>

	<link rel="stylesheet" href="../globals.css">
	<link rel="stylesheet" href="./styles/registerNews.css">
</head>

<body>
	<?php require_once "../components/header.inc.php" ?>

	<main>
		<h1>Registro de Notícias</h1>

		<form action="../actions/registerNews.action.php" method="post">
			<div class="label-input">
				<label for="title">Título: </label>
				<input type="text" name="title" id="title" required>
			</div>
			<div class="label-input">
				<label for="content">Conteúdo: </label>
				<textarea name="content" id="content" cols="20" rows="5" required></textarea>
			</div>
			<button type="submit">Registrar</button>
		</form>
	</main>

	<?php require_once "../components/footer.inc.php" ?>
</body>

</html>