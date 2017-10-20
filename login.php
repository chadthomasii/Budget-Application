
<?php

require_once 'core/ErrorReporting.php';
require_once 'classes/Database.php';

//Make sure users is not already logged in
session_start();
if(isset($_SESSION['user_id']))
{
    header('Location: index.php');
}

//Empty error
$message = '';
  
//Check to make sure that the users information was submitted to the form and not empty
if(!empty($_POST['email']) && !empty($_POST['password']))
{
    $database->query("SELECT * FROM users WHERE email = :email AND password = :password");
    $database->bind(":email", ($_POST['email']));
    $database->bind(":password", md5($_POST['password']));
    $database->execute();

    // if($database->$stmt->rowCount() >= 1)
    // {
    //     echo "workd";
    // }
    else
    {
        $message = "That email and password combination did not work.";
    }

    
    
}
else
{
    $message = "You must fill out the email and password fields.";
}
    
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login Below</title>
  <link rel="stylesheet" href="css/login.css" type="text/css">
  </head>
  <body>
      
      <div class="header">
          
          <a href="login.php">Budget  Butler</a>
      
      </div>
      
      
      <h1>Login </h1>
      <span>or <a href="register.php">Register here</a></span>
      
      <form action="login.php" method="POST">
          
          <input type="email" placeholder="Enter your email" name="email">
          
          <input type="password" placeholder="Enter your password" name="password">
          
          <input type="submit" value="Submit">
      
      
      </form>

      <?php
        if(!empty($_POST['email']) && !empty($_POST['password']))
        {
            if(!empty($message))
            {
                echo $message;
            }
        }
      ?>

  
  </body>
</html>
