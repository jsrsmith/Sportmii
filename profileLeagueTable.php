<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="profileLeagueTable.css" rel="stylesheet" type="text/css"/>
        
          <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

        
    <!--link to call jquery file to bring up popup on click-->
    <script
    src='profileLeagueTablePopup.js'>
    </script>
        
    <!--link to call jquery file to close popup-->
    <script
    src='profileLeagueTableCancelPopup.js'>
    </script>
        
    </head>
    
    <body>

<?php
        
//if change default team is pressed
if(isset( $_SESSION['username'], $_POST['submitDefaultTeam']))
{
    
// declaring dropdown variable 
  $defaultTeam = $_POST['defaultTeamForLeagueTableDropdown'];

$insertDefaultTeam = $pdo->prepare('INSERT INTO defaultTeams (teamName, username) VALUES (?, ?)');
        
        //execute query and variables
$insertDefaultTeam->execute([$defaultTeam, $username]); 
         

echo <<<_END
<script>
  window.location.href = "profile.php";
</script>
_END;

}
        
        
        
        

//if change default league is pressed
if(isset( $_SESSION['username']))
{
    
  //see if username already has a default league
    $defaultLeagueAlready = $pdo->prepare('SELECT league FROM defaultLeagues WHERE username=?'); 

//execute query with variables
$defaultLeagueAlready->execute([$username]);
    
    // if rows=0 add defualt league to table
    if ($defaultLeagueAlready->rowCount() == 0)
    {

echo <<<_END

<div class=profileLeagueExplanation>
<p>to show a league table and fixtures on your profile page, navigate to 'leagues' on the top menu. from here select a league and press go. Once the legue is shown, click 'make this my defualt league' in the top right.</p>
</div>


_END;

    }
   
    //show basic table
    else
    {  
     ($leagueName = $defaultLeagueAlready->fetchcolumn());
        
     //see if username already has a default team
    $defaultTeamAlready = $pdo->prepare('SELECT teamName FROM defaultTeams WHERE username=?'); 

//execute query with variables
$defaultTeamAlready->execute([$username]);
    
    // if rows=0 add defualt league to table
    if ($defaultTeamAlready->rowCount() == 0)
    {   
        

echo <<<_END

<div class=profileFixturesExplanation>
<p>to show leagues and fixtures on your profile page, click the button below to setup a default team of your choice.</p>
</div>

<button type="button" name='profileDefaultLeagueTeam' class='profileDefaultLeagueTeam'>change default<br>team</button>

<div class=defaultTeamForLeagueTablePopup>
    
     <form action="profileLeagueTable.php" method="post" id="defaultTeamForLeagueTableForm">
     
     <div class=defaultTeamForLeagueTableTitle>
    <p>default team</p>
    </div>
     
      <div class=defaultTeamForLeagueTableSelectTeam>
    <p>select team</p>
    </div>


_END;

        //find all teams in the league
$defaultTeamInLeague = $pdo->prepare('SELECT teamName FROM leagueTables WHERE leagueName=? ORDER BY id ASC'); 

//execute query with variables
$defaultTeamInLeague->execute([$leagueName]);       
        
$defaultTeams = $defaultTeamInLeague->fetchAll(); 
        
        
print '<select name="defaultTeamForLeagueTableDropdown" class="defaultTeamForLeagueTableDropdown">';
foreach ($defaultTeams as $list) {
print '<option value="'.$list['teamName'].'">'.$list['teamName'].'</option>';
    }
print '</select>';

     

echo <<<_END

    <div class=defaultTeamForLeagueTableExplanation>
    <p>NOTE - to select a different league and team, change your default league under 'leagues' in the top menu</p>
    </div>

    <div class=defaultTeamForLeagueTablePopupButtons>
    <div class=canceldefaultTeamForLeagueTable>
     <button type="button" class="cancelDefaultTeam">cancel</button>
    </div>
    <div class=submitdefaultTeamForLeagueTable>
     <input type="submit" name="submitDefaultTeam" value="save" class="submitDefaultTeam" />
     </div>
    </div>        
        
    </form>

    </div>

_END;

    }
         
    else
       
    {        
        
        
    ($defaultTeamName = $defaultTeamAlready->fetchcolumn());     
        
 $findLeagueTable = $pdo->prepare('SELECT * FROM leagueTables WHERE leagueName=? ORDER BY points DESC, goalDifference DESC, goalsFor DESC, goalsAgainst ASC, teamName ASC');

//execute query and variables
$findLeagueTable->execute([$leagueName]); 
        
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
        
        
print'<div class=leagueTitle>
<p>'.$leagueName.'</p>
</div>
<div class=leaguesCentreAllDivs>
<table class=createLeagueTable>
<tr>
    <th></th>
    <th>team</th> 
    <th>P</th>
    <th>GD</th> 
    <th>Pts</th>
  </tr>'; 
        
for($index=0; $index < $indexCount; $index++) {  
              $rank = $index + 1;
    
//output the league table 
print'
<tr>
<td>'. $rank .'</td>
<td>'. $teamName[$index] .'</td>
<td>'. $played[$index] .'</td>
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
print'<div class=leagueTitle>
<p>'.$leagueName.'</p>
</div>
<div class=leaguesCentreAllDivs>
<table class=createLeagueTable>
<tr>
    <th></th>
    <th>team</th> 
    <th>P</th>
    <th>GD</th> 
    <th>Pts</th>
  </tr>
  </table>
</div>';
            
        }  
        

echo <<<_END

  <button type="button" class="changeDefaultLeagueInstruction">change league</button>
     
        
<div class=changeDefaultLeagueInstructionPopup>        
        
        
 <div class=changeLeagueTableExplanation>
    <p>NOTE - to select a different league and team, change your default league under 'leagues' in the top menu or click leagues below. Once this has been changed, a new team can be selected.</p>
    </div>
    
 <form action="leagues.php" method="post" id="navigateToLeaguesForm">
 
<button type="submit" class="navigateToLeague">leagues</button>

</form>



<button type="button" class="cancelNavigateToLeague">cancel</button>
     
       
        
 </div>       


_END;

        
        

//start of all fixtures        
        
$findFixturesResultsGameDate = $pdo->prepare('SELECT DISTINCT gameDate FROM fixturesResults WHERE leagueName=? AND (homeTeamName=? OR awayTeamName=?) ORDER BY gameDate ASC');

//execute query and variables
$findFixturesResultsGameDate->execute([$leagueName, $defaultTeamName, $defaultTeamName]); 
        
// if rows above 0, show league
    if ($findFixturesResultsGameDate->rowCount() > 0)
    {
       
//get the results
while($differentGameDate = $findFixturesResultsGameDate->fetch(PDO::FETCH_ASSOC)){  
    
 $gameDate[]             = $differentGameDate["gameDate"];
}

$gameDateCount = count($gameDate);
              
       
for($indexGameDate=0; $indexGameDate < $gameDateCount; $indexGameDate++) { 

    
$findFixturesResultsInfo = $pdo->prepare('SELECT * FROM fixturesResults WHERE leagueName=? AND gameDate=? AND (homeTeamName=? OR awayTeamName=?) ORDER BY gameTime ASC, homeTeamName ASC');

//execute query and variables
$findFixturesResultsInfo->execute([$leagueName, $gameDate[$indexGameDate], $defaultTeamName, $defaultTeamName]);
   

if ($findFixturesResultsInfo->rowCount() > 0)
    {
    
//get the fixtures in each gamedate
while($row = $findFixturesResultsInfo->fetch(PDO::FETCH_ASSOC)){ 
    
$fixtureID[]            = $row["id"];
$distinctGameDate       = $row["gameDate"];
$gameTime[]             = $row["gameTime"]; 
$homeTeamID[]           = $row["homeTeamID"];  
$homeTeamName[]         = $row["homeTeamName"]; 
$homeTeamScore[]        = $row["homeTeamScore"]; 
$awayTeamScore[]        = $row["awayTeamScore"]; 
$awayTeamName[]         = $row["awayTeamName"]; 
$awayTeamId[]           = $row["awayTeamID"]; 
$details[]              = $row["details"];
}  
$indexCount = count($fixtureID);
    
//explode gameDate into three different dropdowns
list($fixtureYear, $fixtureMonth, $fixtureDay) = explode('-', $distinctGameDate);

switch ($fixtureMonth) {
        
    case "01":
        
        $fixtureFullMonth = 'january';
            
             break;
    
    case "02":
        
        $fixtureFullMonth = 'february';
            
             break;
        
     case "03":
        
        $fixtureFullMonth = 'march';
            
             break; 
        
    case "04":
        
        $fixtureFullMonth = 'april';
            
             break;
        
    case "05":
        
        $fixtureFullMonth = 'may';
            
             break;
        
    case "06":
        
        $fixtureFullMonth = 'june';
            
             break;
        
    case "07":
        
        $fixtureFullMonth = 'july';
            
             break;
        
    case "08":
        
        $fixtureFullMonth = 'august';
            
             break;
        
    case "09":
        
        $fixtureFullMonth = 'september';
            
             break;
        
    case "10":
        
        $fixtureFullMonth = 'october';
            
             break;
        
    case "11":
        
        $fixtureFullMonth = 'november';
            
             break;
        
    case "12":
        
        $fixtureFullMonth = 'december';
            
             break;       
    
}
    
    
 foreach ($gameTime as $key => $value) {
  $gameTime[$key] = substr($value, 0, -3);  
}

//start of table divs
print'<div class=createGameDateTableTitle>
<p>'. $fixtureDay .' '. $fixtureFullMonth .' '. $fixtureYear .'</p>
</div>
<div class=createGameDateTableDiv>
<table class=createGameDateTable>
<tr>
    <th>time</th>
    <th>home team</th> 
    <th>score</th>
    <th>away team</th> 
  </tr>'; 
    
for($index=0; $index < $indexCount; $index++) {
    
//output the league table 
print'
<tr>
<td>'. $gameTime[$index] .'</td>
<td>'. $homeTeamName[$index] .'</td>
<td>'. $homeTeamScore[$index] . '-' . $awayTeamScore[$index] .'</td>
<td>'. $awayTeamName[$index] .'</td>
</tr>'; 
    
}
 
print '</table>
</div>';
    
unset($fixtureID);
unset($distinctGameDate);
unset($gameTime);
unset($homeTeamID);
unset($homeTeamName);
unset($homeTeamScore);
unset($awayTeamScore); 
unset($awayTeamName);
unset($awayTeamId);
unset($details);

}
    }
    }

    //just show empty headings
        else
            
        {
print'<div class=profileNoFixturesSet>
<p>no fixtures have been made for this league.</p>
</div>'; 
            
        }
       
        
        
        
}
    }
        }


?>

    </body>
</html>

