<?php

require_once 'core/ErrorReporting.php';
require_once 'classes/Database.php';
require_once 'core/functions.php';

$number = $_POST['From'];
$body = $_POST['Body'];
 
header('Content-Type: text/xml');

$adding = 'false';

if (preg_match('/add/', $body) || preg_match('/Add/', $body)) //If add is in the text
{
    $adding = 'true'; // we are adding

    preg_match_all('!\d+!', $body, $matches); // check for numbers
    
  
  
}


//Add the check into the database
$database->query("SELECT id , phoneNum FROM users WHERE phoneNum = :phoneNum LIMIT 1");
$database->bind(":phoneNum", $number);
$database->execute();

$results = $database->resultSet(); 

//Get the users id and phone number
$user = $results[0]['id']; 
$phoneNumber = $results[0]['phoneNum'];
    

?>
 
<Response>
    <Message>
        <?php 

              
              if($adding = 'true' && !empty($matches[0][0]))
              {

                //Insert the check
                $database->query("INSERT INTO individual_check (user_id, amount) VALUES(:user_id, :amount)");
                $database->bind(":user_id", $user);
                $database->bind(":amount", $matches[0][0]);
                $database->execute();
                

                echo 'A check for ' . '$' . ($matches[0][0]) . ' Has been added to your account'; //Send the Add check input back
              }
              else
              {
                echo "I did not recognize that input"; //Error if there is no adding input
              }
        ?>
        
    </Message>
</Response>