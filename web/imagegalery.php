<?php
require 'mongo.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <?php
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="galery.css">
    <script type="text/javascript" src="path-to-javascript-file.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title> PROJEKT WAI&HiH </title>
</head>
<body>
    <div class="header">
        <h1>GALERIA OBRAZÓW</h1>
        <br>
    </div>
    <div class="topnav">
        <a href="index.html">Home</a>
        <span>Sceny : </span>
        <a href="lol.html">League of Legends</a>
        <a href="csgo.html">Counter Strike</a>
		<a href="upload.php">Przesyłanie Plików</a>
        <a class="active" href="imagegalery.php">Galeria Zdjęć</a>
        <a href="loginform.php">Logowanie</a>
        <a href="search.html">Wyszukiwanie</a>
    </div>

    <div class="row">
        <div class="column">
            <table>
            <?php include 'image_paging.php'?>
            </table>   
        </div>

        <div class="column">
        <ul class="pagination">
        </ul>
        </div>
    </div>
    <footer>
            <a href="?pageno=1">First</a>
            <span class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
            </span>
            <span class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
            </span>
            <a href="?pageno=<?php echo $total_pages; ?>">Last</a>
    </footer>
</body>
</html>