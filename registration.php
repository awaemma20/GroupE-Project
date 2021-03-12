<!DOCTYPE html>
<html>
  <head>
    <title>Registration Page</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="registration.css" />
    <link rel="icon" href="/RGU International Student Community.jpeg">
    <meta name="viewpoint" content="width=device-width,initia-scale=1">
    </head>
    <body>
    <header>
      <img src="images/project logo.jpg" alt="project logo" width= "240" height="80" >
      <!--NAVIGATION STARTS-->
      <nav>
          <ul>
              <li><a href="profilepage.php">Profile</a></li>
              <li><a href="Join Room.html">Join Room</a></li>
              <li><a href="Online Learning Tool Tutorial.php">Online Learning Tool Tutorial</a></li>
            </ul> 
      </nav>
      <!--NAIGATION END-->
  
    <div class="container">
      <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h1>Registration Form</h1>
          </div>

          <div class="panel-body">
            <form action="register.php" method="post">

              <img src="images/rguthing.jpg" alt="jobs" style="width:100%; height:500px;">
              <div class="content"><br>


                    <label for="number">RGU Student ID:</label><br>
                    <input type="text" id="number" name="number" maxlength="80" size="50"><br><br>
                    
                
                
                      <label for="fname">First name:</label><br>
                      <input type="text" id="firstname" name="firstName" maxlength="80" size="50"><br><br>
                      <label for="lastname">Last name:</label><br>
                      <input type="text" id="lastname" name="lastName"  maxlength="80" size="50"><br><br>
                      
  
                      <label for="gender">Gender:</label><br>
                      <select name="gender" id="gender">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Other">Other</option>
                      </select><br><br>
  
                      <label for="email">Email address:</label><br>
                      <input type="email" id="email" name="email"><br><br>
  
                      
  
                     
                      <label for="password">Password:</label><br>
                      <input type="password" id="password" name="password"><br><br>

                      
  
                     
                      <input type="submit" value="Register" name="Register">
  
  
            </form>
      </main>
  </body>