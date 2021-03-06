<?php
session_start();
require_once 'core/ErrorReporting.php';
require_once 'classes/Database.php';
require_once 'core/functions.php';

$data = [];

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    //Set the key/value pairs
    $data['amount'] = $_POST['amount'];

    $database->query("SELECT * FROM savings_goals WHERE user_id = :user_id");
    $database->bind(":user_id", $_SESSION['user_id']);
    $database->execute();

    $results = $database->resultSet();

    

    //Check if the user has a savings profile setup, if they do insert the amount into the database
    if (count($results) > 0)
    {
        //Update the savings goal with the savings from the check
        $currentGoal = $results[0]['currentAmount'];
        
        //Get the savings percent from the database
        $database->query("SELECT savings FROM budgetprofile WHERE user_id = :user_id ");
        $database->bind(":user_id", $_SESSION['user_id']);
        $database->execute();

        $results = $database->resultSet();

        $savingsPercent = $results[0]['savings']; // set this var to that percent


        
        
        $database->query("UPDATE savings_goals
                          SET currentAmount = :currentAmount
                          WHERE user_id = :user_id");

        $database->bind(":currentAmount", calculatePercentages($data['amount'] , $savingsPercent) + $currentGoal);

        $database->bind(":user_id", $_SESSION['user_id']);
        $database->execute();
    }
    
    //Update the current amount
    $database->query("INSERT INTO individual_check(amount, user_id) VALUES (:amount , :user_id)");
                     
    $database->bind(":amount", ($data['amount']));
    $database->bind(":user_id", $_SESSION['user_id']);

    if($database->execute()) //if add echo back success, otherwise false
    {
        $data['success'] = true;
    }

    else
    {
        $data['success'] = false;
    }
    
    



}

else
{
    $data['success'] = false;
}



$json = json_encode($data); //encode in json
echo $json;