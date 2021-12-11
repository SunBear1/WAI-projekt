<?php
        if((!isset($_SESSION['userlogin'])) && (isset($_POST["login"])))
            {
                    $logged=0;
                    $login = $_POST['userloginToUpload'];
                    $password = $_POST['userpasswordToUpload'];
                    $filter=['login' => $login];
                    $options=array();
                    $query = new MongoDB\Driver\Query($filter,$options);
                    $rows = $manager->executeQuery('wai.users',$query);
                    foreach ($rows as $r)
                    {
                        if(password_verify($password, $r->password))
                        {   
                            $logged=1;
                            $_SESSION["userlogin"]=$r->login;
                            echo '<h2> JESTEŚ ZALOGOWANY JAKO : '.$r->login.'</h2>';
                            ?>
                            <form action="loginform.php" method="post">
                            <input type="submit" value="WYLOGUJ" name="logout">
                            </form>
                            <?php
                            break;
                        }
                    }
                    if($logged==0)
                    {
                        echo "<p>BŁĘDNE DANE, SPRÓBUJ PONOWNIE</p>";
                        ?>
                        <h2>ZALOGUJ SIĘ</h2>
                    <form action="loginform.php" method="post">
                    <p>Login :  <input type="text" name="userloginToUpload" id="loginToUpload"></p>
                    <p>Hasło :  <input type="password" name="userpasswordToUpload" id="passwordToUpload"> </p>
                    <input type="submit" value="ZALOGUJ" name="login">
                    <p><a href=registerform.php>ZAREJESTRUJ SIĘ</a></p>
                    <?php
                    }
            }
            else if((isset($_SESSION['userlogin'])) && (isset($_POST["logout"])))
            {
                echo '<h2>UŻYTKOWNIK '.$_SESSION["userlogin"].' ZOSTAŁ WYLOGOWANY</h2>';
                echo'<p><a href=loginform.php>ZALOGUJ SIĘ</a></p>';
                unset($_SESSION["userlogin"]);      
            }
            else if((!isset($_SESSION['userlogin'])) && (!isset($_POST["login"])))
            {
                ?>
                    <h2>ZALOGUJ SIĘ</h2>
                    <form action="loginform.php" method="post">
                    <p>Login :  <input type="text" name="userloginToUpload" id="loginToUpload"></p>
                    <p>Hasło :  <input type="password" name="userpasswordToUpload" id="passwordToUpload"> </p>
                    <input type="submit" value="ZALOGUJ" name="login">
                    <p><a href=registerform.php>ZAREJESTRUJ SIĘ</a></p>
                <?php
            }
            else if((isset($_SESSION['userlogin'])) && (!isset($_POST["logout"])))
            {
                echo '<h2> JESTEŚ ZALOGOWANY JAKO : '.$_SESSION["userlogin"].'</h2>';
                ?>
                <form action="loginform.php" method="post">
                    <input type="submit" value="WYLOGUJ" name="logout">
                </form>     
                <?php
            }
            ?>
              