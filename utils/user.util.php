<?php
class UtilUser
{
    public static function registerUser($user)
    {
        require_once "../classes/r.class.php";

        R::setup("mysql:host=localhost;dbname=cantina", "root", "");

        $existingUser = R::findOne("users", "email = ?", [$user->email]);


        if (!$existingUser) {
            $userDB = R::dispense("users");
            $userDB->name = $user->name;
            $userDB->email = $user->email;
            $hashedPassword = hash("sha256", $user->password);
            $userDB->password = $hashedPassword;
            $userDB->isAdmin = $user->isAdmin;

            R::store($userDB);
            R::close();
        }
    }

    public static function authenticateUser($email, $password)
    {
        require_once "../classes/r.class.php";

        $hashedPassword = hash("sha256", $password);

        if (!R::testConnection()) {
            R::setup("mysql:host=localhost;dbname=cantina", "root", "");
        }

        $user = R::findOne("users", "email = ? AND password = ?", [$email, $hashedPassword]);
        R::close();

        if ($user) {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }

            $_SESSION["name"] = $user->name;
            $_SESSION["isAdmin"] = $user->isAdmin;

            header("Location: ../index.php");
            exit();
        } else {
            header("Location: ../errors/invalidCredentials.error.php");
            exit();
        }
    }

    public static function logoutUser()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        session_destroy();
        header("Location: ../index.php");
        exit();
    }

    public static function isAuthenticated()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        return isset($_SESSION["name"]) ? $_SESSION["name"] : false;
    }

    public static function isAdmin()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        return isset($_SESSION["isAdmin"]) ? $_SESSION["isAdmin"] : false;
    }
}
