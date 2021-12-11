 <?php
                $no_of_records_per_page = 3;
                if (isset($_GET['pageno'])) {
                    $pageno = $_GET['pageno'];
                } else {
                    $pageno = 1;
                }
                $offset = ($pageno-1) * $no_of_records_per_page;
               $filter=array();
			$options=array();
			$query = new MongoDB\Driver\Query($filter,$options);
			$rows = $manager->executeQuery('wai.images',$query);
			$command = new MongoDB\Driver\Command(["count" => "images", "query" => []]);
			$result = $manager->executeCommand('wai', $command);
                $total_images_count = $result->toArray()[0]->n;
                $total_pages = ceil($total_images_count / $no_of_records_per_page);
                $i = 1;
                foreach ($rows as $r)
                {
                    if ($i > $offset && $i <= $offset + $no_of_records_per_page)
                    {
                                    if($r->radio == "public")
                                    {
                                        echo '<tr> <td> <a href="images/watermark'.$r->filename.'"> <img src="images/miniatura'.$r->filename.'"> </a> </td></tr>';
                                        echo '<tr><td><p> Autor : '.$r->autor.' </p> </tr></td>';
                                        echo '<tr><td><p> Tytuł : '.$r->tytul.' </p></tr></td>';
                                    }
                                    else if($r->radio == "private" && isset($_SESSION['userlogin']))
                                    {
                                        if(($r->autor == $_SESSION['userlogin']))
                                        {
                                            echo '<tr> <td> <a href="images/watermark'.$r->filename.'"> <img src="images/miniatura'.$r->filename.'"> </a> </td></tr>';
                                            echo '<tr><td><p> Autor : '.$r->autor.' </p> </tr></td>';
                                            echo '<tr><td><p> Tytuł : '.$r->tytul.' </p></tr></td>';
                                            echo '<tr><td><p> PRYWATNE </p></tr></td>';
                                        }
                                    } 
                    }
                    $i = $i + 1;
                }
?>