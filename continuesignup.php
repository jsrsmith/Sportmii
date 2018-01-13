<?php //signup stage 2
require_once 'signupheader.php';

if (!$signupstage1) die();
?>

<html>

    <head>
   
    <title>   
    sportmii
    </title>
       
       <!-- little image next to sportmii on tab-->
       <link rel="shortcut icon" type="image/png" href="images/sportmii%20logo.png">
        
    <!--link to CSS-->
        <link href="signup.css" type="text/css"
              rel="stylesheet">

    
    <!--link to call Google CDN-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    
    <!--link to call jquery file to check email availability-->
    <script
    src='validateemail.js'>
    </script> 
    
    <!--link to call jquery file to check password length-->
    <script
    src='passwordlength.js'>
    </script> 
 
  
   </head>
    
<body>

<!-- all php belongs here -->
  
<?php

$email = "";
$username = "";
$password = "";
    
// if 'sign up' is pressed submit all info to mysql database
if (isset($_POST['signup']))
{
    
    // if firstname, surname and gender is set
    if (isset($_POST['email'], $_POST['username'], $_POST['password']))
    {
    
    // declare all variables
    $email = ($_POST['email']);    
    $username = ($_POST['username']);
    $password = ($_POST['password']);    
        
        
    // declaring primary sport variable 
    $primarysport=$_POST['primarysport'];
        
    //if any variables are left empty
    if 
        
        ($email == "" || $username == "" || $password == "") 
        
        {

echo <<<_END
<div id=notfilledincon>
<p>oops! you haven't filled everything in.</p>
</div>
_END;
        }

        
    //see if email address is taken
  else 
        
    {
       $resultemail = $pdo->prepare('SELECT email FROM members WHERE email=?');

//execute query and variables
$resultemail->execute([$email]);  
      

      if ($resultemail->rowCount() > 0)
      {

echo <<<_END
<div id=emailinuse>
<p>it looks like this email address is already in use!</p>
</div>
_END;
          
$resultemail = null;
    }

  
       
    // see if username is already in use
     else 
         
         {
      $resultusername = $pdo->prepare('SELECT username FROM members WHERE username=?');


//execute query and variables
$resultusername->execute([$username]);  
         

      if ($resultusername->rowCount() > 0)
      {
echo <<<_END
<div id=usernameinuse>
<p>it looks like this username is already in use!</p>
</div>
_END;

$resultusername = null;
      }
       
     else
         
     {
        if (!preg_match('/[A-Za-z]/', $username))
            
        {
echo <<<_END
<div id=usernameMustContainLetters>
<p>your username must contain at least 1 letter a-z</p>
</div>
_END;

        }

     
      else
     {
          
password_hash($password, PASSWORD_DEFAULT);
          
$options = [
  'cost' => 12
];
$hash = password_hash($password, PASSWORD_BCRYPT, $options);
          
          
          
          
          
          
          
          
          
                $qresult = $pdo->prepare('INSERT INTO members (firstname, surname, gender, dob, email, username, password, primarysport) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');

//execute query and variables
$qresult->execute([$firstname, $surname, $gender, $dob, $email, $username, $hash, $primarysport]);  
         
$resultemail = null;
$resultusername = null;
$qresult = null;
          
           destroySession();
          
echo <<<_END
<script>
  window.location.href = "index.php";
</script>
_END;
      }
          
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
    
    
<!--form for sign up details box-->
    <div id="signupdetails">  
    
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
      
    
    <!--form for sign up details, first, last, gender, d.o.b, email, password, primary sport-->
    <form action="continuesignup.php" method="post">
    
    <div id=allinputsspace>
    <div id=emailspace>
    
     <p>e-mail
        <br>
        <input type="text" name="email" id="email" value='$email'>
        </p>

      
      </div>
      
      <br>
      
      <div id=usernamespace>
      
        <p>username
        <br>
        <input type="text" name="username" value='$username'>
        </p>
        
        </div>
        
        <br>
        
        <div id=passwordspace>
        
        <p>password
            <br>
            <input type="password" name="password" id="password" value='$password'>
        </p>
          
          </div>
          
          <br>
          
          <div id=primarysportspace>
    
            <div class="primarysport">
  <label for="primarysport" class="primarysport">primary sport</label>
  <div class="sportchoice">
    <select name="primarysport" id="primarysport">
      <option value="">primary sport</option>
      <option value="">---</option>
      <option value="football">football</option>
     
      </select>
                </div>
        </div>
        
        </div>
        </div>
        <br>
        
         <!--submit button-->
        <input type="submit" name="signup" value="sign up!" /> 
            
        
        </form>      

    </div>


_END;

?>
  
    </body>   
    
    
</html>