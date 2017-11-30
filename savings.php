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
        <link rel="stylesheet" href="css/savings.css">
        <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
    </head>
    <body>

        <header id="showcase-heading">
        
                <button id="roundButton"></button>

                <div id="flyoutMenu">
                    <h2><a href="index.php">Home</a></h2>
                    <h2><a href="checks.php">Checks</a></h2>
                    <h2><a href="savings.php">Savings</a></h2>
                   
                    <h2><a href="#">Settings</a></h2>
                    <h2><a href="logout.php">Logout</a></h2>
                    
                </div>

                
                
                    
        </header>

        <div id="showcase-container">
        
            <?php
                $database->query("SELECT * FROM savings_goals WHERE user_id = :user_id");
                $database->bind(":user_id", ($_SESSION['user_id']));
                $database->execute();

                $results = $database->resultSet();

                
                if (count($results) <= 0)
                {
                    echo 
                    '<div class="content-container">
                        <h1 class="add-heading">You currently do not have a savings goal. Add one! </h1>
        
                        <div class="button-div">
                            <div id="plus-button">
                                <div class= "plus">
                                    <h1>+</h1>
                                </div>
        
                                
                            </div>
                        </div>
    
                    </div>';
                }

                else
                {

                    $database->query("SELECT * FROM savings_goals WHERE user_id = :user_id");
                    $database->bind(":user_id", ($_SESSION['user_id']));
                    $database->execute();
    
                    $results = $database->resultSet();

                    $style = "style=width:" . twoNumberPercent($results[0]['currentAmount'],$results[0]['goalAmount']) . '%';

                    //Displays the progress bar, goal, and current amount
                    echo
                    '<h1 class="progress-heading"> Savings Goal: '. $results[0]['goalName'] .'</h1>
                    <div class="wrapper">
                        
                        <div class="progress-bar">
                            <span class="progress-bar-fill" ' . $style .' ><p>' . twoNumberPercent($results[0]['currentAmount'],$results[0]['goalAmount']) . '%' . '</p></span>
                        </div>

                    </div>
                    <h1 class="progress-heading">'.'$' . $results[0]['currentAmount'] . ' / '. '$' . $results[0]['goalAmount'];
                }

               
            ?>

            

                    

           
        </div>

        <div id="modal">    
            <div id="modal-content"> 
                <span id="close-button"><span>&times;</span></span>
                <div class="amount-container">
                    <p>What are you saving for?</p>
                    <fieldset id="check">
                        <p>Name:</p>
                        <input type="text" value="" name="checkInput" id="name-input">
                    </fieldset>

                    <fieldset id="check">
                        <p> Cost: </p>
                        <input type="text" value="" name="checkInput" id="amount-input">
                    </fieldset>

                    <button name="submit" type="submit" id="check-submit">Submit</button>

            </div>
        </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/add-check-modal.js"></script>
    <script src="js/addSavingsPlan.js"></script>
        
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

                document.body.style.overflow = 'auto';

                flyoutMenu.classList.remove("show");
                e.stopPropogation();

                

            }
            
        </script>
        

    
        
    </body>
</html>