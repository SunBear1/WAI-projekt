<?php
require 'mongo.php';
$q=$_GET["q"];
if (strlen($q)>0) { 
  $filter=['tytul' => array('$regex' => $q)];
  $options=array();
  $query = new MongoDB\Driver\Query($filter,$options);
  $rows = $manager->executeQuery('wai.images',$query);
  $i = 0;
  foreach ($rows as $r)
  {
    echo '<img src="images/miniatura'.$r->filename.'">    ';
    $i = $i + 1;
  }
  if ($i == 0)
          echo '<p>Brak zdjęć o takim tytule</p>';
}
else
    echo 'Brak zdjęć o takim tytule';
?>