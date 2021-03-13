<?php

include('connection.php');

$number = $_POST['number'];
$firstName = $_POST['firstName'];
$lastName= $_POST['lastName'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];


$target_dir = "cv/";
    $target_file = $target_dir . basename($_FILES["filetoupload"] ["name"]);
    $uploadok = 1;
    $filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if($_FILES["filetoupload"]["size"] > 500000){
        echo "Sorry, your file is too large.";
    }elseif(empty($firstName) || empty($password) || empty($email)){
        echo "All fields are required!!";
    }elseif($filetype != "jpeg" && $filetype != "png" && $filetype != "jpg"){
        echo "Sorry, only jpeg, png and svg are allowed";
           }else{
            if (move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_file)) {


    $stmt = "INSERT INTO register(student_id, firstname, lastname, gender, email, password,cv)
        values('$number','$firstName','$lastName','$gender','$email','$password','$target_file')";
        if ($db -> query($stmt)=== true){
            echo "Registration Successful";
        } else{
            echo"ERROR: fill in empty fields $stmt. " . $db->error;
        }

        $db-> close();
            }
        }
        
?>