<?php
$number = $_POST['number'];
$firstName = $_POST['firstName'];
$lastName= $_POST['lastName'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];

//db connection
$conn =new mysqli('localhost','root','root','group_e_project');
if($conn->connect_error) {
    die('connecion failed : '.$conn->connect_error);
} else{
    $stmt =$conn->query("insert into registration(student_id, fist_name, last_name, gender, email, password)
        values('$number','$firstName','$lastName','$gender','$email','$password')");
        // $stmt->bind_param($number, $firstName, $lastName, $gender, $email,$password);
        // $stmt->execute();
        echo "Registration Successfullly..."; 
        // $stmt->close();
        $conn-close();
}

?>
