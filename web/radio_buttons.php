<?php
if(isset($_SESSION['userlogin']))
    {
    ?>
        <p><input type="radio" name="radio" id="r1" value="private" > Private</p>
        <p><input type="radio" name="radio" id="r2" value="public">Public</p>
        <br>
    <?php
    }
?>