<?php
include_once('includes/connection.php');
session_start();

if(isset($_POST['submit'])){
	/* Sets input equal to variable */
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $rand = "1234567890qwertyuiopasdfghjkl:|zxcvbnm,.?";
    $random = str_shuffle($rand);
    /* Sets a random token less than 15 characters*/
    $token = substr($random, 0, 15);
    
    /* Checks that email input field is not empty */
    if(empty($email)){
        $error = "<span class='failed-msg'>Field is required!***</span>";
    }
 
  /* Selects email from database */   
    $choose = mysqli_query($db, "SELECT * FROM client_table WHERE email = '$email'");
    
    
     /* The condition below checks if email exists in database and email input is not empty, if so, grant user access into recover.php file else prompt error. */
     
    if($choose && !$error){
        $_SESSION['email'] = $email;
        $_SESSION['token'] = $token;
        header('Location:recover.php');
    }else
    if($choose != 1 && !$error){
        $msg = "<span class='failed-msg'>Oops, email doesn't exist!***</span>";
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
        <title>Password Reset Page</title>
    </head>
    <body>
        <div class="main-box">
            <div class="form-box">
                <h2 class='box-title'>Password Recovery</h2>
                <p class='box-guide'>Please fill in the form to reset your password</p>
                <?php if(!empty($msg)){ echo $msg;} ?>
                <?php if(!empty($error)){ echo $error;} ?>
                <form method="post" action="">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Enter Email">
                        <span class="form-label">Enter Email</span>
                    </div>
                    <div class="form-submit">
                        <button type="submit" name="submit">Sumbit</button>
                    </div>
                </form>
                <div class="switch">
                    Back to <a href='login.php'>Log In</a>
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
