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
        <link href="fixturesResultsEdit.css" type="text/css"
              rel="stylesheet">
       
       
    <!--link to call jquery file to bring up key buttons-->
    <script
    src='fixturesResultsEditPopups.js'>
    </script> 
       
    <!--link to call jquery file to cancel key buttons-->
    <script
    src='fixturesResultsEditCancelPopup.js'>
    </script> 
       
    <!--link to call jquery file to navigate to different pages-->
    <script
    src='fixturesResultsEditNavigationButtons.js'>
    </script> 
       
    <!--link to call jquery file to send fixture id to edit page and results page-->
    <script
    src='fixturesResultsEditFixtureID.js'>
    </script> 

    
           </head>
    
<body>  

<?php 

if(isset($_SESSION['username'], $_SESSION['leagueChoice'], $_POST['submitAddFixture']))
    {
     
$leagueChoiceFixture   = $_SESSION['leagueChoice'];
$homeTeamNameFixture   = $_POST['fixturesResultsEditHomeTeamDropdown'];
$awayTeamNameFixture   = $_POST['fixturesResultsEditAwayTeamDropdown'];
$detailsFixture        = $_POST['fixturesResultsEditDetails'];
    
    // declaring date variables
    $day=$_POST['fixturesResultsEditAddDay'];
    $month=$_POST['fixturesResultsEditAddMonth'];
    $year=$_POST['fixturesResultsEditAddYear'];
    
    $fixtureDate = $year.'-'.$month.'-'.$day; 
    
    // declaring time variables
    $hour=$_POST['fixturesResultsEditGameHour'];
    $minute=$_POST['fixturesResultsEditGameMinute'];
    
    $fixtureTime = $hour.':'.$minute.':00';
    
    
    
    //find team id of home team
$teamIDForFixturesHome = $pdo->prepare('SELECT teamID FROM leagueTables WHERE leagueName=? and teamName=?'); 

//execute query with variables
$teamIDForFixturesHome->execute([$leagueChoiceFixture, $homeTeamNameFixture]);
    
($homeTeamIDFixture = $teamIDForFixturesHome->fetchcolumn());
    
    
    
//find team id of away team
$teamIDForFixturesAway = $pdo->prepare('SELECT teamID FROM leagueTables WHERE leagueName=? and teamName=?'); 

//execute query with variables
$teamIDForFixturesAway->execute([$leagueChoiceFixture, $awayTeamNameFixture]);
    
($awayTeamIDFixture = $teamIDForFixturesAway->fetchcolumn());
    
    
    $insertFixture = $pdo->prepare('INSERT INTO fixturesResults (leagueName, homeTeamID, homeTeamName, awayTeamName, awayTeamID, gameTime, gameDate, details) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        
        //execute query and variables
$insertFixture->execute([$leagueChoiceFixture, $homeTeamIDFixture, $homeTeamNameFixture, $awayTeamNameFixture, $awayTeamIDFixture, $fixtureTime, $fixtureDate, $detailsFixture]); 
    

echo <<<_END
<script>
  window.location.href = "fixturesResultsEdit.php";
</script>
_END;

       
 }
    
    
    
    
    
    
if(isset($_SESSION['username'], $_SESSION['leagueChoice'], $_POST['submitRemoveFixture']))
    {
     
$leagueChoiceFixture   = $_SESSION['leagueChoice'];
$fixtureID             = $_POST['fixturesResultsEditRemoveFixtureDropdown'];

    
//find team id and name of teams in fixture
$fixtureTeams = $pdo->prepare('SELECT * FROM fixturesResults WHERE leagueName=? and id=?'); 

//execute query with variables
$fixtureTeams->execute([$leagueChoiceFixture, $fixtureID]);
    
while($list = $fixtureTeams->fetch(PDO::FETCH_ASSOC)){ 
    

$homeTeamID              = $list["homeTeamID"];  
$homeTeamName            = $list["homeTeamName"]; 
$previousHomeTeamScore   = $list["homeTeamScore"]; 
$previousAwayTeamScore   = $list["awayTeamScore"]; 
$awayTeamName            = $list["awayTeamName"]; 
$awayTeamID              = $list["awayTeamID"]; 
}
    
$previousHomeTeamGoalDifference = ($previousHomeTeamScore - $previousAwayTeamScore);
$previousAwayTeamGoalDifference = ($previousAwayTeamScore - $previousHomeTeamScore);    
    
//if score was never entered (both null)
if ($previousHomeTeamScore === NULL || $previousAwayTeamScore === NULL)
{
}

//if score was previously a draw and is changed    
else if ($previousHomeTeamScore === $previousAwayTeamScore)
{
    //take away draw from result
    //update draw in leagues for home team
    $minusDrawHomeTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($minusDrawHomeTeam)->execute([-1, 0, -1, 0, -$previousHomeTeamScore, -$previousAwayTeamScore, -$previousHomeTeamGoalDifference, -1, $homeTeamID]);
      
    //update draw in leagues for away team
    $minusDrawAwayTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($minusDrawAwayTeam)->execute([-1, 0, -1, 0, -$previousAwayTeamScore, -$previousHomeTeamScore, -$previousAwayTeamGoalDifference, -1, $awayTeamID]);
}
    
    
//if score was previously a home win and is changed
else if ($previousHomeTeamScore > $previousAwayTeamScore)
{
    //take away home win from previous result
    //update home win in leagues for home team
    $minusHomeWinHomeTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($minusHomeWinHomeTeam)->execute([-1, -1, 0, 0, -$previousHomeTeamScore, -$previousAwayTeamScore, -$previousHomeTeamGoalDifference, -3, $homeTeamID]);
      
    //update home win in leagues for away team
    $minusHomeWinAwayTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($minusHomeWinAwayTeam)->execute([-1, 0, 0, -1, -$previousAwayTeamScore, -$previousHomeTeamScore, -$previousAwayTeamGoalDifference, 0, $awayTeamID]);
}
    

    
//if previous result was away win and is changed    
else if ($previousHomeTeamScore < $previousAwayTeamScore)
{
 //take away away win from previous result
    //update away win in leagues for home team
    $minusAwayWinHomeTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($minusAwayWinHomeTeam)->execute([-1, 0, 0, -1, -$previousHomeTeamScore, -$previousAwayTeamScore, -$previousHomeTeamGoalDifference, 0, $homeTeamID]);
      
    //update away win in leagues for away team
    $minusAwayWinAwayTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($minusAwayWinAwayTeam)->execute([-1, -1, 0, 0, -$previousAwayTeamScore, -$previousHomeTeamScore, -$previousAwayTeamGoalDifference, -3, $awayTeamID]);
}
    

    

$deleteFixture = $pdo->prepare("DELETE FROM fixturesResults WHERE id=?");

//execute query and variables
$deleteFixture->execute([$fixtureID]);  

echo <<<_END
<script>
  window.location.href = "fixturesResultsEdit.php";
</script>
_END;

}
    
    
    
    
    


    if(isset($_SESSION['username'], $_SESSION['leagueChoice']))
    {

        
        $leagueChoice = $_SESSION['leagueChoice'];

        
//is user in control of league
$inControlOfLeague = $pdo->prepare('SELECT * FROM leagueControl WHERE leagueName=? and username=?');

//execute query and variables
$inControlOfLeague->execute([$leagueChoice, $username]); 
        
// if rows above 0, show league
    if ($inControlOfLeague->rowCount() == 0)
    { 

echo <<<_END
<script>
  window.location.href = "fixturesResults.php";
</script>
_END;

     }

print'<div class=fixturesResultsEditCentreAllDivs>
<div class=gameDateWithData>';
        
        
$findFixturesResultsGameDate = $pdo->prepare('SELECT DISTINCT gameDate FROM fixturesResults WHERE leagueName=? ORDER BY gameDate ASC');

//execute query and variables
$findFixturesResultsGameDate->execute([$leagueChoice]); 
        
// if rows above 0, show league
    if ($findFixturesResultsGameDate->rowCount() > 0)
    {
       
//get the results
while($differentGameDate = $findFixturesResultsGameDate->fetch(PDO::FETCH_ASSOC)){  
    
 $gameDate[]             = $differentGameDate["gameDate"];
}

$gameDateCount = count($gameDate);
              
       
for($indexGameDate=0; $indexGameDate < $gameDateCount; $indexGameDate++) { 

    
$findFixturesResultsInfo = $pdo->prepare('SELECT * FROM fixturesResults WHERE leagueName=? and gameDate=? ORDER BY gameTime ASC, homeTeamName ASC');

//execute query and variables
$findFixturesResultsInfo->execute([$leagueChoice, $gameDate[$indexGameDate]]);
   

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
    <th>id</th>
    <th>time</th>
    <th>home team</th> 
    <th>score</th>
    <th>away team</th> 
    <th>details</th>
  </tr>'; 
    
for($index=0; $index < $indexCount; $index++) {
    
//output the league table 
print'
<tr>
<td>'. $fixtureID[$index] .'</td>
<td>'. $gameTime[$index] .'</td>
<td>'. $homeTeamName[$index] .'</td>
<td>'. $homeTeamScore[$index] . '-' . $awayTeamScore[$index] .'</td>
<td>'. $awayTeamName[$index] .'</td>
<td>'. $details[$index] .'</td>
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
print'<p>no fixtures have been made for this league.<br><br>click add fixture in the key to create one.</p>'; 
            
        }
  
//end of table divs
print'</div>
</div>';
        
       


echo <<<_END

<div class=fixturesResultsEditCentreAllDivs>

<div id=fixturesResultsEditTitle>
<p>edit fixtures and results</p>
</div>

<div id=fixturesResultsEditKeyBox>
<p>key</p>
<br>
<br>

<div id=fixturesResultsEditAddResultDiv>
<button type="button" name='fixturesResultsEditAddResultButton' id='fixturesResultsEditAddResultButton'>add result</button>
</div>

<br>

<div id=fixturesResultsEditAddFixtureDiv>
<button type="button" name='fixturesResultsEditAddFixtureButton' id='fixturesResultsEditAddFixtureButton'>add fixture</button>
</div>


<br>

<div id=fixturesResultsEditRemoveFixtureDiv>
<button type="button" name='fixturesResultsEditRemoveFixtureButton' id='fixturesResultsEditRemoveFixtureButton'>remove fixture</button>
</div>


<br>

<div id=fixturesResultsEditEditFixtureDiv>
<button type="button" name='fixturesResultsEditEditFixtureButton' id='fixturesResultsEditEditFixtureButton'>edit fixture</button>
</div>

</div>

<div id=fixturesResultsEditLeagueTitle>
<p>$leagueChoice</p>
</div>

<div id=fixturesResultsEditFinishedEditingTable>

<button type="button" name="fixturesResultsEditReturnToFixturesButton" id="fixturesResultsEditReturnToFixturesButton">return to fixtures/results</button>

<button type="button" name="fixturesResultsEditNavigateToLeaguesButton" id="fixturesResultsEditNavigateToLeaguesButton">edit league</button>

</div>

</div>

<div id=fixturesResultsEditAddFixturePopup>
    
     <form action="fixturesResultsEdit.php" method="post" id="fixturesResultsEditAddFixtureForm">

    <div id=fixturesResultsEditAddFixtureTitle>
    <p>add fixture</p>
    </div>
    
    <div id=fixturesResultsEditAddDateTitle>
    <p>date</p>
    </div>
    
    <div id=fixturesResultsEditAddTimeTitle>
    <p>time</p>
    </div>
    
    <div id=fixturesResultsEditAddTimeColonTitle>
    <p>:</p>
    </div>
    
    <div id=fixturesResultsEditAddHomeTeamTitle>
    <p>home team</p>
    </div>
    
    <div id=fixturesResultsEditAddVTitle>
    <p>v</p>
    </div>
    
    <div id=fixturesResultsEditAddAwayTeamTitle>
    <p>away team</p>
    </div>
    
    <div id=fixturesResultsEditAddDetailsTitle>
    <p>details</p>
    </div>
    
    <select name="fixturesResultsEditAddDay" id="fixturesResultsEditAddDay">
      <option value="01">01</option>
      <option value="02">02</option>
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07">07</option>
      <option value="08">08</option>
      <option value="09">09</option>
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
      <option value="31">31</option>
    </select>
    <select name="fixturesResultsEditAddMonth" id="fixturesResultsEditAddMonth">
      <option value="01">january</option>
      <option value="02">february</option>
      <option value="03">march</option>
      <option value="04">april</option>
      <option value="05">may</option>
      <option value="06">june</option>
      <option value="07">july</option>
      <option value="08">august</option>
      <option value="09">september</option>
      <option value="10">october</option>
      <option value="11">november</option>
      <option value="12">december</option>
    </select>
    <select name="fixturesResultsEditAddYear" id="fixturesResultsEditAddYear">
      <option value="2017">2017</option>
      <option value="2018">2018</option>
    </select>
    
    <select name="fixturesResultsEditGameHour" id="fixturesResultsEditGameHour">
      <option value="00">00</option>
      <option value="01">01</option>
      <option value="02">02</option>
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07">07</option>
      <option value="08">08</option>
      <option value="09">09</option>
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
    </select>
    <select name="fixturesResultsEditGameMinute" id="fixturesResultsEditGameMinute">
      <option value="00">00</option>
      <option value="05">05</option>
      <option value="10">10</option>
      <option value="15">15</option>
      <option value="20">20</option>
      <option value="25">25</option>
      <option value="30">30</option>
      <option value="35">35</option>
      <option value="40">40</option>
      <option value="45">45</option>
      <option value="50">50</option>
      <option value="55">55</option>
    </select>

_END;

        //find all teams in the league
$teamsInLeague = $pdo->prepare('SELECT teamName FROM leagueTables WHERE leagueName=? ORDER BY teamName ASC'); 

//execute query with variables
$teamsInLeague->execute([$leagueChoice]);       
        
$teamToSelect = $teamsInLeague->fetchAll(); 
        
        
print '<select name="fixturesResultsEditHomeTeamDropdown" id="fixturesResultsEditHomeTeamDropdown">';
foreach ($teamToSelect as $list) {
print '<option value="'.$list['teamName'].'">'.$list['teamName'].'</option>';
    }
print '</select>';
        
print '<select name="fixturesResultsEditAwayTeamDropdown" id="fixturesResultsEditAwayTeamDropdown">';
foreach ($teamToSelect as $list) {
print '<option value="'.$list['teamName'].'">'.$list['teamName'].'</option>';
    }
print '</select>';

     

echo <<<_END

    <textarea name="fixturesResultsEditDetails" id="fixturesResultsEditDetails" maxlength="100" placeholder="eg. pitch 1"></textarea>

    <div id=fixturesResultsEditAddFixturePopupButtons>
    <div id=cancelFixturesResultsEditAddFixture>
     <button type="button" class="cancelAddFixture">cancel</button>
    </div>
    <div id=submitFixturesResultsEditAddFixture>
     <input type="submit" name="submitAddFixture" value="add fixture" id="submitAddFixture" />
     </div>
    </div>        
        
    </form>

    </div>
    
<div id=fixturesResultsEditRemoveFixturePopup>
    
     <form action="fixturesResultsEdit.php" method="post" id="fixturesResultsEditRemoveFixtureForm">
     
     <div id=fixturesResultsEditRemoveFixtureTitle>
    <p>remove fixture</p>
    </div>
     
      <div id=fixturesResultsEditRemoveIDTitle>
    <p>select fixture id</p>
    </div>

   
_END;

        //find all teams in the league
$fixtureToRemove = $pdo->prepare('SELECT id FROM fixturesResults WHERE leagueName=? ORDER BY id ASC'); 

//execute query with variables
$fixtureToRemove->execute([$leagueChoice]);       
        
$removeFixtureID = $fixtureToRemove->fetchAll(); 
        
        
print '<select name="fixturesResultsEditRemoveFixtureDropdown" id="fixturesResultsEditRemoveFixtureDropdown">';
foreach ($removeFixtureID as $list) {
print '<option value="'.$list['id'].'">'.$list['id'].'</option>';
    }
print '</select>';

     

echo <<<_END

    <div id=fixturesResultsEditRemoveFixtureExplanation>
    <p>NOTE - removing a fixture will also remove and scores and results within the league table</p>
    </div>

    <div id=fixturesResultsEditRemoveFixturePopupButtons>
    <div id=cancelFixturesResultsEditRemoveFixture>
     <button type="button" class="cancelRemoveFixture">cancel</button>
    </div>
    <div id=submitFixturesResultsEditRemoveFixture>
     <input type="submit" name="submitRemoveFixture" value="remove fixture" id="submitRemoveFixture" />
     </div>
    </div>        
        
    </form>

    </div>
    
    
<div id=fixturesResultsEditEditFixturePopup>
    
     <form action="fixturesResultsEdit.php" method="post" id="fixturesResultsEditEditFixtureForm">
     
     <div id=fixturesResultsEditEditFixtureTitle>
    <p>edit fixture</p>
    </div>
     
      <div id=fixturesResultsEditEditIDTitle>
    <p>select fixture id</p>
    </div>

   
_END;

        //find all teams in the league
$fixtureToEdit = $pdo->prepare('SELECT id FROM fixturesResults WHERE leagueName=? ORDER BY id ASC'); 

//execute query with variables
$fixtureToEdit->execute([$leagueChoice]);       
        
$EditFixtureID = $fixtureToEdit->fetchAll(); 
        
        
print '<select name="fixturesResultsEditEditFixtureDropdown" id="fixturesResultsEditEditFixtureDropdown">';
foreach ($EditFixtureID as $list) {
print '<option value="'.$list['id'].'">'.$list['id'].'</option>';
    }
print '</select>';

     

echo <<<_END


    <div id=fixturesResultsEditEditFixturePopupButtons>
    <div id=cancelFixturesResultsEditEditFixture>
     <button type="button" class="cancelEditFixture">cancel</button>
    </div>
    <div id=submitFixturesResultsEditEditFixture>
     <input type="submit" name="submitEditFixture" value="edit fixture" id="submitEditFixture" />
     </div>
    </div>        
        
    </form>

    </div>


<div id=fixturesResultsEditAddResultPopup>
    
     <form action="fixturesResultsEdit.php" method="post" id="fixturesResultsEditAddResultForm">
     
     <div id=fixturesResultsEditAddResultTitle>
    <p>add result</p>
    </div>
     
      <div id=fixturesResultsEditAddResultSelectFixtureTitle>
    <p>select fixture id</p>
    </div>

   
_END;
        
        
print '<select name="fixturesResultsEditAddResultDropdown" id="fixturesResultsEditAddResultDropdown">';
foreach ($EditFixtureID as $list) {
print '<option value="'.$list['id'].'">'.$list['id'].'</option>';
    }
print '</select>';

     

echo <<<_END


    <div id=fixturesResultsEditAddResultPopupButtons>
    <div id=cancelFixturesResultsEditAddResult>
     <button type="button" class="cancelAddResult">cancel</button>
    </div>
    <div id=submitFixturesResultsEditAddResult>
     <input type="submit" name="submitAddResult" value="add result" id="submitAddResult" />
     </div>
    </div>        
        
    </form>

    </div>

_END;

     }
 

?>

    </body>

</html>