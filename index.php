<?php
include_once('includes/connection.php');
    $email = '';
    $password = '';
    $cpassword = '';
    $squestion = '';
    $sanswer = '';
    $error = '';
    $pass_error = '';
    $msg = '';

/* This line of code  is triggered when the sign up button is pressed*/
if(isset($_POST['signup'])){
	/* This lines of code  is set the user input to the below variables*/
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, md5($_POST['password']));
    $cpassword = mysqli_real_escape_string($db, md5($_POST['cpassword']));
    $squestion = mysqli_real_escape_string($db, $_POST['squestion']);
    $sanswer = mysqli_real_escape_string($db, $_POST['sanswer']);
    
    /* This line of code  checks that none of the input fields is empty upon submit*/
    if(empty($email) || empty($password) || empty($cpassword) || empty($squestion) || empty($sanswer)){
        $error = "<span class='failed-msg'>All fields are required!***</span>";
    }
    
    /* This line of code  ensures that password and confirm password are equal*/
    if($_POST['password'] != $_POST['cpassword']){
        $pass_error = "<span class='failed-msg'>Passwords do not match!***</span>";
    }
    
    
    /* This line of code  selects the email variable from the database table & ensures that email doesn't exist before'*/
    
    $choose = mysqli_query($db, "SELECT * FROM client_table WHERE email = '$email' LIMIT 1");
    $chosen = mysqli_num_rows($choose);
    
    
    /* This conditional statement means that if email exists and all fields are not empty and passwords match*/
    
    if($chosen == 1 && !$error && !$pass_error){
        $msg = "<span class='failed-msg'>Oops, user already exists!***</span>";
    }else
    /* This conditional statement means that if email doesn't exist and all fields are not empty and passwords match*/
    if($chosen != 1 && !$error && !$pass_error)
    {
        $msg = "<span class='success-msg'>Your registration was successful!***</span>";
        mysqli_query($db, "INSERT INTO client_table (email, password, squestion, sanswer)VALUES('$email', '$password', '$squestion', '$sanswer')");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <script src="assets/js/jquery.js"></script>
        <title>Registration Page</title>
    </head>
    <body>
        <div class="main-box">
            <div class="form-box">
                <h2 class='box-title'>Sign Up</h2>
                <p class='box-guide'>Please fill in the form to create an account</p>
                <?php /* These php codes below are used to set results to display depending on the conditions satisfied*/?>
                <?php if(!empty($msg)){ echo $msg;} ?>
                <?php if(!empty($error)){ echo $error;} ?>
                <?php if(!empty($pass_error)){ echo $pass_error;} ?>
                <form method="post" action="">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Enter Email">
                        <span class="form-label">Enter Email</span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Enter Password">
                        <span class="form-label">Enter Password</span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="cpassword" placeholder="Confirm Your Password">
                        <span class="form-label">Confirm Password</span>
                    </div>
                    <div class="form-group">
                        <input type="text" name="squestion" placeholder="Security Question">
                        <span class="form-label">Security Question Example (Your favorite color?)</span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="sanswer" placeholder="Security Answer">
                        <span class="form-label">Enter Security Answers</span>
                    </div>
                    <div class="form-submit">
                        <button type="submit" name="signup">Sign Up</button>
                    </div>
                </form>
                <div class="switch">
                    Have an account? <a href='login.php'>Log In</a>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                /* This sets the body to be equal to the height of screen not matter the size in pixels*/
                var windowHeight = $(window).innerHeight();
                $('body').css({'height':windowHeight});
                /* ... */
            });
        </script>
    </body>
</html>
