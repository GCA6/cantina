<?php

require_once "../utils/user.util.php";
require_once "../classes/user.class.php";

$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$profileRequest = isset($_POST["profile"]);

switch ($_POST["profile"]) {
	case "admin":
		$profile = 0;
		break;
	case "manager":
		$profile = 1;
		break;
	case "cashier":
		$profile = 2;
		break;
	case "client":
		$profile = 3;
		break;
}

$user = new User();
$user->id = $id;
$user->name = $name;
$user->email = $email;
$user->profile = $profile;

UtilUser::editUser($user);
header("Location: ../pages/users.php");
exit();
