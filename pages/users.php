<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Usuários - Cantina</title>

	<link rel="stylesheet" href="../globals.css">
	<link rel="stylesheet" href="./styles/users.css">

	<script src="https://kit.fontawesome.com/af4212dbbd.js" crossorigin="anonymous"></script>
</head>

<body>
	<?php require_once "../components/header.inc.php" ?>

	<main>
		<h1>Usuários</h1>

		<div class="register-user">
			<a href="./registerUsers.php">Cadastrar usuário</a>
		</div>
		<table>
			<thead>
				<tr>
					<th>Nome</th>
					<th>Email</th>
					<th>Perfil</th>
					<th>Editar</th>
				</tr>
			</thead>
			<tbody>
				<?php
				require_once "../utils/user.util.php";
				UtilUser::getUsers();
				?>
			</tbody>
		</table>
	</main>

	<?php require_once "../components/footer.inc.php" ?>

	<script>
		var cells = document.getElementsByClassName("conteudo");

		for (var i = 0; i < cells.length; i++) {
			var conteudo = cells[i].innerHTML;

			conteudo = conteudo.replace(/@/g, '<span class="at-font">@</span>');

			cells[i].innerHTML = conteudo;
		}
	</script>
</body>

</html>