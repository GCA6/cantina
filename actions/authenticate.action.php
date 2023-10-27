<?php
require_once "../setup/setup.admin.php";
require_once "../utils/user.util.php";

$email = $_POST["email"];
$password = $_POST["password"];

UtilUser::authenticateUser($email, $password);
