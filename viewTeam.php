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
        <link href="viewTeam.css" type="text/css"
              rel="stylesheet">
       
    <!--link to call jquery file to bring weekly calendar up-->
    <script
    src='viewTeamSmallerDatepicker.js'>
    </script>
       
    <!--link to call jquery file to open team details via ajax-->
    <script
    src='viewTeamAllAjax.js'>
    </script>
       
       
        </head>
    
<body>

<?php
    
// code to find correct team to view
    
if (isset($_SESSION['teamID']))
    
    {
         $teamID   =   $_SESSION['teamID']; 
    
    
// query to see if user is in control
  $isUserInControl = $pdo->prepare("SELECT username FROM teamControl WHERE teamID=? and username=?"); 

  $isUserInControl->execute([$teamID, $username]);
    
    if ($isUserInControl->rowCount() == 0)
        
    { 

// query to see if user created team
  $didUserSetupTeam = $pdo->prepare("SELECT username FROM teams WHERE id=? and username=?"); 

  $didUserSetupTeam->execute([$teamID, $username]);
    
    if ($didUserSetupTeam->rowCount() == 0)

    {
// query to find team name
  $findTeamName = $pdo->prepare("SELECT teamName FROM teams WHERE id=?"); 

  $findTeamName->execute([$teamID]);
        
    ($teamName = $findTeamName->fetchcolumn());
    }
    
    else
        
    {
 
echo <<<_END
<script>
  window.location.href = "team.php";
</script>
_END;
    
    }
    }
    
    else
    {   

echo <<<_END
<script>
  window.location.href = "team.php";
</script>
_END;

    }   

 
//start of page after redirections
    

//find team sport from database
$findTeamSport = $pdo->prepare('SELECT teamSport FROM teams WHERE id=?'); 

//execute query with variables
$findTeamSport->execute([$teamID]);
    
($teamSport = $findTeamSport->fetchcolumn());
    
    
    
 //find club for team if available
$findTeamClub = $pdo->prepare('SELECT clubID FROM clubTeamList WHERE teamID=?'); 

//execute query with variables
$findTeamClub->execute([$teamID]);

    // if rows above 0, show league
    if ($findTeamClub->rowCount() > 0)
    {
($teamClubID = $findTeamClub->fetchcolumn()); 
$clubIDNoCode   = substr($teamClubID, 3);

//find clubname from id
$findTeamClubName = $pdo->prepare('SELECT clubName FROM clubs WHERE id=?'); 

//execute query with variables
$findTeamClubName->execute([$clubIDNoCode]);
        
($clubName = $findTeamClubName->fetchcolumn());

echo <<<_END

<div id=viewTeamClub>
    <p>$clubName</p>
    </div>

_END;

    }
    

//Code for finding events for mini calendar  
$findTeamEventStartdates = $pdo->prepare('SELECT startdate FROM calendar WHERE username=?'); 

//execute query with variables
$findTeamEventStartdates->execute([$teamID]);

              
($teamEventStartdates = $findTeamEventStartdates->fetchAll(PDO::FETCH_COLUMN));

?>
       
<script type="text/javascript">
    //Assign php generated json to JavaScript variable
    var viewTeamEvent = <?php echo json_encode($teamEventStartdates); ?>;
    var teamID    = <?php echo json_encode($teamID); ?>;
</script>

<?php  
    
    
    
    
// find images for team profile pic and cover photo
    
  if (file_exists("profileCover/teamProfilepics/$teamID.jpeg"))
      {
echo <<<_END
  <div id=viewTeamProfilepic>
<img src="profileCover/teamProfilepics/$teamID.jpeg">
  </div>
_END;
      }
    
    
   if (file_exists("profileCover/teamCoverphotos/$teamID.jpeg"))
      {
echo <<<_END
  <div id=viewTeamCoverPhoto>
<img src="profileCover/teamCoverphotos/$teamID.jpeg">
  </div>
_END;
      }
    
    

echo <<<_END


<div id=viewTeamDatepicker>
<div id=viewTeamSmallDatepicker>
    </div>
    </div>
 
 <div id=viewTeamSmallerEvent>
 <div id=viewTeamSmallerEventContent>
    </div>
    </div>
    
<div id=viewTeamFullCalendarButton>
<a href="viewTeamCalendar.php" class="viewTeamCalendar">full calendar</a>
</div>


<div id=viewTeamProfilepicback>
<div id=viewTeamSportmiiimagewithin>
    <img src=images/sportmii%20logo%20whitesmoke.png alt="sportmii"
         title="sportmii" width="120" height="150">
         </div>
    </div>
    
<div id=viewTeamCoverPhotoBack>
    </div>

<div id=viewTeamLeague>
    </div>
    
<div id=viewTeamScoutingSetup>
    </div>
    
<div id=viewTeamRegister>
    </div>
    
<div id=viewTeamContactDetails>
    </div>

<div id=viewTeamName>
<p>$teamName</p>
</div>

<div id=viewTeamSport>
    <p>$teamSport</p>
    </div> 

<div id=viewTeamID>
    <p>$teamID</p>
    </div>
    
<div id=viewTeamDetails>
    </div>
    
<div id=viewTeamTopScorers>
    </div>
    
<div id=viewTeamRegisteredPlayers>
    </div>
    
<div id=viewTeamDiscipline>
    </div>
    
<div id=viewTeamFeed>
</div>
    

_END;

}
?>

    </body>

</html>
    
    