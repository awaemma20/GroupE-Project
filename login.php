<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="bg-img">
        <form method = post action="validate.php" class="container">
          <h1>Login</h1>
      
          <label for="email"><b>StudentID</b></label>
          <input type="text" placeholder="Enter StudentID" name="studentid" required>
      
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>
         
      
          <button type="submit" class="btn">Login</button>
          
          <button type="Signup" class="btn"><a href="registration.php">Signup</a></button>
         <a href="forgot password.html">forgot Password</a>
        </form>
      </div>
    
</body>
</html>