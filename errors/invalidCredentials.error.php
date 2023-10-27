<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credenciais Inválidas!</title>

    <link rel="stylesheet" href="../globals.css">
    <link rel="stylesheet" href="./styles/invalidCredentials.error.css">
</head>

<body>
    <main>
        <p>As credenciais inseridas são inválidas! Você será redirecionado novamente para a página de login em 3 segudos.</p>
    </main>
    <?php
    header("Refresh: 3; url=../pages/login.html");
    ?>
</body>

</html>