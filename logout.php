<?php
//Destroys sessions, and redirects to home page.
session_start();
session_unset();
session_destroy();
header("Location: login.php");