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
        <link href="viewClub.css" type="text/css"
              rel="stylesheet">
       
    <!--link to call jquery file to bring weekly calendar up-->
    <script
    src='viewClubSmallerDatepicker.js'>
    </script>
       
    <!--link to call jquery file to open team details via ajax-->
    <script
    src='viewClubAllAjax.js'>
    </script>
       
       
        </head>
    
<body>

<?php
    
// code to find correct team to view
    
if (isset($_SESSION['clubID']))
    
    {
         $clubID   =   $_SESSION['clubID']; 
         $clubIDNoCode   = substr($clubID, 3);
    
    
// query to see if user is in control
  $isUserInControl = $pdo->prepare("SELECT username FROM clubControl WHERE clubID=? and username=?"); 

  $isUserInControl->execute([$clubID, $username]);
    
    if ($isUserInControl->rowCount() == 0)
        
    { 

// query to see if user created team
  $didUserSetupTeam = $pdo->prepare("SELECT username FROM clubs WHERE id=? and username=?"); 

  $didUserSetupTeam->execute([$clubIDNoCode, $username]);
    
    if ($didUserSetupTeam->rowCount() == 0)

    {
// query to find club name
  $findClubName = $pdo->prepare("SELECT clubName FROM clubs WHERE id=?"); 

  $findClubName->execute([$clubIDNoCode]);
        
    ($clubName = $findClubName->fetchcolumn());
    }
    
    else
        
    {
 
echo <<<_END
<script>
  window.location.href = "club.php";
</script>
_END;
    
    }
    }
    
    else
    {   

echo <<<_END
<script>
  window.location.href = "club.php";
</script>
_END;

    }   

 
//start of page after redirections
    

//find club sport from database
$findClubSport = $pdo->prepare('SELECT clubSport FROM clubs WHERE id=?'); 

//execute query with variables
$findClubSport->execute([$clubIDNoCode]);
    
($clubSport = $findClubSport->fetchcolumn());    
    

//Code for finding events for mini calendar  
$findClubEventStartdates = $pdo->prepare('SELECT startdate FROM calendar WHERE username=?'); 

//execute query with variables
$findClubEventStartdates->execute([$clubID]);

              
($clubEventStartdates = $findClubEventStartdates->fetchAll(PDO::FETCH_COLUMN));

?>
       
<script type="text/javascript">
    //Assign php generated json to JavaScript variable
    var viewClubEvent = <?php echo json_encode($clubEventStartdates); ?>;
    var clubID    = <?php echo json_encode($clubID); ?>;
</script>

<?php  
    
    
    
    
// find images for club profile pic and cover photo
    
  if (file_exists("profileCover/clubProfilepics/$clubID.jpeg"))
      {
echo <<<_END
  <div id=viewClubProfilepic>
<img src="profileCover/clubProfilepics/$clubID.jpeg">
  </div>
_END;
      }
    
    
   if (file_exists("profileCover/clubCoverphotos/$clubID.jpeg"))
      {
echo <<<_END
  <div id=viewClubCoverPhoto>
<img src="profileCover/clubCoverphotos/$clubID.jpeg">
  </div>
_END;
      }
    
    

echo <<<_END


<div id=viewClubDatepicker>
<div id=viewClubSmallDatepicker>
    </div>
    </div>
 
 <div id=viewClubSmallerEvent>
 <div id=viewClubSmallerEventContent>
    </div>
    </div>
    
<div id=viewClubFullCalendarButton>
<a href="viewClubCalendar.php" class="viewClubCalendar">full calendar</a>
</div>


<div id=viewClubProfilepicback>
<div id=viewClubSportmiiimagewithin>
    <img src=images/sportmii%20logo%20whitesmoke.png alt="sportmii"
         title="sportmii" width="120" height="150">
         </div>
    </div>
    
<div id=viewClubCoverPhotoBack>
    </div>

<div id=viewClubLeague>
    </div>
    
<div id=viewClubScoutingSetup>
    </div>

    
<div id=viewClubContactDetails>
    </div>

<div id=viewClubName>
<p>$clubName</p>
</div>

<div id=viewClubSport>
    <p>$clubSport</p>
    </div> 

<div id=viewClubID>
    <p>$clubID</p>
    </div>
    
<div id=viewClubDetails>
    </div>
    
<div id=viewClubTeamList>
    </div>
    
<div id=viewClubKeyOfficials>
    </div>
    
<div id=viewClubPlayersList>
    </div>
    
<div id=viewClubFeed>
</div>
    


_END;

}
?>

    </body>

</html>
    
    