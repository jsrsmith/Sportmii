<?php // signupheader.php
  session_start();

  require_once 'functions.php';


  if (isset($_SESSION['firstnamesignup'], $_SESSION['surnamesignup'], $_SESSION['gendersignup'], $_SESSION['dobsignup']))
  {
    $firstname        = $_SESSION['firstnamesignup'];
    $surname          = $_SESSION['surnamesignup'];
    $gender           = $_SESSION['gendersignup'];
    $dob              = $_SESSION['dobsignup'];
    $signupstage1     = TRUE;
  }
  else $signupstage1  = FALSE;