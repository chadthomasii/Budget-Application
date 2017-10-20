<?php
session_start();
require_once 'core/ErrorReporting.php';
require_once 'classes/Database.php';
require_once 'core/functions.php';

$data = [];

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    //Set the key/value pairs
    $data['submissionValue'] = $_POST['submissionValue'];

    function updateProfile($savings,$bills,$entertainment,$discretionary,$database)
    {
        $database->query("UPDATE budgetprofile
        SET savings = :savings,
        bills = :bills,
        entertainment = :entertainment,
        discretionary = :discretionary
        WHERE usersid = :usersid");
        
        
        $database->bind(":savings",$savings);
        $database->bind(":bills",$bills);
        $database->bind(":entertainment",$entertainment);
        $database->bind(":discretionary",$discretionary);
        $database->bind(":usersid", $_SESSION['user_id']);
    }

    if($data['submissionValue'] == 700) //Everything is selected
    {
        updateProfile(20,30,20,30,$database);
    
        

        if($database->execute()) //if add echo back success, otherwise false
        {
            $data['success'] = true;
            $data['code'] = 700;
        }
    
        else
        {
            $data['success'] = false;
            $data['code'] = 700;
        }

    }

    if($data['submissionValue'] == 0) //Nothing is selected
    {
        updateProfile(20,30,20,30,$database);
        
            
    
            if($database->execute()) //if add echo back success, otherwise false
            {
                $data['success'] = true;
                $data['code'] = 0;
            }
        
            else
            {
                $data['success'] = false;
                $data['code'] = 0;
            }
    }

    if($data['submissionValue'] == 100) //Just savings
    {
        updateProfile(40,30,20,10,$database);
        
            
    
        if($database->execute()) //if add echo back success, otherwise false
        {
            $data['success'] = true;
            $data['code'] = 100;
        }
        
        else
        {
            $data['success'] = false;
            $data['code'] = 100;
        }
    }

    if($data['submissionValue'] == 200) //Just food
    {
        updateProfile(20,30,40,10,$database);
        
            
    
            if($database->execute()) //if add echo back success, otherwise false
            {
                $data['success'] = true;
                $data['code'] = 200;
            }
        
            else
            {
                $data['success'] = false;
                $data['code'] = 200;
            }
    }

    if($data['submissionValue'] == 300) //Just Bills
    {
        updateProfile(20,40,20,20,$database);
        
            
    
            if($database->execute()) //if add echo back success, otherwise false
            {
                $data['success'] = true;
                $data['code'] = 300;
            }
        
            else
            {
                $data['success'] = false;
                $data['code'] = 300;
            }
    }

    if($data['submissionValue'] == 400) //Food and Savings
    {
        updateProfile(40,20,30,10,$database);
        
            
    
            if($database->execute()) //if add echo back success, otherwise false
            {
                $data['success'] = true;
                $data['code'] = 400;
            }
        
            else
            {
                $data['success'] = false;
                $data['code'] = 400;
            }
    }

    if($data['submissionValue'] == 500) //Bills and Savings
    {
        updateProfile(40,40,10,10,$database);
        
            
    
            if($database->execute()) //if add echo back success, otherwise false
            {
                $data['success'] = true;
                $data['code'] = 500;
            }
        
            else
            {
                $data['success'] = false;
                $data['code'] = 500;
            }
    }

    if($data['submissionValue'] == 600) //Food and Bills
    {
        updateProfile(40,40,10,10,$database);
        
            
    
            if($database->execute()) //if add echo back success, otherwise false
            {
                $data['success'] = true;
                $data['code'] = 600;
            }
        
            else
            {
                $data['success'] = false;
                $data['code'] = 600;
            }
    }
    
    



}

else
{
    $data['success'] = false;
}



$json = json_encode($data); //encode in json
echo $json;