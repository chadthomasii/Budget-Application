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
    $data['name'] = $_POST['name'];
    
    //Update the current amount
    $database->query("INSERT INTO savings_goals(goalName, goalAmount, user_id) VALUES (:goalName, :goalAmount , :user_id)");
                     
    $database->bind(":goalAmount", ($data['amount']));
    $database->bind(":goalName", ($data['name']));
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