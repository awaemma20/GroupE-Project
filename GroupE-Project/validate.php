<?php
include ("connection.php");
if(empty($_POST["studentid"])|| empty($_POST["psw"])){
    echo "both fields required";
    
} else{
    $student_id=$_POST["studentid"];
    $password=$_POST["psw"];
}
$sql = "SELECT user_id from users where student_id ='$student_id' AND password = '$password'";
$result = mysqli_query($db,$sql);

if(mysqli_num_rows($result)==1){
    header("location:profilepage.php");
} else{
    echo"incorrect username and password";
}

?>