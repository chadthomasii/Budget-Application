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

    
    
    //Update the current amount
    $database->query("UPDATE budgetprofile
                     SET checkAmount = :amount
                     WHERE usersid = :usersid");
                     
    $database->bind(":amount", ($data['amount']));
    $database->bind(":usersid", $_SESSION['user_id']);

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