<?php require 'mongo.php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="galery.css">
    <title> PROJEKT WAI&HiH </title>
</head>
<body>
    <h1>REJESTRACJA</h1>
    <div>
        <h2>Rejestracja</h2>
        <form action="registerform.php" method="post">
        <p>Adres email :  * <input type="email" name="mailToUpload" id="mailToUpload"></p>
        <p>Login :  * <input type="text" name="loginToUpload" id="loginToUpload"></p>
        <p>Hasło :  * <input type="password" name="passwordToUpload" id="passwordToUpload"></p>
        <p>Powtórz hasło :  * <input type="password" name="rpasswordToUpload" id="rpasswordToUpload"></p>
        <input type="submit" value="ZAREJESTRUJ" name="register">
        <p><a href=loginform.php>ZALOGUJ SIĘ</a></p>
        <p>* - wymagane pola</p>
        <?php require 'register.php'?>
        </form>
    </div>
</body>
</html>