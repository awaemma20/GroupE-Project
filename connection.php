
<?php
  $servername="localhost";
  $dbname="rguintlstudentcommunity";
  $username="root";
  $password="";


  $db=new mysqli($servername,$username,$password,$dbname);

  if ($db->connect_error){
      die("connection failed: " . $db->connect_error);
  }
  

?>

