<?php // index.php
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

 /* require_once 'functions.php';*/

  if (isset($_SESSION['firstname'], $_SESSION['surname'], $_SESSION['gender'], $_SESSION['dob'], $_SESSION['email'], $_SESSION['username'], $_SESSION['primarysport']))
  {
    $firstname        = $_SESSION['firstname'];
    $surname          = $_SESSION['surname'];
    $gender           = $_SESSION['gender'];
    $dob              = $_SESSION['dob'];
    $email            = $_SESSION['email'];
    $username         = $_SESSION['username'];
    $primarysport     = $_SESSION['primarysport'];
    $loggedin         = TRUE;
  }
  else {$loggedin = FALSE;}

if ($loggedin)
{
    header( "location: profile.php" ); 
exit;
}
else 
{
    header( "location: login.php" );
exit;
}

?>