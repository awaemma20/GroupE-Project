<?php
include_once('includes/connection.php');
session_start();

if(!isset($_SESSION['email'])){
    header('Location:login.php');
}

echo "Welcome " . $_SESSION['email'] . "<br>";
echo "<a href='logout.php'>Logout</a>";

?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
        <script src="assets/js/jquery.js"></script>
        <title>Reset page</title>
    </head>
    <body>
        
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
