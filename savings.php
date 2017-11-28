<?php
        require_once 'core/ErrorReporting.php';
        require_once 'classes/Database.php';
        require_once 'core/functions.php';
 

        //Make sure users is not already logged in
        session_start();
        if(!isset($_SESSION['user_id']))
        {
            header('Location: login.php');
        }

        
    
       
?>

<!DOCTYPE html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Savings</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
    </head>
    <body>


        
    
        
    </body>
</html>