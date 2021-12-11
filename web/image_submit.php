<?php
function thumb($src, $dest, $width2,$filetype) {
                if($filetype == "jpg")
                {
                    $source_image = imagecreatefromjpeg($src);
                }
                if($filetype == "png")
                {
                    $source_image = imagecreatefrompng($src);
                }
                $width = imagesx($source_image);
                $height = imagesy($source_image);
                $height2 = 125;
                $virtual_image = imagecreatetruecolor($width2, $height2); 
                imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $width2, $height2, $width, $height);
                if($filetype == "jpg")
                {
                    imagejpeg($virtual_image,$dest);
                }
                if($filetype == "png")
                {
                    imagepng($virtual_image,$dest);
                }
            };
            function watermark($src,$dest,$wmtext,$filetype) {
                if($filetype == "jpg")
                {
                    $source_image = imagecreatefromjpeg($src);
                    $targetLayer = imagecreatefromjpeg($src);
                }
                if($filetype == "png")
                {
                    $source_image = imagecreatefrompng($src);
                    $targetLayer = imagecreatefrompng($src);
                }
                $width2  = imagesx($source_image);
                $height2 = imagesy($source_image);
                $virtual_image = imagecreatetruecolor($width2, $height2);
                imagecopyresampled($virtual_image, $targetLayer, 0, 0, 0, 0, $width2, $height2, $width2, $height2);
                $watermarkColor = imagecolorallocate($virtual_image, 191,191,191);
                imagestring($virtual_image, 5, 130, 117, $wmtext, $watermarkColor);
                if($filetype == "jpg")
                {
                    imagejpeg($virtual_image,$dest);
                }
                if($filetype == "png")
                {
                    imagepng($virtual_image,$dest);
                }
                imagedestroy($targetLayer);
                imagedestroy($virtual_image);
            };
            $directory = "images/";
            $uploadOk = 1;
            if(isset($_POST["submit"])) {
            $image = $_FILES["fileToUpload"]["name"]; 
            $target_file = $directory . basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $WaterMarkText = $_POST['watermarkToUpload'];
            if(isset($_POST['radio']))
                {
                    $radio = $_POST['radio'];
                }
            if(!isset($_POST['radio']))
            {
                $radio = "public";
            }
            $autor = $_POST['autorToUpload'];
            $tytul = $_POST['tytulToUpload'];
        if ($_FILES["fileToUpload"]["size"] > 1048576) {
            echo "<p> TWÓJ PLIK JEST WIĘKSZY NIŻ 1MB </p>";
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png"){
            echo "<p>DOZWOLONE SĄ TYLKO TYPY PLIKÓW JPG I PNG</p>";
            $uploadOk = 0;
        }
        if($uploadOk == 1) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
                echo "<p>TWOJE ZDJĘCIE ZOSTAŁO WYSŁANE</p>";
                $img="images/".$image;
                $WaterMarkText = $_POST['watermarkToUpload'];
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->insert(['filename'=>$image, 'tytul'=>$tytul,'autor'=>$autor,'radio'=>$radio]);
                $manager->executeBulkWrite('wai.images',$bulk);
                thumb($img,'images/miniatura'.$image,200,$imageFileType);
                watermark($img,'images/watermark'.$image,$WaterMarkText,$imageFileType);
            }
            else
                echo "<p>TWOJE ZDJĘCIE NIE ZOSTAŁO WYSŁANE</p>";
        }
        else
            echo "<p>TWOJE ZDJĘCIE NIE ZOSTAŁO WYSŁANE</p>";
        
    }
?>