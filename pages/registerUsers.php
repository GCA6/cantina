<?php
require_once "../utils/user.util.php";

if (UtilUser::isAdmin() == false || UtilUser::isManager() == false) {
	header("location: ../index.php");
	exit;
}
?>

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

		<form action="../actions/registerUser.action.php" method="post">
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
				<div>
					<label for="isAdmin">Administrador: </label>
					<input type="radio" name="profile" id="isAdmin" value="admin" required>
				</div>
				<div>
					<label for="isManager">Gerente: </label>
					<input type="radio" name="profile" id="isManager" value="manager" required>
				</div>
				<div>
					<label for="isCashier">Caixa: </label>
					<input type="radio" name="profile" id="isCashier" value="cashier" required>
				</div>
				<div>
					<label for="isClient">Cliente: </label>
					<input type="radio" name="profile" id="isClient" value="client" required>
				</div>
			</div>
			<button type="submit">Registrar</button>
		</form>
	</main>

	<?php require_once "../components/footer.inc.php" ?>

	<!-- <script>
		function validarForm() {
			// Verifique se pelo menos um dos radios está selecionado
			var radios = document.getElementsByName('profile');
			var checked = false;

			for (var i = 0; i < radios.length; i++) {
				if (radios[i].checked) {
					checked = true;
					break;
				}
			}

			if (!checked) {
				alert("Por favor, selecione pelo menos um perfil.");
				return false; // Impede o envio do formulário se nenhum radio estiver selecionado
			}

			return true; // Permite o envio do formulário se pelo menos um radio estiver selecionado
		}
	</script> -->
</body>

</html>