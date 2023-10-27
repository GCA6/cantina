<?php
class Util
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
            $userDB->password = $user->password;
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

            $_SESSION["email"] = $user->email;
            $_SESSION["isAdmin"] = $user->isAdmin;

            header("Location: home.php");
            exit();
        } else {
            header("Location: /cantina/errors/invalidCredentials.error.php");
            exit();
        }
    }

    public static function isAuthenticated()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        return isset($_SESSION["email"]) ? $_SESSION["email"] : false;
    }

    public static function isAdmin()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        return isset($_SESSION["isAdmin"]) ? $_SESSION["isAdmin"] : false;
    }
}
