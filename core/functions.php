<?php

use PHPMailer\PHPMailer\PHPMailer;
include_once "PHPMailer/PHPMailer.php";
include_once "PHPMailer/Exception.php";
include_once "PHPMailer/SMTP.php";

//Calculate percentage given a number and percent
function calculatePercentages($totalAmount, $percent)
{
    return number_format(($percent * $totalAmount) / 100, 2);
}
//Calculate the percentage of another based on the percentage of another one
function twoNumberPercent($small, $big)
{   
    $new = $small * 100;
    $passed = $new / $big;

    return number_format($passed, 0);
}



//Email with php mailer
function sendEmail($userEmail)
{
    $mail = new PHPMailer(true); 
    
    try
    {
        //Server setting
        $mail->Host = 'smtp.gmail.com'; 
        $mail->isSMTP();   
        $mail->SMTPAuth = true;                               
        $mail->Username = 'aggiebudget@gmail.com';                 
        $mail->Password = 'Aggiebudget1';                  
        $mail->SMTPSecure = 'tls';                            
        $mail->Port = 587;                                  
        
        //Recipients
        $mail->setFrom('no-reply@aggiebudget.com', 'Aggie Budget');
        $mail->addAddress($userEmail);               
        
        //Content
        $mail->isHTML(true);                                 
        $mail->Subject = 'Aggie Budget Registration';
        $mail->Body    = 'Welcome to Aggie Budget. Please sign in to start managing your money!';
            
        
        $mail->send();

        

    }

    catch(Exception $e)
    {
        echo $mail->ErrorInfo;
    }
    

    
    
    
    
}

