<?php
        require_once 'core/ErrorReporting.php';
        require_once 'classes/Database.php';
        require_once 'core/functions.php';
 

        //Make sure users is not already logged in
        session_start();
    
        

        
    
       
?>

<!DOCTYPE html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Budget Butler</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/form.css">
  
        <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container">  
            <form id="contact" action="" method="post">
                <h3>Spending Profile Form</h3>

                Are you saving money for something important?
                <fieldset id="savings">
                    Yes <input type="radio" value="savings" name="savings">
                    No <input type="radio" value="0" name="savings">
                </fieldset>

                <fieldset id="savings">
                    What are you saving for?<input type="text" value="" name="what">
                    
                </fieldset>

                Do you go out to eat often?
                <fieldset id="food">
                    Yes <input type="radio" value="food" name="food">
                    No <input type="radio" value="0" name="food">
                </fieldset>
                Do Bills eat your paycheck?
                <fieldset id="bills">
                    Yes <input type="radio" value="bills" name="bills">
                    No <input type="radio" value="0" name="bills">
                </fieldset>

                    <button name="submit" type="submit" id="question-submit">Submit</button>
            
            </form>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/submitQuestions.js"></script>
        
    </body>
</html>