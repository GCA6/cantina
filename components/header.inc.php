<?php
$isLogged = false
?>

<header>
  <h1><a href="../index.php">Cantina</a></h1>
  <ul>
    <?php
    if ($isLogged) {
    ?>
      <li><a href="">Registro de usuários</a></li>
      <li><a href="">Registro de produtos</a></li>
    <?php
    } else {
    ?>
      <li><a id="login" href="../pages/login.html">Login</a></li>
    <?php
    }
    ?>
  </ul>
</header>