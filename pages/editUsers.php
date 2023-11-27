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
	<title>Editar usuários - Cantina</title>

	<link rel="stylesheet" href="../globals.css">
	<link rel="stylesheet" href="./styles/registerUsers.css">
</head>

<body>
	<?php require_once "../components/header.inc.php" ?>

	<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		require_once __DIR__ . "/../classes/r.class.php";
		R::setup("mysql:host=localhost;dbname=cantina", "root", "");

		$user = R::load('users', $id);

		if ($user->id) {
			switch ($user->profile) {
				case 0:
					$profileUser = "admin";
					break;
				case 1:
					$profileUser = "manager";
					break;
				case 2:
					$profileUser = "cashier";
					break;
				case 3:
					$profileUser = "client";
					break;
			}
	?>
			<main>
				<h1>Edição de Usuários</h1>

				<form action="../actions/editUsers.action.php" method="post">
					<input type="hidden" name="id" value="<?= $user->id ?>">
					<div class="label-input">
						<label for="name">Nome: </label>
						<input type="text" name="name" id="name" value="<?= $user->name ?>" required>
					</div>
					<div class="label-input">
						<label for="email">Email: </label>
						<input type="email" name="email" id="email" value="<?= $user->email ?>" required>
					</div>
					<div class="label-check">
						<?php
						if (UtilUser::isAdmin()) {
						?>
							<div>
								<label for="isAdmin">Administrador: </label>
								<input type="radio" name="profile" id="isAdmin" value="admin" <?php if ($profileUser === "admin") echo "checked" ?>>
							</div>
							<div>
								<label for="isManager">Gerente: </label>
								<input type="radio" name="profile" id="isManager" value="manager" <?php if ($profileUser === "manager") echo "checked" ?>>
							</div>
						<?php
						}
						?>
						<div>
							<label for="isCashier">Caixa: </label>
							<input type="radio" name="profile" id="isCashier" value="cashier" <?php if ($profileUser === "cashier") echo "checked" ?>>
						</div>
						<div>
							<label for="isClient">Cliente: </label>
							<input type="radio" name="profile" id="isClient" value="client" <?php if ($profileUser === "client") echo "checked" ?>>
						</div>
					</div>
					<button type="submit">Registrar</button>
				</form>
			</main>
	<?php
		} else {
			echo "<main><h1>Usuário não encontrado</h1></main>";
		}
	}
	?>

	<?php require_once "../components/footer.inc.php" ?>
</body>

</html>