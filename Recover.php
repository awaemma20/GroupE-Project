<?php
include_once('includes/connection.php');
session_start();

 /* The condition below checks that email  & token are set from the reset page  if so, grant user access to this page else return user back to login page. */
 
if(!isset($_SESSION['email']) && !isset($_SESSION['token'])){
    header('Location:login.php');
}

if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
}


 /* Selects from database where email is equal to the email sent from the other page, fetch the data. */

    $choose = mysqli_query($db, "SELECT * FROM client_table WHERE email = '$email'");
    $chosen = mysqli_fetch_array($choose);
    
    $password = '';
    $cpassword = '';
    $sanswer = '';


 /* When the reset button is pressed, set all the variables to equal all user input */

    if(isset($_POST['reset'])){
        $password = mysqli_real_escape_string($db, md5($_POST['password']));
        $cpassword = mysqli_real_escape_string($db, md5($_POST['cpassword']));
        $sanswer = mysqli_real_escape_string($db, $_POST['sanswer']);
        
    /* Checks that fields are not empty */    
        
        if(empty($password) || empty($cpassword) || empty($sanswer)){
            $error = "<span class='failed-msg'>All fields are required!***</span>";
        }
   
   
  /* Checks for password match */      
        if($password != $cpassword){
            $error = "<span class='failed-msg'>Oops, password mismatch!***</span>";
        }
        
         /* Checks that the answer provided by user is equal to the answer on the database where email is equal to the email provided by user from the previous page, also checks that all fields are filled  &  passwords match, if not so, prompt user error. */
        
        if($sanswer != $chosen['sanswer'] && !$error){
            $msg = "<span class='failed-msg'>Oops, password can't be reset!***</span>";
        }else
            if($sanswer == $chosen['sanswer'] && !$error){
                mysqli_query($db, "UPDATE client_table SET password='$password' WHERE email = '$email'");
                $msg = "<span class='success-msg'>Your password was successfully reset!***</span>";
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
        <title>Reset page</title>
    </head>
    <body>
        <div class="main-box">
            <div class="form-box">
                <h2 class='box-title'>Reset Password</h2>
                <p class='box-guide'>Please fill in the form to reset your password</p>
                <?php if(!empty($msg)){ echo $msg;} ?>
                <?php if(!empty($error)){ echo $error;} ?>
                <form method="post" action="">
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Enter New Password">
                        <span class="form-label">Enter New Password</span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="cpassword" placeholder="Confirm Your New Password">
                        <span class="form-label">Confirm New Password</span>
                    </div>
                    <div class="form-group question">
                    
                        <?php
                        /*  The below line of code fetch data from the database where email and security questions match and then shows user the security question entered upon registration. */
                            $select = mysqli_query($db, "SELECT * FROM client_table WHERE email = '$email'");
                            $selected = mysqli_fetch_array($select);
                            if($selected){
                        ?>
                        <?php echo $selected['squestion'];?>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="sanswer" placeholder="Security Answer">
                        <span class="form-label">Enter Security Answers</span>
                    </div>
                    <div class="form-submit">
                        <button type="submit" name="reset">Reset</button>
                    </div>
                </form>
                <div class="switch">
                    Back to <a href='logout.php'>Log In</a>
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
