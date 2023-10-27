<?php
require_once __DIR__ . "\..\utils\user.util.php";
?>

<header>
  <h1><a href="../index.php">Cantina</a></h1>
  <ul>
    <?php
    if (Util::isAuthenticated()) {
    ?>
      <li><a href="../index.php">Home</a></li>
      <?php
      if (Util::isAdmin()) {
      ?>
        <li><a href="../pages/registerUsers.php">Registro de usuários</a></li>
        <li><a href="">Registro de notícias</a></li>
      <?php
      }
      ?>
      <li><a href="../actions/logout.php">Sair</a></li>
    <?php
    } else {
    ?>
      <li><a id="login" href="../pages/login.html">Login</a></li>
    <?php
    }
    ?>
  </ul>
</header>