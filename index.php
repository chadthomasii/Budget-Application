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
        <title>Aggie Budget</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
    </head>
    <body>

    

        <header id="showcase">

        <button id="roundButton"></button>
        <div id="flyoutMenu">
            <h2><a href="index.php">Home</a></h2>
            <h2><a href="checks.php">Checks</a></h2>
            <h2><a href="savings.php">Savings</a></h2>
           
            <h2><a href="#">Settings</a></h2>
            <h2><a href="logout.php">Logout</a></h2>
            
        </div>

            <div class="hi">
                <h1>Hi, <?php  echo ($_SESSION['first_name']);?></h1>
            </div>

            <div class="heading">
               <div>
            
                   <h2>Current Check: $<?php  
                   
                    $data = $database->getRecentCheck($_SESSION['user_id']); // get the users budget based on ID
                    echo   $data //echo their budget amount
                   
                   ?>
                   
                   
                   </h2>
               </div>

               
            </div>


            
        </header>

        <div class="card-container">
            <div class="card-border">
                <section class="card">
                    <div class="card-heading">
                        <i class="fa fa-cutlery fa-4x" aria-hidden="true"></i>
                        <h1>Entertainment</h1>
                        <p>
                            <?php

                                $budget = $database->getRecentCheck($_SESSION['user_id']); // Get the budget amount
                                $percent = $database->getPercentage($_SESSION['user_id'],'entertainment')[0]['entertainment']; //get the percentage

                                

                                echo calculatePercentages($budget,$percent); // calculate that
                                

                                

                            ?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <section>
                        
                        <?php  
                   
                        $data = $database->getPercentage($_SESSION['user_id'],'entertainment');

                        echo $data[0]['entertainment'] . '%';
                        
                        ?>
                        
                        
                        </section>
                    </div>
                </section>

            </div>

            <div class="card-border">

                <section class="card">
                    <div class="card-heading">
                        <i class="fa fa-envelope-o fa-4x" aria-hidden="true"></i>
                        <h1>Bills</h1>
                        <p>
                            <?php

                                $budget = $database->getRecentCheck($_SESSION['user_id']);
                                $percent = $database->getPercentage($_SESSION['user_id'],'bills')[0]['bills']; //get the percentage

                                

                                echo calculatePercentages($budget,$percent); // calculate that
                                

                                

                            ?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <section>
                        
                        <?php  
                   
                        $data = $database->getPercentage($_SESSION['user_id'],'bills');

                        echo $data[0]['bills'] . '%';
                        
                        ?>
                        
                        </section>
                    </div>

                </section>

            </div>

            <div class="card-border">
                <section class="card">
                    <div class="card-heading">
                        <i class="fa fa-money fa-4x" aria-hidden="true"></i>
                        <h1>Savings</h1>
                        <p>
                            <?php

                                $budget = $database->getRecentCheck($_SESSION['user_id']);  
                                $percent = $database->getPercentage($_SESSION['user_id'],'savings')[0]['savings']; //get the percentage

                                

                                echo calculatePercentages($budget,$percent); // calculate that
                                

                                

                            ?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <section>
                        
                        <?php  
                   
                        $data = $database->getPercentage($_SESSION['user_id'],'savings');

                        echo $data[0]['savings'] . '%';
                        
                        ?>
                        
                        </section>
                    </div>

                </section>

            </div>
            
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
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
        
        <script src="js/AddMoney.js"></script>
        
    </body>
</html>