<?php
        require_once 'core/ErrorReporting.php';
        require_once 'classes/Database.php';
        
    
       
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

            <div>
                <h1>Hi, Chad!</h1>
            </div>

            <div class="heading">
               <div>
            
                   <h2>Account Balance: $400</h2>
               </div>
            </div>

            
        </header>

        <div class="card-container">
            <div class="card-border">
                <section class="card">
                    <div class="card-heading">
                        <i class="fa fa-cutlery fa-4x" aria-hidden="true"></i>
                        <h1>Food</h1>
                        <p>
                            Hungry? Check out the reccomended resturaunts in your area that fit your budget! 
                        </p>
                    </div>
                    <div class="card-footer">
                        <section>More</section>
                    </div>
                </section>

            </div>

            <div class="card-border">

                <section class="card">
                    <div class="card-heading">
                        <i class="fa fa-envelope-o fa-4x" aria-hidden="true"></i>
                        <h1>Bills</h1>
                        <p>
                            Look at the Bills for this month here! 
                        </p>
                    </div>
                    <div class="card-footer">
                        <section>More</section>
                    </div>

                </section>

            </div>

            <div class="card-border">
                <section class="card">
                    <div class="card-heading">
                        <i class="fa fa-money fa-4x" aria-hidden="true"></i>
                        <h1>Savings</h1>
                        <p>
                           Rainy day coming up? Let's save some money for it! 
                        </p>
                    </div>
                    <div class="card-footer">
                        <section>More</section>
                    </div>

                </section>

            </div>
            
        </div>

      
        
    </body>
</html>