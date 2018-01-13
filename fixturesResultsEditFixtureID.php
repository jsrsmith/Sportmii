<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="fixturesResultsEdit.css" rel="stylesheet" type="text/css"/>
        
        <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

  <!--link to call jquery file to cancel key buttons-->
    <script
    src='fixturesResultsEditCancelPopup.js'>
    </script>       
    
<?php
        
        
if(isset($_SESSION['username'], $_SESSION['leagueChoice'], $_POST['submitFixtureIDAddFixture']))
    {
     
$leagueChoiceFixture   = $_SESSION['leagueChoice'];
$homeTeamNameFixture   = $_POST['homeTeamNameFromEdit'];
$awayTeamNameFixture   = $_POST['awayTeamNameFromEdit'];
$detailsFixture        = $_POST['fixturesResultsEditFixtureIDDetails'];
$fixtureID             = $_POST['fixtureIDFromEdit'];
    
    // declaring date variables
    $day=$_POST['fixturesResultsEditFixtureIDAddDay'];
    $month=$_POST['fixturesResultsEditFixtureIDAddMonth'];
    $year=$_POST['fixturesResultsEditFixtureIDAddYear'];
    
    $fixtureDate = $year.'-'.$month.'-'.$day; 
    
    // declaring time variables
    $hour=$_POST['fixturesResultsEditFixtureIDGameHour'];
    $minute=$_POST['fixturesResultsEditFixtureIDGameMinute'];
    
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
    
    
    $editFixture = $pdo->prepare('UPDATE fixturesResults SET leagueName=?, homeTeamID=?, homeTeamName=?, awayTeamName=?, awayTeamID=?, gameTime=?, gameDate=?, details=? WHERE id=?');
        
        //execute query and variables
$editFixture->execute([$leagueChoiceFixture, $homeTeamIDFixture, $homeTeamNameFixture, $awayTeamNameFixture, $awayTeamIDFixture, $fixtureTime, $fixtureDate, $detailsFixture, $fixtureID]); 
    

echo <<<_END
<script>
  window.location.href = "fixturesResultsEdit.php";
</script>
_END;

       
 }
        
        
        


if(isset($_SESSION['username'], $_SESSION['leagueChoice'], $_POST['fixtureID']))
    {
    
$leagueChoice          = $_SESSION['leagueChoice'];
$fixtureID             = $_POST['fixtureID'];

$findFixturesToEdit = $pdo->prepare('SELECT * FROM fixturesResults WHERE leagueName=? and id=?');

//execute query and variables
$findFixturesToEdit->execute([$leagueChoice, $fixtureID]);

    
while($row = $findFixturesToEdit->fetch(PDO::FETCH_ASSOC)){ 
    

$gameDate                = $row["gameDate"];
$gameTime                = $row["gameTime"]; 
$homeTeamID              = $row["homeTeamID"];  
$homeTeamName            = $row["homeTeamName"]; 
$homeTeamScore           = $row["homeTeamScore"]; 
$awayTeamScore           = $row["awayTeamScore"]; 
$awayTeamName            = $row["awayTeamName"]; 
$awayTeamId              = $row["awayTeamID"]; 
$details                 = $row["details"];
} 
   
//explode gameDate into three different dropdowns
list($fixtureYear, $fixtureMonth, $fixtureDay) = explode('-', $gameDate);

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
    
//explode gameTime into three different dropdowns
list($gameTimeHour, $gameTimeMinute, $gameTimeSeconds) = explode(':', $gameTime);

echo <<<_END

<div id=fixturesResultsEditFixtureIDAddFixturePopup>
    
     <form action="fixturesResultsEditFixtureID.php" method="post" id="fixturesResultsEditFixtureIDAddFixtureForm">
     
     <input type="hidden" name="fixtureIDFromEdit" value="$fixtureID">
     <input type="hidden" name="homeTeamNameFromEdit" value="$homeTeamName">
     <input type="hidden" name="awayTeamNameFromEdit" value="$awayTeamName">

    <div id=fixturesResultsEditFixtureIDAddFixtureTitle>
    <p>edit fixture</p>
    </div>
    
    <div id=fixturesResultsEditFixtureIDAddDateTitle>
    <p>date</p>
    </div>
    
    <div id=fixturesResultsEditFixtureIDAddTimeTitle>
    <p>time</p>
    </div>
    
    <div id=fixturesResultsEditFixtureIDAddTimeColonTitle>
    <p>:</p>
    </div>
    
    <div id=fixturesResultsEditFixtureIDAddVTitle>
    <p>v</p>
    </div>
    
    <div id=fixturesResultsEditFixtureIDAddDetailsTitle>
    <p>details</p>
    </div>
    
    <select name="fixturesResultsEditFixtureIDAddDay" id="fixturesResultsEditFixtureIDAddDay">
      <option value="$fixtureDay">$fixtureDay</option>
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
    <select name="fixturesResultsEditFixtureIDAddMonth" id="fixturesResultsEditFixtureIDAddMonth">
      <option value="$fixtureMonth">$fixtureFullMonth</option>
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
    <select name="fixturesResultsEditFixtureIDAddYear" id="fixturesResultsEditFixtureIDAddYear">
      <option value="$fixtureYear">$fixtureYear</option>
      <option value="2017">2017</option>
      <option value="2018">2018</option>
    </select>
    
    <select name="fixturesResultsEditFixtureIDGameHour" id="fixturesResultsEditFixtureIDGameHour">
      <option value="$gameTimeHour">$gameTimeHour</option>
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
    <select name="fixturesResultsEditFixtureIDGameMinute" id="fixturesResultsEditFixtureIDGameMinute">
      <option value="$gameTimeMinute">$gameTimeMinute</option>
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


<div id=fixturesResultsEditFixtureIDHomeTeamName>
<p>$homeTeamName</p>
</div>

<div id=fixturesResultsEditFixtureIDAwayTeamName>
<p>$awayTeamName</p>
</div>

<div id=fixturesResultsEditTeamNameExplanation>
<p>NOTE - to edit the teams in this fixture, please remove the fixture and add a new one</p>
</div>

     

    <textarea name="fixturesResultsEditFixtureIDDetails" id="fixturesResultsEditFixtureIDDetails" maxlength="100" placeholder="eg. pitch 1">$details</textarea>

    <div id=fixturesResultsEditFixtureIDAddFixturePopupButtons>
    <div id=cancelFixturesResultsEditFixtureIDAddFixture>
     <button type="button" class="cancelAddFixture">cancel</button>
    </div>
    <div id=submitFixturesResultsEditFixtureIDAddFixture>
     <input type="submit" name="submitFixtureIDAddFixture" value="edit fixture" id="submitFixtureIDAddFixture" />
     </div>
    </div>        
        
    </form>

    </div>        

_END;

}
        else
        {
echo "I'm sorry, something has gone wrong";
        }
?>
     </head>
    
    <body>
        
    </body>
</html>