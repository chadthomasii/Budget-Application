<?php
//Destroys sessions, and redirects to home page.

function logout()
{
    session_start();
    session_unset();
    session_destroy();
    header("Location: login.php");
}

logout(); //logs out immediatley.