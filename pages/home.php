<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../globals.css">
</head>

<body>
    <?php require_once "../components/header.inc.php" ?>

    <main><?php
            echo $_SESSION["isAdmin"] ?></main>

    <?php require_once "../components/footer.inc.php" ?>
</body>

</html>