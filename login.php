
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

if(!empty($_GET))
{
    if($_GET['message'] == 'questionaire')
    {
        echo "Thank you for filling out the questionaire. Please log in";
    }
    
}
  
//Check to make sure that the users information was submitted to the form and not empty
if(!empty($_POST['email']) && !empty($_POST['password']))
{
    $database->query("SELECT id, email, first_name FROM users WHERE email = :email AND upassword = :password");
    $database->bind(":email", ($_POST['email']));
    $database->bind(":password", md5($_POST['password']));
    $database->execute();

    $results = $database->resultSet();

    //Login success
    if(count($results) > 0)
    {
        $_SESSION['user_id'] = $results[0]['id'];
        $_SESSION['first_name'] = $results[0]['first_name'];
        $_SESSION['email'] = $results[0]['email'];
        
        header("Location: index.php");
        
    }

    else
    {
        $message = "That email and password combination was not found.";
    }

    
    
}

else{
    $message = "You must fill out all the fields to have the form submitted";
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
          
          <a href="login.php">Aggie Budget</a>
      
      </div>
      
      
      <h1>Login </h1>
      <span>or <a href="register.php">Register here</a></span>
      
      <form action="login.php" method="POST">
          
          <input type="email" placeholder="Enter your email" name="email">
          
          <input type="password" placeholder="Enter your password" name="password">
          
          <input type="submit" value="Submit">
      
      
      </form>

      <?php
        

        if($_SERVER['REQUEST_METHOD'] === 'POST' && $message != null)
        {
            echo $message;
        }

      ?>

  
  </body>
</html>
