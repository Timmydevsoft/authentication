<?php
   $conn = mysqli_connect('localhost','Timmy','gittimmy1908','authorization');

   if(!$conn){
    echo 'connection error: ' . mysqli_connect_error();
   }

?>