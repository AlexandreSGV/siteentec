<?php

$line= $posts[0]['User'];
$this->CSV->addRow(array_keys($line));
 foreach ($posts as $post)
 {
   $line= $post['User']; 
   $this->CSV->addRow($line);
 }
 $filename='users';
 echo  $this->CSV->render($filename);
?>
