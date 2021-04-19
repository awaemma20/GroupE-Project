<?php
include_once('includes/connection.php');
session_start();
    $email = '';
    $password = '';
    $error = '';
    $msg = '';

if(isset($_POST['login'])){
	
	/* Sets inputs to be equal to variable*/
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, md5($_POST['password']));
    
    /* Checks that forms aren't empty */
    if(empty($email) || empty($password)){
        $error = "<span class='failed-msg'>All fields are required!***</span>";
    }
    
    /* Selects email and password match from database */
    $choose = mysqli_query($db, "SELECT * FROM client_table WHERE email = '$email' && password = '$password'");
    
    $chosen = mysqli_num_rows($choose);
    
    /* This conditional ensure that email & password match & all fields are filled*/
    if($chosen == 1 && !$error){
        $_SESSION['email'] = $email;
        header('Location:dashboard.php');
    }else
    if($chosen != 1 && !$error)
    {
        $msg = "<span class='failed-msg'>Oops, user doesn't exist!***</span>";
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
        <title>Login Page</title>
    </head>
    <body>
        <div class="main-box">
            <div class="form-box">
                <h2 class='box-title'>Log In</h2>
                <p class='box-guide'>Please fill in the form to login</p>
                <?php if(!empty($msg)){ echo $msg;} ?>
                <?php if(!empty($error)){ echo $error;} ?>
                <form method="post" action="">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Enter Email">
                        <span class="form-label">Enter Email</span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Enter Password">
                        <span class="form-label">Enter Password</span>
                    </div>
                    <div class="form-submit">
                        <button type="submit" name="login">Login</button>
                    </div>
                </form>
                <div class="switch">
                    Not a user? <a href='index.php'>Sign Up</a> <br>
                    Forgotton Password? <a href='reset.php'>Reset</a>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                /* ... */
                var windowHeight = $(window).innerHeight();
                $('body').css({'height':windowHeight});
                /* ... */
            });
        </script>
    </body>
</html>
