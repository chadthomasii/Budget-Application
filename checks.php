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
        <title>Checks</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/checks.css">
        <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
    </head>
    <body>

    <header id="showcase">
    
            <button id="roundButton"></button>

            <div id="flyoutMenu">
                <h2><a href="index.php">Home</a></h2>
                <h2><a href="checks.php">Checks</a></h2>
                <h2><a href="savings.php">Savings</a></h2>
                <h2><a href="bills.php">Bills</a></h2>
                <h2><a href="#">Settings</a></h2>
                <h2><a href="logout.php">Logout</a></h2>
                
            </div>

            <div>
                <h1> Add Check </h1>
            </div>

            <div class="button-div">
                <div id="plus-button">
                    <div class= "plus">
                        <h1>+</h1>
                    </div>

                    
                </div>
            </div>
    
                
    </header>
    <div id="modal">    
        <div id="modal-content"> 
            <span id="close-button">&times;</span>
            <div class="amount-container">
                <p>Enter Check Amount:</p>
                <fieldset id="check">
                   <input type="text" value="" name="checkInput">
                </fieldset>

                <button name="submit" type="submit" id="question-submit">Submit</button>

            </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/add-check-modal.js"></script>
        
        <script>

            var roundButton = document.querySelector("#roundButton");
            var flyoutMenu = document.querySelector("#flyoutMenu");


            roundButton.addEventListener("click", showMenu, false);

            flyoutMenu.addEventListener("click", hideMenu, false);

            function showMenu(e)
            {
                flyoutMenu.classList.add("show");
                document.body.style.overflow = 'hidden';
            }

            function hideMenu(e)
            {
                flyoutMenu.classList.remove("show");
                e.stopPropogation();

                document.body.style.overflow = 'auto';

            }
            
        </script>
        

    
        
    </body>
</html>