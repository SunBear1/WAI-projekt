<?php
require 'mongo.php';
$user=NULL;
if(isset($_SESSION['userlogin']))
    $user=$_SESSION['userlogin'];

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title> PROJEKT WAI&HiH </title>
</head>
<body>
    <h1>PRZESYŁANIE PLIKÓW</h1>
    <div class="topnav">
        <a href="index.html">Home</a>
        <span>Sceny : </span>
        <a href="lol.html">League of Legends</a>
        <a href="csgo.html">Counter Strike</a>
		<a class="active" href="upload.php">Przesyłanie Plików</a>
        <a href="imagegalery.php">Galeria Zdjęć</a>
        <a href="loginform.php">Logowanie</a>
        <a href="search.html">Wyszukiwanie</a>
    </div>
    <br>
        <?php include 'image_submit.php'; ?>
        <h2>Prześlij zdjęcie, jego autora i tytuł :</h2>
          <form action="upload.php" method="post" enctype="multipart/form-data">
                <p>Tytuł :  <input type="text" name="tytulToUpload" id="tytulToUpload"></p>
                <p>Autor :  <input type="text" name="autorToUpload" id="autorToUpload" <?php echo 'value='.$user ?>></p>
                <p>Obraz :  <input type="file" name="fileToUpload" id="fileToUpload"></p>
                <p>Znak wodny :  <input type="text" name="watermarkToUpload" id="watermarkToUpload">  </p>
                <?php include 'radio_buttons.php'; ?>
                <input type="submit" value="WYŚLIJ" name="submit">   
            </form>
            <div>
    </div>
</body>
</html>