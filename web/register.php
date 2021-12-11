<?php
$logged2=1;
$logged1=1;
if(isset($_POST["register"])) {
    $email = $_POST['mailToUpload'];
    $login = $_POST['loginToUpload'];
    $password = $_POST['passwordToUpload'];
    $rpassword = $_POST['rpasswordToUpload'];
    if($password != $rpassword)
    {
        echo "<p>HASŁA NIE SĄ TAKIE SAME</p>";
    }
    else if(($email==false)||($login==false)||($password==false))
    {
        echo "<p>NIEKTÓRE POLA WYMAGANE NIE ZOSTAŁY WYPEŁNIONE</p>";
    }
    else{
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $filter1=['login' => $login];
            $options1=array();
            $query1 = new MongoDB\Driver\Query($filter1,$options1);
            $rows1 = $manager->executeQuery('wai.users',$query1);
            $filter2=['email' => $email];
            $options2=array();
            $query2 = new MongoDB\Driver\Query($filter2,$options2);
            $rows2 = $manager->executeQuery('wai.users',$query2);
            foreach ($rows1 as $r1)
            {
                $logged1=0;
            }
            foreach ($rows2 as $r2)
            {
                $logged2=0;
            }
            if($logged1==0)
            {
                echo "<p>LOGIN JUŻ ISTNIEJE</p>";
            }
            else if($logged2==0)
            {
                echo "<p>EMAIL JUŻ ISTNIEJE</p>";
            }
            else
            {
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->insert(['email'=>$email, 'login'=>$login,'password'=>$hash]);
                $manager->executeBulkWrite('wai.users',$bulk);
                echo "<p>REJESTRACJA UDANA</p>";
            }
    }            
}
?>