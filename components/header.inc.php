<?php
require_once __DIR__ . "\..\utils\user.util.php";
?>

<header>
  <h1><a href="../index.php">Cantina</a></h1>
  <ul>
    <?php
    if (UtilUser::isAuthenticated()) {
    ?>
      <li><a href="../index.php">Home</a></li>
      <?php
      if (UtilUser::isAdmin()) {
      ?>
        <li><a href="../pages/registerUsers.php">Registro de usuários</a></li>
      <?php
      }
      ?>
      <li><a href="../pages/registerNews.php">Registro de notícias</a></li>
      <li><a href="../actions/logout.action.php">Sair</a></li>
    <?php
    } else {
    ?>
      <li><a id="login" href="../pages/login.html">Login</a></li>
    <?php
    }
    ?>
  </ul>
</header>