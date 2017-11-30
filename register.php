<?php
require_once 'core/ErrorReporting.php';
require_once 'core/functions.php';
require_once 'classes/Database.php';

//Make sure users is not already logged in
session_start();
if(isset($_SESSION['user_id']))
{
    header('Location: index.php');
}


$message = '';

//Check to make sure that the users information was submitted to the form, and not empty
if(!empty($_POST['email']) && !empty($_POST['password']))
{
    if(($_POST['password']) == ($_POST['confirm_password']))
    {
        $database->query("SELECT email FROM users WHERE email = :email");
        $database->bind(":email", ($_POST['email']));
        $database->execute();
    
        $results = $database->resultSet();
    
        //Login success
        if(count($results) > 0)
        {
            $message = "That email already exists.";
            
            
        }
    
        else
        {
            //Insert User
            $database->query("INSERT INTO users (first_name,last_name, upassword,email,phoneNum) VALUES(:first_name, :last_name, :password, :email, :phoneNum)");
            $database->bind(":first_name", $_POST['first_name']);
            $database->bind(":last_name", $_POST['last_name']);
            $database->bind("password", md5($_POST['password']));
            $database->bind(":email", $_POST['email']);
            $database->bind(":phoneNum", '+1' . $_POST['phoneNum']);
    
            //If statment successfully executed, display status.
            if($database->execute())
            {
                $message = 'Successfully created new User.';
    
                
    
                //Insert new row into spending profile
                $database->query("INSERT INTO budgetprofile (user_id) VALUES(:usersid)");
                $database->bind(":usersid", $database->lastInsertId());
                $_SESSION['user_id'] = $database->lastInsertId();
                $database->execute();

                sendEmail($_POST['email']);
    
                
    
                //Take them to questionaire
                header("Location: questionaire.php");
    
                
                
    
            }

            else
            {
                $message = 'Sorry, There was an issue creating your account.'; //Issue creating account message
            }
        }
    }

    else
    {
        $message = 'Sorry, your password and password confirmation did not match.';
    }
    
    
    
  
    
    
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['email']) && empty($_POST['password']))
{
    $message = 'Please fill out all the mandatory fields';
}

?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Register Below</title>
  <link rel="stylesheet" href="css/login.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
  </head>
  <body>
      
      <div class="header">
          
          <a href="index.php">Aggie Budget</a>
      
      </div>
      
      <?php if(!empty($message)): ?>
      <p><?= $message ?></p>
      <?php endif; ?>
      
      
      
      <h1>Register</h1>
      <span>or <a href="login.php">Login here</a></span>
      
      <form action="register.php" method="POST">
      
          <input type="text" placeholder="Enter your first name" name="first_name">

          <input type="text" placeholder="Enter your last name" name="last_name">

          <input type="email" placeholder="Enter your email" name="email">
          
          <input type="password" placeholder="Enter your password" name="password">
          
          <input type="password" placeholder="Confirm your password" name="confirm_password">

          <input type="tel" placeholder="Enter your phone number" name="phoneNum">
          
          <input type="submit" value="Submit">
      
      
      </form>
  
  </body>
</html>