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
        
    <!--link to call jquery file to only allow numbers in results-->
    <script
    src='fixturesResultsEditResultsNumbers.js'>
    </script>
    
<?php
        
        
if(isset($_SESSION['username'], $_SESSION['leagueChoice'], $_POST['submitEnterResult']))
    {
     
$leagueChoice   = $_SESSION['leagueChoice'];
$fixtureID      = $_POST['fixtureIDFromResult'];
$homeTeamScore   = $_POST['fixturesResultsEditEnterResultHomeTeamScore'];
$awayTeamScore   = $_POST['fixturesResultsEditEnterResultAwayTeamScore'];

    
    //find team id and name of teams in fixture
$fixtureTeams = $pdo->prepare('SELECT * FROM fixturesResults WHERE leagueName=? and id=?'); 

//execute query with variables
$fixtureTeams->execute([$leagueChoice, $fixtureID]);
    
while($list = $fixtureTeams->fetch(PDO::FETCH_ASSOC)){ 
    

$homeTeamID              = $list["homeTeamID"];  
$homeTeamName            = $list["homeTeamName"]; 
$previousHomeTeamScore   = $list["homeTeamScore"]; 
$previousAwayTeamScore   = $list["awayTeamScore"]; 
$awayTeamName            = $list["awayTeamName"]; 
$awayTeamID              = $list["awayTeamID"]; 
}
    
$homeTeamGoalDifference = ($homeTeamScore - $awayTeamScore);
$awayTeamGoalDifference = ($awayTeamScore - $homeTeamScore);
    
$previousHomeTeamGoalDifference = ($previousHomeTeamScore - $previousAwayTeamScore);
$previousAwayTeamGoalDifference = ($previousAwayTeamScore - $previousHomeTeamScore);
    
//check to see if result boxes only contain numbers
if (!is_numeric($homeTeamScore) || !is_numeric($awayTeamScore)) 
{

echo <<<_END
<script>
  window.location.href = "fixturesResultsEdit.php";
</script>
_END;

}
    
else if ($homeTeamScore == "" || $awayTeamScore == "")
{

echo <<<_END
<script>
  window.location.href = "fixturesResultsEdit.php";
</script>
_END;

}

    
else
{
    
    
    
//if score was never entered (both null)
if ($previousHomeTeamScore === NULL || $previousAwayTeamScore === NULL)
{

    //update result in fixturesResults
    $updateResultInFixtures = "UPDATE fixturesResults SET homeTeamScore=?, awayTeamScore=? WHERE id=?";
        
    //execute query and variables
    $pdo->prepare($updateResultInFixtures)->execute([$homeTeamScore, $awayTeamScore, $fixtureID]);
    
  if ($homeTeamScore === $awayTeamScore)
{
    //update draw in leagues for home team
    $drawHomeTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($drawHomeTeam)->execute([1, 0, 1, 0, $homeTeamScore, $awayTeamScore, $homeTeamGoalDifference, 1, $homeTeamID]);
      
    //update draw in leagues for away team
    $drawAwayTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($drawAwayTeam)->execute([1, 0, 1, 0, $awayTeamScore, $homeTeamScore, $awayTeamGoalDifference, 1, $awayTeamID]);
      
}  
    
else if ($homeTeamScore > $awayTeamScore)
{
    //update home win in leagues for home team
    $HomeWinHomeTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($HomeWinHomeTeam)->execute([1, 1, 0, 0, $homeTeamScore, $awayTeamScore, $homeTeamGoalDifference, 3, $homeTeamID]);
      
    //update home win in leagues for away team
    $HomeWinAwayTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($HomeWinAwayTeam)->execute([1, 0, 0, 1, $awayTeamScore, $homeTeamScore, $awayTeamGoalDifference, 0, $awayTeamID]);
      
}  
    
else if($homeTeamScore < $awayTeamScore)
{
    
    //update away win in leagues for home team
    $AwayWinHomeTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($AwayWinHomeTeam)->execute([1, 0, 0, 1, $homeTeamScore, $awayTeamScore, $homeTeamGoalDifference, 0, $homeTeamID]);
      
    //update away win in leagues for away team
    $AwayWinAwayTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($AwayWinAwayTeam)->execute([1, 1, 0, 0, $awayTeamScore, $homeTeamScore, $awayTeamGoalDifference, 3, $awayTeamID]);
      
}  
        
}
    
      
    
    
    
    
    
    
//if score was previously a draw and is changed    
else if ($previousHomeTeamScore === $previousAwayTeamScore)
{
    
    //update result in fixturesResults
    $updateResultInFixtures = "UPDATE fixturesResults SET homeTeamScore=?, awayTeamScore=? WHERE id=?";
        
    //execute query and variables
    $pdo->prepare($updateResultInFixtures)->execute([$homeTeamScore, $awayTeamScore, $fixtureID]);
    
    //take away draw from previous result
    //update draw in leagues for home team
    $minusDrawHomeTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($minusDrawHomeTeam)->execute([-1, 0, -1, 0, -$previousHomeTeamScore, -$previousAwayTeamScore, -$previousHomeTeamGoalDifference, -1, $homeTeamID]);
      
    //update draw in leagues for away team
    $minusDrawAwayTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($minusDrawAwayTeam)->execute([-1, 0, -1, 0, -$previousAwayTeamScore, -$previousHomeTeamScore, -$previousAwayTeamGoalDifference, -1, $awayTeamID]);
    
    
if ($homeTeamScore === $awayTeamScore)
{

    //add new draw score
    //update draw in leagues for home team
    $drawHomeTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($drawHomeTeam)->execute([1, 0, 1, 0, $homeTeamScore, $awayTeamScore, $homeTeamGoalDifference, 1, $homeTeamID]);
      
    //update draw in leagues for away team
    $drawAwayTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($drawAwayTeam)->execute([1, 0, 1, 0, $awayTeamScore, $homeTeamScore, $awayTeamGoalDifference, 1, $awayTeamID]);
      
}  
    
else if ($homeTeamScore > $awayTeamScore)
{
    //update home win in leagues for home team
    $HomeWinHomeTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($HomeWinHomeTeam)->execute([1, 1, 0, 0, $homeTeamScore, $awayTeamScore, $homeTeamGoalDifference, 3, $homeTeamID]);
      
    //update home win in leagues for away team
    $HomeWinAwayTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($HomeWinAwayTeam)->execute([1, 0, 0, 1, $awayTeamScore, $homeTeamScore, $awayTeamGoalDifference, 0, $awayTeamID]);
      
}  
    
else if($homeTeamScore < $awayTeamScore)
{
    
    //update away win in leagues for home team
    $AwayWinHomeTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($AwayWinHomeTeam)->execute([1, 0, 0, 1, $homeTeamScore, $awayTeamScore, $homeTeamGoalDifference, 0, $homeTeamID]);
      
    //update away win in leagues for away team
    $AwayWinAwayTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($AwayWinAwayTeam)->execute([1, 1, 0, 0, $awayTeamScore, $homeTeamScore, $awayTeamGoalDifference, 3, $awayTeamID]);
      
}  
}

    
    
    
  
    
    //if score was previously a home win and is changed
else if ($previousHomeTeamScore > $previousAwayTeamScore)
{
//update result in fixturesResults
    $updateResultInFixtures = "UPDATE fixturesResults SET homeTeamScore=?, awayTeamScore=? WHERE id=?";
        
    //execute query and variables
    $pdo->prepare($updateResultInFixtures)->execute([$homeTeamScore, $awayTeamScore, $fixtureID]);
    
    //take away draw from previous result
    //update draw in leagues for home team
    $minusHomeWinHomeTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($minusHomeWinHomeTeam)->execute([-1, -1, 0, 0, -$previousHomeTeamScore, -$previousAwayTeamScore, -$previousHomeTeamGoalDifference, -3, $homeTeamID]);
      
    //update draw in leagues for away team
    $minusHomeWinAwayTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($minusHomeWinAwayTeam)->execute([-1, 0, 0, -1, -$previousAwayTeamScore, -$previousHomeTeamScore, -$previousAwayTeamGoalDifference, 0, $awayTeamID]);
    
    
if ($homeTeamScore === $awayTeamScore)
{

    //add new draw score
    //update draw in leagues for home team
    $drawHomeTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($drawHomeTeam)->execute([1, 0, 1, 0, $homeTeamScore, $awayTeamScore, $homeTeamGoalDifference, 1, $homeTeamID]);
      
    //update draw in leagues for away team
    $drawAwayTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($drawAwayTeam)->execute([1, 0, 1, 0, $awayTeamScore, $homeTeamScore, $awayTeamGoalDifference, 1, $awayTeamID]);
      
}  
    
else if ($homeTeamScore > $awayTeamScore)
{
    //update home win in leagues for home team
    $HomeWinHomeTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($HomeWinHomeTeam)->execute([1, 1, 0, 0, $homeTeamScore, $awayTeamScore, $homeTeamGoalDifference, 3, $homeTeamID]);
      
    //update home win in leagues for away team
    $HomeWinAwayTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($HomeWinAwayTeam)->execute([1, 0, 0, 1, $awayTeamScore, $homeTeamScore, $awayTeamGoalDifference, 0, $awayTeamID]);
      
}  
    
else if($homeTeamScore < $awayTeamScore)
{
    
    //update away win in leagues for home team
    $AwayWinHomeTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($AwayWinHomeTeam)->execute([1, 0, 0, 1, $homeTeamScore, $awayTeamScore, $homeTeamGoalDifference, 0, $homeTeamID]);
      
    //update away win in leagues for away team
    $AwayWinAwayTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($AwayWinAwayTeam)->execute([1, 1, 0, 0, $awayTeamScore, $homeTeamScore, $awayTeamGoalDifference, 3, $awayTeamID]);
      
}  
}
  
    
    
    
    
    
    
//if previous result was away win and is changed    
else if ($previousHomeTeamScore < $previousAwayTeamScore)
{
//update result in fixturesResults
    $updateResultInFixtures = "UPDATE fixturesResults SET homeTeamScore=?, awayTeamScore=? WHERE id=?";
        
    //execute query and variables
    $pdo->prepare($updateResultInFixtures)->execute([$homeTeamScore, $awayTeamScore, $fixtureID]);
    
    //take away draw from previous result
    //update draw in leagues for home team
    $minusAwayWinHomeTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($minusAwayWinHomeTeam)->execute([-1, 0, 0, -1, -$previousHomeTeamScore, -$previousAwayTeamScore, -$previousHomeTeamGoalDifference, 0, $homeTeamID]);
      
    //update draw in leagues for away team
    $minusAwayWinAwayTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($minusAwayWinAwayTeam)->execute([-1, -1, 0, 0, -$previousAwayTeamScore, -$previousHomeTeamScore, -$previousAwayTeamGoalDifference, -3, $awayTeamID]);
    
    
if ($homeTeamScore === $awayTeamScore)
{

    //add new draw score
    //update draw in leagues for home team
    $drawHomeTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($drawHomeTeam)->execute([1, 0, 1, 0, $homeTeamScore, $awayTeamScore, $homeTeamGoalDifference, 1, $homeTeamID]);
      
    //update draw in leagues for away team
    $drawAwayTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($drawAwayTeam)->execute([1, 0, 1, 0, $awayTeamScore, $homeTeamScore, $awayTeamGoalDifference, 1, $awayTeamID]);
      
}  
    
else if ($homeTeamScore > $awayTeamScore)
{
    //update home win in leagues for home team
    $HomeWinHomeTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($HomeWinHomeTeam)->execute([1, 1, 0, 0, $homeTeamScore, $awayTeamScore, $homeTeamGoalDifference, 3, $homeTeamID]);
      
    //update home win in leagues for away team
    $HomeWinAwayTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($HomeWinAwayTeam)->execute([1, 0, 0, 1, $awayTeamScore, $homeTeamScore, $awayTeamGoalDifference, 0, $awayTeamID]);
      
}  
    
else if($homeTeamScore < $awayTeamScore)
{
    
    //update away win in leagues for home team
    $AwayWinHomeTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($AwayWinHomeTeam)->execute([1, 0, 0, 1, $homeTeamScore, $awayTeamScore, $homeTeamGoalDifference, 0, $homeTeamID]);
      
    //update away win in leagues for away team
    $AwayWinAwayTeam = "UPDATE leagueTables SET played = played+?, won = won+?, drawn = drawn+?, lost = lost+?, goalsFor = goalsFor+?, goalsAgainst = goalsAgainst+?, goalDifference = goalDifference+?, points = points+? WHERE teamID=?";
        
    //execute query and variables
    $pdo->prepare($AwayWinAwayTeam)->execute([1, 1, 0, 0, $awayTeamScore, $homeTeamScore, $awayTeamGoalDifference, 3, $awayTeamID]);
      
}  
}    
 

echo <<<_END
<script>
  window.location.href = "fixturesResultsEdit.php";
</script>
_END;

       
 }
}
        
        


