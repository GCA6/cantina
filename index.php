<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cantina - Home</title>

    <link rel="stylesheet" href="../globals.css">
</head>

<body>
    <?php require_once "./components/header.inc.php"; ?>

    <main>
        <?php
        require_once "./utils/news.util.php";

        UtilNews::getNews();
        ?>
    </main>

    <?php require_once "./components/footer.inc.php" ?>
</body>

</html>