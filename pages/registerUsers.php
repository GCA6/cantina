<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cantina - Registro de Usuários</title>

	<link rel="stylesheet" href="../globals.css">
	<link rel="stylesheet" href="./styles/registerUsers.css">
</head>

<body>
	<?php require_once "../components/header.inc.php" ?>

	<main>
		<h1>Registro de Usuários</h1>

		<form action="../actions/registerUser.php" method="post">
			<div class="label-input">
				<label for="name">Nome: </label>
				<input type="text" name="name" id="name" required>
			</div>
			<div class="label-input">
				<label for="email">Email: </label>
				<input type="email" name="email" id="email" required>
			</div>
			<div class="label-input">
				<label for="password">Senha: </label>
				<input type="password" name="password" id="password" required>
			</div>
			<div class="label-check">
				<label for="isAdmin">Administrador: </label>
				<input type="checkbox" name="isAdmin" id="isAdmin">
			</div>
			<button type="submit">Registrar</button>
		</form>
	</main>

	<?php require_once "../components/footer.inc.php" ?>
</body>

</html>