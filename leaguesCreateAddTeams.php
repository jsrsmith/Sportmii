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
        <link href="leaguesCreateAddTeams.css" type="text/css"
              rel="stylesheet">
       
       
    <!--link to call jquery file to bring up key buttons-->
    <script
    src='leaguesCreateAddTeamPopup.js'>
    </script> 
       
    <!--link to call jquery file to cancel key buttons-->
    <script
    src='leaguesCreateAddTeamCancelPopup.js'>
    </script> 
       
    <!--link to call jquery file to load team name in ajax for the edit leagues-->
    <script
    src='leaguesCreateTeamNameAjax.js'>
    </script> 
       
    <!--link to call jquery file to navigate to different pages-->
    <script
    src='leaguesCreateNavigationButtons.js'>
    </script> 

    
           </head>
    
<body>     
 

<?php
    
 if(isset($_SESSION['username'], $_SESSION['leagueChoice'], $_POST['submitAddTeam']))
    {
     
  $newTeamID    =    $_POST['createAddTeamID'];
  $leagueChoice = $_SESSION['leagueChoice'];
     
     //see if teamID exists
    $doesTeamIDExist = $pdo->prepare('SELECT teamName FROM teams WHERE id=?'); 

//execute query with variables
$doesTeamIDExist->execute([$newTeamID]);
    
    // if rows=0 add defualt league to table
    if ($doesTeamIDExist->rowCount() > 0)
    {
        
         ($teamNameFound = $doesTeamIDExist->fetchcolumn());
        
//is team already in league
$teamInLeagueAlready = $pdo->prepare('SELECT * FROM leagueTables WHERE leagueName=? and teamID=? and teamName=?'); 

//execute query with variables
$teamInLeagueAlready->execute([$leagueChoice, $newTeamID, $teamNameFound]);
    
    // if rows=0 add defualt league to table
    if ($teamInLeagueAlready->rowCount() > 0)
    {

echo <<<_END
<script>
  window.location.href = "leaguesCreateAddTeams.php";
</script>
_END;

    }
        
        else
            
    //add team to league
        {
            
    $insertTeamToLeague = $pdo->prepare('INSERT INTO leagueTables (leagueName, teamID, teamName, played, won, drawn, lost, goalsFor, goalsAgainst, goalDifference, points) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        
        //execute query and variables
$insertTeamToLeague->execute([$leagueChoice, $newTeamID, $teamNameFound, 0, 0, 0, 0, 0, 0, 0, 0]);  
            
            
        }
    }
        
    else
    //
    {

echo <<<_END
<script>
  window.location.href = "leaguesCreateAddTeams.php";
</script>
_END;
 
    }
       
 }
    
    
 if(isset($_SESSION['username'], $_SESSION['leagueChoice'], $_POST['submitRemoveTeam']))
    {
     
  // declaring dropdown variable 
  $teamToDelete = $_POST['createRemoveTeamID'];
  $leagueChoice = $_SESSION['leagueChoice'];

$deleteTeam = $pdo->prepare("DELETE FROM leagueTables WHERE leagueName=? and teamName=?");

//execute query and variables
$deleteTeam->execute([$leagueChoice, $teamToDelete]);
     
$deleteFixturesHome = $pdo->prepare("DELETE FROM fixturesResults WHERE leagueName=? and homeTeamName=?");

//execute query and variables
$deleteFixturesHome->execute([$leagueChoice, $teamToDelete]); 
     
$deleteFixturesAway = $pdo->prepare("DELETE FROM fixturesResults WHERE leagueName=? and awayTeamName=?");

//execute query and variables
$deleteFixturesAway->execute([$leagueChoice, $teamToDelete]); 
         

echo <<<_END
<script>
  window.location.href = "leaguesCreateAddTeams.php";
</script>
_END;

 }
    
    
    
    
 if(isset($_SESSION['username'], $_SESSION['leagueChoice'], $_POST['submitEditTable']))
    {
     
  // declaring dropdown variable 
  $leagueChoice         = $_SESSION['leagueChoice'];
  $minusOrAdd           = $_POST['createEditTableAddOrMinus'];
  $points               = $_POST['createEditTablePointsNumber'];
  $pointChangeToTeam    = $_POST['createEditTeamName'];
     
 if ($minusOrAdd == minus) 
        
        {
     
 switch ($points) {
        
    case "1":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 1 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
case "2":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 2 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break; 
         
case "3":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 3 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
case "4":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 4 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
case "5":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 5 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;
         
case "6":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 6 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
         
case "7":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 7 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
         
case "8":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 8 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break; 
         
         
case "9":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 9 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;
         
case "10":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 10 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break; 
         
    case "11":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 11 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
case "12":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 12 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break; 
         
case "13":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 13 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
case "14":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 14 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
case "15":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 15 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;
         
case "16":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 16 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
         
case "17":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 17 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
         
case "18":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 18 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break; 
         
         
case "19":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 19 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;
         
case "20":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 20 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;
         
    case "21":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 21 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
case "22":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 22 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break; 
         
case "23":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 23 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
case "24":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 24 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
case "25":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 25 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;
         
case "26":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 26 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
         
case "27":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 27 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
         
case "28":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 28 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break; 
         
         
case "29":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 29 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;
         
case "30":
        
$minusTeamPoints = "UPDATE leagueTables SET points = points - 30 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($minusTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break; 
         
    
 }    
 }
 
if ($minusOrAdd == add) 
        
        {
     
 switch ($points) {
        
    case "1":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 1 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
case "2":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 2 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break; 
         
case "3":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 3 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
case "4":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 4 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
case "5":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 5 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;
         
case "6":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 6 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
         
case "7":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 7 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
         
case "8":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 8 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break; 
         
         
case "9":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 9 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;
         
case "10":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 10 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break; 
         
    case "11":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 11 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
case "12":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 12 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break; 
         
case "13":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 13 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
case "14":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 14 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
case "15":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 15 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;
         
case "16":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 16 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
         
case "17":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 17 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
         
case "18":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 18 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break; 
         
         
case "19":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 19 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;
         
case "20":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 20 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;
         
    case "21":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 21 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
case "22":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 22 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break; 
         
case "23":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 23 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
case "24":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 24 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
case "25":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 25 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;
         
case "26":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 26 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
         
case "27":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 27 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;  
         
         
case "28":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 28 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break; 
         
         
case "29":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 29 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break;
         
case "30":
        
$addTeamPoints = "UPDATE leagueTables SET points = points + 30 WHERE leagueName=? and teamName=?";
        
        //execute query and variables
$pdo->prepare($addTeamPoints)->execute([$leagueChoice, $pointChangeToTeam]);
            
             break; 
         
    
 }   
 }
         

echo <<<_END
<script>
  window.location.href = "leaguesCreateAddTeams.php";
</script>
_END;

 }
    
 
if(isset($_SESSION['username'], $_SESSION['leagueChoice'], $_POST['submitLeagueNotes']))
    {
     
  // declaring dropdown variable 
  $leagueChoice         = $_SESSION['leagueChoice'];
  $leagueNotes          = $_POST['createAddTeamsNotes'];
    
    //does league already have notes
$leagueNotesAlready = $pdo->prepare('SELECT notes FROM leagueNotes WHERE leagueName=?'); 

//execute query with variables
$leagueNotesAlready->execute([$leagueChoice]);
    
    // if rows=0 add defualt league to table
    if ($leagueNotesAlready->rowCount() > 0)
    {
     
    //update notes
    $updateLeagueNotes = "UPDATE leagueNotes SET notes=? WHERE leagueName=?";
        
        //execute query and variables
        $pdo->prepare($updateLeagueNotes)->execute([$leagueNotes, $leagueChoice]); 
}
else  
//add notes to database
{
$insertLeagueNotes = $pdo->prepare('INSERT INTO leagueNotes (leagueName, notes) VALUES(?, ?)');

//execute query and variables
$insertLeagueNotes->execute([$leagueChoice, $leagueNotes]);      
}

echo <<<_END
<script>
  window.location.href = "leaguesCreateAddTeams.php";
</script>
_END;

}
    
    
    

    if(isset($_SESSION['username'], $_SESSION['leagueChoice']))
    {

        
        $leagueChoice = $_SESSION['leagueChoice'];
        
$newTeamID   = "";
$leagueNotes = "";
        
//is user in control of league
$inControlOfLeague = $pdo->prepare('SELECT * FROM leagueControl WHERE leagueName=? and username=?');

//execute query and variables
$inControlOfLeague->execute([$leagueChoice, $username]); 
        
// if rows above 0, show league
    if ($inControlOfLeague->rowCount() == 0)
    { 

echo <<<_END
<script>
  window.location.href = "leagues.php";
</script>
_END;

     }
        
//does league already have notes
$leagueNotesAlready = $pdo->prepare('SELECT notes FROM leagueNotes WHERE leagueName=?'); 

//execute query with variables
$leagueNotesAlready->execute([$leagueChoice]);
        
($leagueNotes = $leagueNotesAlready->fetchcolumn()); 
        
        
$findLeagueTable = $pdo->prepare('SELECT * FROM leagueTables WHERE leagueName=? ORDER BY points DESC, goalDifference DESC, goalsFor DESC, goalsAgainst ASC, teamName ASC');

//execute query and variables
$findLeagueTable->execute([$leagueChoice]); 
        
// if rows above 0, show league
    if ($findLeagueTable->rowCount() > 0)
    {
        
//get the rows
while($row = $findLeagueTable->fetch(PDO::FETCH_ASSOC)){  

$teamID[]               = $row["teamID"]; 
$teamName[]             = $row["teamName"]; 
$played[]               = $row["played"];  
$won[]                  = $row["won"]; 
$drawn[]                = $row["drawn"]; 
$lost[]                 = $row["lost"]; 
$goalsFor[]             = $row["goalsFor"]; 
$goalsAgainst[]         = $row["goalsAgainst"]; 
$goalDifference[]       = $row["goalDifference"];
$points[]               = $row["points"]; 
}  
$indexCount = count($teamName); 
        
        
print'<div class=CreateAddTeamsCentreAllDivs>
<table class=createLeagueTable>
<tr>
    <th> pos.</th>
    <th>team</th> 
    <th>P</th>
    <th>W</th>
    <th>D</th>
    <th>L</th> 
    <th>F</th>
    <th>A</th>
    <th>GD</th> 
    <th>points</th>
  </tr>'; 
        
for($index=0; $index < $indexCount; $index++) {  
              $rank = $index + 1;
    
//output the league table 
print'
<tr>
<td>'. $rank .'</td>
<td>'. $teamName[$index] .'</td>
<td>'. $played[$index] .'</td>
<td>'. $won[$index] .'</td>
<td>'. $drawn[$index] .'</td>
<td>'. $lost[$index] .'</td>
<td>'. $goalsFor[$index] .'</td>
<td>'. $goalsAgainst[$index] .'</td>
<td>'. $goalDifference[$index] .'</td>
<td>'. $points[$index] .'</td>
</tr>'; 

    }
        
print'
</table>
</div>'; 
        
    }
      
        //just show empty league headings
        else
            
        {
print'<div class=CreateAddTeamsCentreAllDivs>
<table class=createLeagueTable>
<tr>
    <th> pos.</th>
    <th>team</th> 
    <th>P</th>
    <th>W</th>
    <th>D</th>
    <th>L</th> 
    <th>F</th>
    <th>A</th>
    <th>GD</th> 
    <th>points</th>
  </tr>
  </table>
</div>'; 
            
        }
        
        


echo <<<_END

<div class=CreateAddTeamsCentreAllDivs>

<div id=createAddTeamsTitle>
<p>edit league</p>
</div>

<div id=createAddTeamsKeyBox>
<p>key</p>
<br>
<br>

<div id=leaguesCreateAddTeamsAddTeamDiv>
<button type="button" name='leaguesCreateAddTeamsAddTeamButton' id='leaguesCreateAddTeamsAddTeamButton'>add team</button>
</div>

<br>

<div id=leaguesCreateAddTeamsRemoveTeamDiv>
<button type="button" name='leaguesCreateAddTeamsRemoveTeamButton' id='leaguesCreateAddTeamsRemoveTeamButton'>remove team</button>
</div>

<br>

<div id=leaguesCreateAddTeamsEditTableDiv>
<button type="button" name='leaguesCreateAddTeamsEditTableButton' id='leaguesCreateAddTeamsEditTableButton'>edit points</button>
</div>

</div>

<div id=createAddTeamsLeagueTitle>
<p>$leagueChoice</p>
</div>

<form action="leaguesCreateAddTeams.php" method="post" id="leagueNotesForm">

<textarea name="createAddTeamsNotes" id="createAddTeamsNotes" maxlength="500" placeholder="NOTES e.g team A: -3 points for fielding an illegible player">$leagueNotes</textarea>

<input type="submit" name="submitLeagueNotes" value="add league notes" id="submitLeagueNotes" />

</form>

<div id=createFinishedEditingTable>

<button type="button" name="leaguesReturnToLeaguesButton" id="leaguesReturnToLeaguesButton">return to leagues</button>

<button type="button" name="leaguesNavigateToFixturesButton" id="leaguesNavigateToFixturesButton">edit fixtures</button>

</div>

</div>


  <div id=createAddTeamPopup>
    
     <form action="leaguesCreateAddTeams.php" method="post" id="createAddTeamForm">

    <div id=createAddTeamTitle>
    <p>enter team ID</p>
    </div>
    
    <input type="text" name="createAddTeamID" value="$newTeamID" id="createAddTeamID" />
      
    <div id=checkTeamID>
    </div>
        
        
    <div id=createAddTeamPopupButtons>
    <div id=cancelCreateAddTeam>
     <button type="button" class="cancelAddTeam">cancel</button>
    </div>
    <div id=submitCreateAddTeam>
     <input type="submit" name="submitAddTeam" value="add team" id="submitAddTeam" />
     </div>
    </div>        
        
    </form>

    </div> 
    
    
  <div id=createRemoveTeamPopup>
    
     <form action="leaguesCreateAddTeams.php" method="post" id="createRemoveTeamForm">

    <div id=createRemoveTeamTitle>
    <p>select team</p>
    </div>

_END;

        //find all teams in the league
$teamsInLeague = $pdo->prepare('SELECT teamName FROM leagueTables WHERE leagueName=?'); 

//execute query with variables
$teamsInLeague->execute([$leagueChoice]);       
        
$teamToRemove = $teamsInLeague->fetchAll(); 
        
        
print '<select name="createRemoveTeamID" id="createRemoveTeamID">';
foreach ($teamToRemove as $row) {
print '<option value="'.$row['teamName'].'">'.$row['teamName'].'</option>';
    }
print '</select>';

     

echo <<<_END

    <div id=createRemoveTeamExplanation>
    <p>NOTE - removing a team from the league will also remove any fixtures where this team is involved.<br>however, any results containing teams still in the league will still stand.</p>
    </div>

    <div id=createRemoveTeamPopupButtons>
    <div id=cancelCreateRemoveTeam>
     <button type="button" class="cancelRemoveTeam">cancel</button>
    </div>
    <div id=submitCreateRemoveTeam>
     <input type="submit" name="submitRemoveTeam" value="remove team" id="submitRemoveTeam" />
     </div>
    </div>        
        
    </form>

    </div> 
    
    
<div id=createEditTablePopup>
    
     <form action="leaguesCreateAddTeams.php" method="post" id="createEditTeamForm">

    <div id=createEditTableExplanation>
    <p>editing the points within a table must only be done in certain circumstances.<br>for example, if a team has played an unregistered player, or is behind in payments.<br><br>If points are changed, please place a note explaining the reason<br>and the point difference in the 'league notes' section. </p>
    </div>
    
    <select name="createEditTableAddOrMinus" id="createEditTableAddOrMinus">
    <option value="minus">minus</option>
    <option value="add">add</option>
    </select>
    
    <select name="createEditTablePointsNumber" id="createEditTablePointsNumber">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    <option value="26">26</option>
    <option value="27">27</option>
    <option value="28">28</option>
    <option value="29">29</option>
    <option value="30">30</option>
    </select>

_END;
  
print '<select name="createEditTeamName" id="createEditTeamName">';
foreach ($teamToRemove as $row) {
print '<option value="'.$row['teamName'].'">'.$row['teamName'].'</option>';
    }
print '</select>';        
        

echo <<<_END

    <div id=createEditTeamsMiddleOfSentance>
    <p>points from/to</p>
    </div>

        
        
    <div id=createEditTablePopupButtons>
    <div id=cancelCreateEditTable>
     <button type="button" class="cancelEditTable">cancel</button>
    </div>
    <div id=submitCreateEditTable>
     <input type="submit" name="submitEditTable" value="edit points" id="submitEditTable" />
     </div>
    </div>        
        
    </form>

    </div> 

_END;

     }
 

?>

    </body>

</html>