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
    <h1>LOGOWANIE</h1>
    <br>
    <div class="topnav">
        <a href="index.html">Home</a>
        <span>Sceny : </span>
        <a href="lol.html">League of Legends</a>
        <a href="csgo.html">Counter Strike</a>
		<a href="upload.php">Przesyłanie Plików</a>
        <a href="imagegalery.php">Galeria Zdjęć</a>
        <a class="active" href="loginform.php">Logowanie</a>
        <a href="search.html">Wyszukiwanie</a>
    </div>
    <div>
        <?php require 'login.php'; ?>
    </div>
</body>
</html>