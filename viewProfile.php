<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

error_reporting(E_ALL);
ini_set('display_errors', 1);
  require_once 'defaultsetup.php';
?>

<html>

   <head>

       
        <!--link to CSS-->
        <link href="viewProfile.css" type="text/css"
              rel="stylesheet">
       
     <!--link to call jquery file to bring weekly calendar up-->
    <script
    src='viewProfileSmallDatepicker.js'>
    </script>
       
    <!--link to call jquery file to open about me via ajax-->
    <script
    src='viewProfileAllAjax.js'>
    </script>
       
   </head>
    
<body>

<?php
    
// code to find correct profile to view
    
if (isset($_SESSION['userProfile']))
    
    {
         $userProfile   =   $_SESSION['userProfile']; 
        
        if ($username   ==   $userProfile)
    
    {

echo <<<_END
<script>
  window.location.href = "profile.php";
</script>
_END;

    }
    }
 
    
 $_SESSION['userProfile']   = $userProfile;  

    
    
//Code for finding events for mini calendar
    
$findEventStartdates = $pdo->prepare('SELECT startdate FROM calendar WHERE username=?'); 

//execute query with variables
$findEventStartdates->execute([$userProfile]);

              
($eventStartdates = $findEventStartdates->fetchAll(PDO::FETCH_COLUMN));
    
    
//Code for finding firstname for user
    
$findUserFirstname = $pdo->prepare('SELECT firstname FROM members WHERE username=?'); 

//execute query with variables
$findUserFirstname->execute([$userProfile]);

              
($userFirstname = $findUserFirstname->fetchcolumn());
    
    
//Code for finding firstnamesurname
$findUserSurname = $pdo->prepare('SELECT surname FROM members WHERE username=?'); 

//execute query with variables
$findUserSurname->execute([$userProfile]);

              
($userSurname = $findUserSurname->fetchcolumn());
    
    
//Code for finding sport for user
    
$findUserSport = $pdo->prepare('SELECT primarySport FROM members WHERE username=?'); 

//execute query with variables
$findUserSport->execute([$userProfile]);

              
($userSport = $findUserSport->fetchcolumn());

?>
       
<script type="text/javascript">
    //Assign php generated json to JavaScript variable
    var viewProfileEvent = <?php echo json_encode($eventStartdates); ?>;
</script>

<?php  
    
$findEventStartdates = null;    


      if (file_exists("profileCover/profilepics/$userProfile.jpeg"))
      {
echo <<<_END
  <div id=viewProfileProfilepic>
<img src="profileCover/profilepics/$userProfile.jpeg">
  </div>
_END;
      }
    


      if (file_exists("profileCover/coverphotos/$userProfile.jpeg"))
      {
echo <<<_END
  <div id=viewProfileCoverPhoto>
<img src="profileCover/coverphotos/$userProfile.jpeg">
  </div>
_END;
      }
    
      

echo <<<_END

    
<div id=viewProfileDatepicker>
<div id=viewProfileSmallDatepicker>
    </div>
    </div>
    
<div id=viewProfileSmallerEvent>
 <div id=viewProfileSmallerEventContent>
    </div>
    </div>
    
    
<div id=viewProfileLeague>
    </div>
    
    
<div id=viewProfileScoutingSetup>
</div>


<div id=viewProfileProfilepicback>
<div id=viewProfileSportmiiimagewithin>
    <img src=images/sportmii%20logo%20whitesmoke.png alt="sportmii"
         title="sportmii" width="120" height="150">
         </div>
    </div>
    
<div id=viewProfileCoverPhotoBack>
    </div>


<div id=viewProfileName>
<p>$userFirstname $userSurname</p>
</div>

<div id=viewProfileSport>
    <p>$userSport</p>
    </div> 

<div id=viewProfileUsername>
    <p>$userProfile</p>
    </div>
    
<div id=viewProfileAboutMe>
    </div>

<div id=viewProfilePositions>
</div>

<div id=viewProfileSeasonStats>
</div>

<div id=viewProfileFeed>
</div>

_END;


?>

    </body>

</html>