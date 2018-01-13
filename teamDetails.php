<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="teamDetails.css" rel="stylesheet" type="text/css"/>
        
          <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
    <!--link to call jquery file to bring up team details change-->
    <script
    src='teamDetailsPopup.js'>
    </script>    

        
    <!--link to call jquery file to cancel editing team details--> 
    <script
    src='cancelTeamDetailsPopup.js'>
    </script>
        
    <!--link to call jquery file to stop name being empty--> 
    <script
    src='saveTeamDetailsSubmitButton.js'>
    </script>
        
    </head>
    
    <body>
        
<?php
        
//if football edit is pressed
 if (isset ($_POST['saveTeamDetails']))
    
 {
  
    
         $teamID        = $_SESSION['teamID'];
         $teamName      = $_POST['editTeamDetailsTeamNameText'];
         $stadium       = $_POST['editTeamDetailsStadiumText'];
         $sponsor       = $_POST['editTeamDetailsSponsorText'];
         $founded       = $_POST['editTeamDetailsFoundedText'];
 
     
        //find previous team name from database
$findPreviousTeamName = $pdo->prepare('SELECT teamName FROM teams WHERE id=?'); 

//execute query with variables
$findPreviousTeamName->execute([$teamID]);
     
 ($previousTeamName = $findPreviousTeamName->fetchcolumn());    
     
     
     
        //update team details in teams table
        $updateTeams = "UPDATE teams SET teamName=?, stadium=?, sponsor=?, founded=? WHERE id=?";
        
        //execute query and variables
        $pdo->prepare($updateTeams)->execute([$teamName, $stadium, $sponsor, $founded, $teamID]);
     
     
        //update team name in scouting
        $updateScouting = "UPDATE scout SET scouting=? WHERE scouting=?";
        
        //execute query and variables
        $pdo->prepare($updateScouting)->execute([$teamName, $previousTeamName]);
     
        
        //update team name in scouted
        $updateScouted = "UPDATE scout SET scouted=? WHERE scouted=?";
        
        //execute query and variables
        $pdo->prepare($updateScouted)->execute([$teamName, $previousTeamName]);
     
     
       //update team name in teamControl
        $updateTeamClubControl = "UPDATE teamControl SET teamName=? WHERE teamID=?";
        
        //execute query and variables
        $pdo->prepare($updateTeamClubControl)->execute([$teamName, $teamID]);
     
     
     
        //update team name in register
        $updateRegister = "UPDATE register SET teamName=? WHERE teamID=?";
        
        //execute query and variables
        $pdo->prepare($updateRegister)->execute([$teamName, $teamID]);
     
     
     
        //update team name in leagueTables
        $updateLeagueTables = "UPDATE leagueTables SET teamName=? WHERE teamID=?";
        
        //execute query and variables
        $pdo->prepare($updateLeagueTables)->execute([$teamName, $teamID]);
     
        
        //update team name in leagueTables
        $updatefixturesResultsHomeTeam = "UPDATE fixturesResults SET homeTeamName=? WHERE homeTeamID=?";
        
        //execute query and variables
        $pdo->prepare($updatefixturesResultsHomeTeam)->execute([$teamName, $teamID]);
     
        //update team name in leagueTables
        $updatefixturesResultsAwayTeam = "UPDATE fixturesResults SET awayTeamName=? WHERE awayTeamID=?";
        
        //execute query and variables
        $pdo->prepare($updatefixturesResultsAwayTeam)->execute([$teamName, $teamID]);
    
     
     

echo <<<_END
<script>
  window.location.href = "team.php";
</script>
_END;

 }
     
             
 if (isset($_SESSION['teamID']))
    
 {        
        
$teamID   = $_SESSION['teamID'];

//find team name from database
$findTeamName = $pdo->prepare('SELECT teamName FROM teams WHERE id=?'); 

//execute query with variables
$findTeamName->execute([$teamID]);
        
if ($findTeamName->rowCount() == 0)
            {
    
                $teamName =  "";
}
        else   
        {
($teamName = $findTeamName->fetchcolumn());        
        }
        
        
//find stadium from database
$findStadium = $pdo->prepare('SELECT stadium FROM teams WHERE id=?'); 

//execute query with variables
$findStadium->execute([$teamID]);
        
if ($findStadium->rowCount() == 0)
            {
    
                $stadium =  "";
}
        else   
        {
($stadium = $findStadium->fetchcolumn());        
        }
        

//find sponsor from database
$findSponsor = $pdo->prepare('SELECT sponsor FROM teams WHERE id=?'); 

//execute query with variables
$findSponsor->execute([$teamID]);
        
if ($findSponsor->rowCount() == 0)
            {
    
                $sponsor =  "";
}
        else   
        {
($sponsor = $findSponsor->fetchcolumn());        
        }
        
        
//find founded from database
$findFounded = $pdo->prepare('SELECT founded FROM teams WHERE id=?'); 

//execute query with variables
$findFounded->execute([$teamID]);
        
if ($findFounded->rowCount() == 0)
            {
    
                $founded =  "";
}
        else   
        {
($founded = $findFounded->fetchcolumn());        
        }
        
        


echo <<<_END

<div id=teamDetailsTitle>
<p>team details</p>
</div>

<div id=allTeamDetails>

<div id=teamDetailsTeamNameTitle>
<p>team name:</p>
</div>

<div id=teamDetailsTeamName>
<p>$teamName</p>
</div>

<div id=teamDetailsStadiumTitle>
<p>stadium:</p>
</div>

<div id=teamDetailsStadium>
<p>$stadium</p>
</div>

<div id=teamDetailsSponsorTitle>
<p>sponsor:</p>
</div>

<div id=teamDetailsSponsor>
<p>$sponsor</p>
</div>

<div id=teamDetailsFoundedTitle>
<p>founded:</p>
</div>

<div id=teamDetailsFounded>
<p>$founded</p>
</div>

</div>

 <div id=teamDetailsPopup>
    
    <form action="teamDetails.php" id="teamDetailsForm" method="post">
    
    <div id=teamDetailsPopupTitle>
    <p>team details</p>
    </div>
    
     <div id=editTeamDetailsTeamName> 
        <p>team name*</p>   
        </div>
        
    <input type="text" name="editTeamDetailsTeamNameText" id="editTeamDetailsTeamNameText" value='$teamName'>
    
    <div id=editTeamDetailsStadium> 
        <p>stadium</p>   
        </div>
        
    <input type="text" name="editTeamDetailsStadiumText" id="editTeamDetailsStadiumText" value='$stadium'>
    
    <div id=editTeamDetailsSponsor> 
        <p>sponsor</p>   
        </div>
        
    <input type="text" name="editTeamDetailsSponsorText" id="editTeamDetailsSponsorText" value='$sponsor'>
    
    <div id=editTeamDetailsFounded> 
        <p>founded</p>   
        </div>
        
    <input type="text" name="editTeamDetailsFoundedText" id="editTeamDetailsFoundedText" value='$founded'>
       
       <div id=editTeamDetailsButtons>
       <input type='submit' name='saveTeamDetails' value='Save'>
       <div id=cancelTeamDetails>
     <button type="button" class="cancelTeamDetailsButton">cancel</button>
    </div>
       </div>
       
<div id="teamNameNotFilledIn">
<p>team name must be filled in.</p>
</div>
       
       
    </form>
    
    </div>

_END;
}
?>
        
    </body>
</html>

