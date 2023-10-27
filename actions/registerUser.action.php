<?php

require_once "../utils/user.util.php";
require_once "../classes/user.class.php";

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$isAdmin = isset($_POST["isAdmin"]);

$user = new User();
$user->name = $name;
$user->email = $email;
$user->password = $password;
$user->isAdmin = $isAdmin;

UtilUser::registerUser($user);
header("Location: ../index.php");
exit();
