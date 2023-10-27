<?php
require_once "../classes/user.class.php";
require_once "../utils/user.util.php";

$user = new User();
$user->name = "admin";
$user->email = "admin@admin.com";
$user->password = "admin";
$user->isAdmin = true;

Util::registerUser($user);
