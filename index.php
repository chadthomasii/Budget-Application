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
        <title>Budget Butler</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
  
        <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
    </head>
    <body>

        <header id="showcase">

            <div>
                <h1>Hi, <?php  echo ($_SESSION['name']);?></h1>
            </div>

            <div class="heading">
               <div>
            
                   <h2>Account Balance: $<?php  
                   
                    $data = $database->getBudget($_SESSION['user_id']); // get the users budget based on ID
                    echo number_format($data[0]['checkAmount'], 2); //echo their budget amount
                   
                   ?>
                   
                   
                   </h2>
               </div><br>

               
            </div>

            <div id="add-money">

                <input type="text" name="fname" placeholder="Add Check" class="amountInput" id="amountInput"><br>
                <button class="calcButton">Submit</button>
            
            </div>

            
        </header>

        <div class="card-container">
            <div class="card-border">
                <section class="card">
                    <div class="card-heading">
                        <i class="fa fa-cutlery fa-4x" aria-hidden="true"></i>
                        <h1>Food</h1>
                        <p>
                            <?php

                                $budget = $database->getBudget($_SESSION['user_id'])[0]['checkAmount']; // Get the budget amount
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

                                $budget = $database->getBudget($_SESSION['user_id'])[0]['checkAmount']; // Get the budget amount
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

                                $budget = $database->getBudget($_SESSION['user_id'])[0]['checkAmount']; // Get the budget amount
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

        <div><a href="logout.php">Logout</a></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/AddMoney.js"></script>
        
    </body>
</html>