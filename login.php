<?php
/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/
require_once 'header.php';
 /* require_once 'setup.php'; */
?>

<html>

   <head>
   
    <title>   
    sportmii
    </title>
       
        
    <!--link to CSS-->
        <link href="login.css" type="text/css"
              rel="stylesheet">
       
           <!-- little image next to sportmii on tab-->
       <link rel="shortcut icon" type="image/png" href="images/sportmii%20logo%20smaller.png"> 
       
       <meta name="description" content="Social media site for any sportsperson or sports team/club" />
       <meta name="keywords" content="sport, social, media, network, team, club" />     
       
   </head>
    
<body>

<?php //all php code for index
    
$email = "";
$password = "";
    
//if sign in is pressed
 if (isset($_POST['signin']))
{   
    
    if (isset($_POST['email'], $_POST['password']))
    {
        $email = ($_POST['email']);
        $password = ($_POST['password']);
        
        if ($email == "" || $password == "")
        {

echo <<<_END
<div id=notfilledin>
<p>oops! you haven't filled everything in.</p>
</div>
_END;
        }
        else
        {  
            
   $emailFound = $pdo->prepare('SELECT email FROM members WHERE email=?');

//execute query with variables
$emailFound->execute([$email]);          
            
         if ($emailFound->rowCount() == 0)
            {

echo <<<_END
<div class=incorrect>
<p>argh! either the email address or password<br>you have entered is incorrect.</p>
</div>
_END;

 $resultincorrect = null;
                
            }    
        else
        {
      $getHashedPassword = $pdo->prepare('SELECT password FROM members WHERE email=?');

        //execute query with variables
        $getHashedPassword->execute([$email]); 
            
        ($hashedPassword = $getHashedPassword->fetchColumn());

if (password_verify($password, $hashedPassword)) {

//firstname
                
         $firstnameq = $pdo->prepare('SELECT firstname FROM members WHERE email=?'); 

//execute query with variables
$firstnameq->execute([$email]);

                
($firstname = $firstnameq->fetchColumn());
                
                
//surname
                
         $surnameq = $pdo->prepare('SELECT surname FROM members WHERE email=?'); 

//execute query with variables
$surnameq->execute([$email]);

                
($surname = $surnameq->fetchColumn());
                

//gender
                
         $genderq = $pdo->prepare('SELECT gender FROM members WHERE email=?'); 

//execute query with variables
$genderq->execute([$email]);

                
($gender = $genderq->fetchColumn());


//dob
                
         $dobq = $pdo->prepare('SELECT dob FROM members WHERE email=?'); 

//execute query with variables
$dobq->execute([$email]);

                
($dob = $dobq->fetchColumn());
                
// already have email and password variables from login info
                
//username
                
         $usernameq = $pdo->prepare('SELECT username FROM members WHERE email=?'); 

//execute query with variables
$usernameq->execute([$email]);

                
($username = $usernameq->fetchColumn());                
            
//primarysport
                
         $primarysportq = $pdo->prepare('SELECT primarysport FROM members WHERE email=?'); 

//execute query with variables
$primarysportq->execute([$email]);

                
($primarysport = $primarysportq->fetchColumn());
                
                
    $firstname        = strtolower($firstname);
    $surname          = strtolower($surname);
    $gender           = strtolower($gender);
    $dob              = strtolower($dob);
    $email            = strtolower($email);
    $username         = strtolower($username);
    $primarysport     = strtolower($primarysport);           
                
                
                
             
                $_SESSION['firstname'] = $firstname;
                $_SESSION['surname'] = $surname;
                $_SESSION['gender'] = $gender;
                $_SESSION['dob'] = $dob;
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $username;
                $_SESSION['primarysport'] = $primarysport;
                
$resultincorrect = null;
$firstnameq = null;
$surname = null;
$gender = null;
$dob = null;
$username = null;
$primarysport = null;
                
           /* die("You are now logged in. Please <a href='profile.php?view=$user'>" .
            "click here</a> to continue.<br><br>");*/
 
                
echo <<<_END
<script>
  window.location.href = "profile.php";
</script>
_END;

            }
            
    else
        
    {

echo <<<_END
<div class=incorrect>
<p>argh! either the email address or password<br>you have entered is incorrect.</p>
</div>
_END;

 $resultincorrect = null;
                   
        }
        }
    }
 }
 }

 
    
echo <<<_END
    
    <!--heading-->
    <h1>
    sportmii
    </h1>
     

 <div id=logindetails>   
       
         <div id=sportconnectedtogether>
        <p>sport<br>connected<br>together</p>
    </div>
            
<!--sportmii logo next to heading-->
    <div id=sportmiiimage>  
    <img src="images/sportmii%20logo.png" alt="sportmii"
         title="sportmii" width="80" height="100"/>   
    </div> 
 
    <br>
       <br>
       <div id=blueline>
       </div>
      
    
    <!--form for loging in details, username, password and sign in button-->
    <form action="login.php" method="post">
        
    <p>e-mail
        <br>
        <input type="text" name="email" value='$email'>
        </p>
        
        <p>password
            <br>
            <input type="password" name="password" value='$password'>
        </p>
            
            <br>
    
        <!--submit button-->
        <input type="submit" name="signin"
               value="sign in"/>
        
    </form>
    
    <!--sign up link-->
    <p>
   <a href="SignUp.php">sign up</a>
    </p>
    
    
    </div>
    
_END;
?>
    
    </body>

</html>