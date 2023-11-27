<?php
require_once __DIR__ . "\..\utils\user.util.php";
?>

<header>
  <h1><a href="../index.php">Cantina</a></h1>
  <ul>
    <li><a href="../index.php">Home</a></li>
    <li><a href="../pages/products.php">Produtos</a></li>
    <li><a href="../index.php">Home</a></li>
    <li><a href="../pages/products.php">Produtos</a></li>
    <?php
    if (UtilUser::isAuthenticated()) {
    ?>
      <?php
      if (UtilUser::isManager() || UtilUser::isAdmin()) {
      ?>
        <li><a href="../pages/users.php">Usuários</a></li>
        <li><a href="../pages/registerNews.php">Registro de notícias</a></li>
        <li><a href="../pages/registerProducts.php">Registro de produtos</a></li>
      <?php
      }
      ?>
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