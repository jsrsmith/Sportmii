<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="profileAboutMe.css" rel="stylesheet" type="text/css"/>
        
          <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
    <!--link to call jquery file to bring up about me change-->
    <script
    src='aboutMePopup.js'>
    </script>     
        
    <!--link to call jquery file to count remaining characters left in introduction-->
    <script
    src='aboutMeIntroductionCount.js'>
    </script> 
        
    <!--link to call jquery file to show info boxes on I hover-->
    <script
    src='aboutMeInformationDialogs.js'>
    </script> 
        
    <!--link to call jquery file to cancel editing about me-->
    <script
    src='cancelAboutMePopup.js'>
    </script> 
        
    </head>
    
    <body>
        
<?php
        
//if football edit is pressed
 if (isset ($_POST['saveAboutMe']))
     
 {
     
         $intro = ($_POST['aboutMeIntroductionText']);
     
     if 
        
        ((strlen($intro) > 250))
            {  
echo <<<_END
<div id=introTooLong>
<p>sorry! your intro can only be 250 characters long.</p>
</div>
_END;
     
            } 
        
   
      else
     {
     
     //find intro from database
$introExsist = $pdo->prepare('SELECT intro FROM aboutMe WHERE username=?'); 

//execute query with variables
$introExsist->execute([$username]);
        
if ($introExsist->rowCount() == 0)
            {
    
    $addAboutMe = $pdo->prepare('INSERT INTO aboutMe (intro, username) VALUES(?, ?)');

//execute query and variables
$addAboutMe->execute([$intro, $username]);  
    
     
 }
     else
     {
         $updateAboutMe = "UPDATE aboutMe SET intro=? WHERE username=?";
        
        //execute query and variables
$pdo->prepare($updateAboutMe)->execute([$intro, $username]);
    
              
     }

echo <<<_END
<script>
  window.location.href = "profile.php";
</script>
_END;
 }
 }
        
        

//find intro from database
$findIntro = $pdo->prepare('SELECT intro FROM aboutMe WHERE username=?'); 

//execute query with variables
$findIntro->execute([$username]);
        
if ($findIntro->rowCount() == 0)
            {
    
                $intro =                    "";
    
}

        else   
        {
         

($intro = $findIntro->fetchcolumn());  
        
        
        }

echo <<<_END

<div id=aboutMeTitle>
<p>about me</p>
</div>

<div id=aboutMeIntro>
<p>$intro</p>
</div>



 <div id=aboutMePopup>
    
    <form action="profileAboutMe.php" id="aboutMeForm" method="post">
    
    <div id=aboutMePopupTitle>
    <p>about me</p>
    </div>
    
     <div id=editAboutMeIntroduction> 
        <p>introduce yourself</p>   
        </div>
        
        <div id=aboutMeIntroductionInfo>
          <img src="images/information%20logo.png" width="18" height="20"/>
         </div>
         
         <div id=aboutMeIntroductionInfoText>
         <p>briefly describe yourself. you could include why you love sport or how often you get to play. are you a professional or do you just love to play for fun!</p>
         </div>
        
       <textarea name="aboutMeIntroductionText" id="aboutMeIntroductionText" maxlength="250">$intro</textarea>
       <div id=aboutMeIntroductionCount>
       </div>
       
       <div id=editAboutMeButtons>
       <input type='submit' name='saveAboutMe' value='Save'><button type="button" class="cancel">cancel</button>
       </div>
       
       
    </form>
    
    </div>

_END;

?>
        
    </body>
</html>