if(isset($_SESSION['username'], $_SESSION['leagueChoice'], $_POST['fixtureIDResult']))
    {
    
$leagueChoice          = $_SESSION['leagueChoice'];
$fixtureID             = $_POST['fixtureIDResult'];

$resultsToAdd = $pdo->prepare('SELECT * FROM fixturesResults WHERE leagueName=? and id=?');

//execute query and variables
$resultsToAdd->execute([$leagueChoice, $fixtureID]);

    
while($row = $resultsToAdd->fetch(PDO::FETCH_ASSOC)){ 
    

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


echo <<<_END

<div id=fixturesResultsEditEnterResultPopup>
    
     <form action="fixturesResultsEditAddResult.php" method="post" id="fixturesResultsEditEnterResultForm">
     
     <input type="hidden" name="fixtureIDFromResult" value="$fixtureID">

    <div id=fixturesResultsEditEnterResultTitle>
    <p>add result</p>
    </div>

    
    <div id=fixturesResultsEditEnterResultHomeTeam>
    <p>$homeTeamName</p>
    </div>
    
    <textarea name="fixturesResultsEditEnterResultHomeTeamScore" id="fixturesResultsEditEnterResultHomeTeamScore" maxlength="3">$homeTeamScore</textarea>
    
    <div id=fixturesResultsEditEnterResultVSign>
    <p>-</p>
    </div>
    
    <div id=fixturesResultsEditEnterResultAwayTeam>
    <p>$awayTeamName</p>
    </div>
    
    <textarea name="fixturesResultsEditEnterResultAwayTeamScore" id="fixturesResultsEditEnterResultAwayTeamScore" maxlength="3">$awayTeamScore</textarea>


    <div id=fixturesResultsEditEnterResultPopupButtons>
    <div id=cancelFixturesResultsEditEnterResult>
     <button type="button" class="cancelEnterResult">cancel</button>
    </div>
    <div id=submitFixturesResultsEditEnterResult>
     <input type="submit" name="submitEnterResult" value="add result" id="submitEnterResult" />
     </div>
    </div>
    
    <div id=fixturesResultsNumbersOnlyWarning>
    <p>results can only contain numbers</p>
    </div>
    
    <div id=fixturesResultsNumbersEmpty>
    <p>results must be filled in</p>
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