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

            $userDB->profile = $user->profile;

            $userDB->profile = $user->profile;

            R::store($userDB);
            R::close();
        }
    }

    public static function editUser($user)
    {
        require_once "../classes/r.class.php";

        R::setup("mysql:host=localhost;dbname=cantina", "root", "");

        $existingUser = R::load("users", $user->id);
        $existingUser->name = $user->name;
        $existingUser->email = $user->email;
        $existingUser->profile = $user->profile;

        R::store($existingUser);
        R::close();
    }

    public static function getUsers()
    {
        require_once __DIR__ . "/../classes/r.class.php";

        R::setup("mysql:host=localhost;dbname=cantina", "root", "");

        $users = R::findAll("users", "ORDER BY name ASC");

        foreach ($users as $user) {
            switch ($user->profile) {
                case 0:
                    $profileUser = "Administrador";
                    break;
                case 1:
                    $profileUser = "Gerente";
                    break;
                case 2:
                    $profileUser = "Caixa";
                    break;
                case 3:
                    $profileUser = "Cliente";
                    break;
            }

            echo "<tr>";
            echo "<td>" . $user->name . "</td>";
            echo "<td class='conteudo'>" . $user->email . "</td>";
            echo "<td>" . $profileUser . "</td>";
            if (UtilUser::isAdmin()) {
                echo "<td class='icon-editar'><a href='./editUsers.php?id=" . $user->id . "'><i class='fas fa-pencil-alt'></i></a></td>";
            } elseif (UtilUser::isManager()) {
                if ($user->profile == 2 || $user->profile == 3) {
                    echo "<td class='icon-editar'><a href='./editUsers.php?id=" . $user->id . "'><i class='fas fa-pencil-alt'></i></a></td>";
                } else {
                    echo "<td class='icon-editar'></td>";
                }
            }
            echo "</tr>";
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
            $_SESSION["profile"] = $user->profile;
            $_SESSION["profile"] = $user->profile;

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

        $profile = isset($_SESSION["profile"]) ? $_SESSION["profile"] : false;

        return $profile === "0" ? true : false;
    }

    public static function isManager()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $profile = isset($_SESSION["profile"]) ? $_SESSION["profile"] : false;

        return $profile === "1" ? true : false;
    }

    public static function isCashier()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $profile = isset($_SESSION["profile"]) ? $_SESSION["profile"] : false;

        return $profile === "2" ? true : false;
    }

    public static function isClient()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $profile = isset($_SESSION["profile"]) ? $_SESSION["profile"] : false;

        return $profile === "3" ? true : false;
        $profile = isset($_SESSION["profile"]) ? $_SESSION["profile"] : false;

        return $profile === "0" ? true : false;
    }

    public static function isManager()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $profile = isset($_SESSION["profile"]) ? $_SESSION["profile"] : false;

        return $profile === "1" ? true : false;
    }

    public static function isCashier()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $profile = isset($_SESSION["profile"]) ? $_SESSION["profile"] : false;

        return $profile === "2" ? true : false;
    }

    public static function isClient()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $profile = isset($_SESSION["profile"]) ? $_SESSION["profile"] : false;

        return $profile === "3" ? true : false;
    }
}
