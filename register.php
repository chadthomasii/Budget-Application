<?php
session_start();
//Make sure users is not already logged in
if(isset($_SESSION['user_id']))
{
    header('Location: index.php');
}
//Make sure users is not already logged in
//Get Database
require("includes/database.php");
//Empty error
$message = '';
//Check to make sure that the users information was submitted to the form, and not empty
if(!empty($_POST['email']) && !empty($_POST['password']))
{
    
   //Start Prepared statement to insert users
    $sql = "INSERT INTO users (email, password) VALUES(:email, :password)";
    
    //Prepare the sql statement query
    $statement = $conn->prepare($sql);
    
    //Insert users into the database
    
    $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash Password and bound Params
    
    $statement->bindParam(':email', $_POST['email']);
    $statement->bindParam(':password', $hashedPassword); 
    
    //If statment successfully executed, display status.
    if($statement->execute())
    {
        $message = 'Successfully created new User.';
    }
    else
    {
        $message = 'Sorry, There was an issue creating your account.';
    }
    
    
}
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Register Below</title>
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
  </head>
  <body>
      
      <div class="header">
          
          <a href="index.php">Web App</a>
      
      </div>
      
      <?php if(!empty($message)): ?>
      <p><?= $message ?></p>
      <?php endif; ?>
      
      
      
      <h1>Register</h1>
      <span>or <a href="login.php">Login here</a></span>
      
      <form action="register.php" method="POST">
          
          <input type="email" placeholder="Enter your email" name="email">
          
          <input type="password" placeholder="Enter your password" name="password">
          
          <input type="password" placeholder="Confirm Your Password" name="confirm_password">
          
          <input type="submit">
      
      
      </form>
  
  </body>
</html>