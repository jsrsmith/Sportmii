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
        <link href="fixturesResults.css" type="text/css"
              rel="stylesheet">
       
    <!--link to call jquery file to open all ajax files-->
    <script
    src='fixturesResultsAllAjax.js'>
    </script>
  
    <!--link to call jquery file to open search options-->
    <script
    src='fixturesResultsSearchAmateurPopup.js'>
    </script>
       
    <!--link to call jquery file to close search options-->
    <script
    src='fixturesResultsSearchAmateurHide.js'>
    </script>

     <!--link to call jquery file to navigate to edit leagues-->
    <script
    src='fixturesResultsNavigateToEdit.js'>
    </script>  

    
           </head>
    
<body>     

<?php  
    
    //if change default league is pressed
if(isset($_POST['fixturesResultsDefaultLeagueSubmit'], $_SESSION['leagueChoice']))
{
    
    $leagueChoice = $_SESSION['leagueChoice'];
    
    //see if username already has a default league
    $defaultAlready = $pdo->prepare('SELECT username FROM defaultLeagues WHERE username=?'); 

//execute query with variables
$defaultAlready->execute([$username]);
    
    // if rows=0 add defualt league to table
    if ($defaultAlready->rowCount() == 0)
    {
    
    $userDefault = $pdo->prepare('INSERT INTO defaultLeagues (league, username) VALUES(?, ?)');
        
        //execute query and variables
$userDefault->execute([$leagueChoice, $username]);
    }
    
    //update table to new defualt
    else
    {
       
        $updateDefaultLeague = "UPDATE defaultLeagues SET league=? WHERE username=?";
        
        //execute query and variables
$pdo->prepare($updateDefaultLeague)->execute([$leagueChoice, $username]);
        
    }
    
//delete from defaultTeam as league has changed
$deletedefaultTeam = $pdo->prepare("DELETE FROM defaultTeams WHERE username=?");

//execute query and variables
$deletedefaultTeam->execute([$username]);
}
    

//if return to defualt league is pressed
if(isset($_POST['leagueReturnToDefaultSubmit']))
{
 
     //see if username already has a default league
    $findDefaultLeague = $pdo->prepare('SELECT league FROM defaultLeagues WHERE username=?'); 

//execute query with variables
$findDefaultLeague->execute([$username]);
    
    // if rows above 0, navigate to that league
    if ($findDefaultLeague->rowCount() > 0)
    {
          ($returnToDefaultLeague = $findDefaultLeague->fetchcolumn());
        
        $_SESSION['leagueChoice'] = $returnToDefaultLeague;
    }
}
    

if(isset($_SESSION['username']))
{

echo <<<_END

<div id=fixturesResultsSearchOptions>

<div id=fixturesResultsCreateNewLeagueButton>
<a href="leaguesCreateLeague.php" class="createNewLeague">create new</br>league</a>
</div>

<form method='post' action='fixturesResults.php' id="fixturesResultsDefaultLeagueForm">
<button type="submit" name='fixturesResultsDefaultLeagueSubmit' id='fixturesResultsDefaultLeagueSubmit'>make this my</br>defualt league</button>
</form>

<form method='post' action='fixturesResults.php' id="fixturesResultsReturnToDefaultForm">
<button type="submit" name='fixturesResultsReturnToDefaultSubmit' id='fixturesResultsReturnToDefaultSubmit'>return to default</br>league</button>
</form>

<div id=fixturesResultsSearchButtons>


<div id=fixturesResultsSearchAmateurLeaguesButton>
<button type="button" class="searchAmateurLeagues">search amateur<br/>leagues</button>
</div>


<div id=fixturesResultsSearchNationalLeagueButton>
<button type="button" class="searchNationalLeague">search national<br/>league system</button>
</div>

</div>

</div>

<div id=fixturesResultsAmateurOptions>
<div id=fixturesResultsAmateurOptionsWithin>

<div id=fixturesResultsHideAmateurLeagueSearch>
<button type="button" class="hideAmateurLeagueSearchButton">hide search</button>
</div>

<div id=fixturesResultsSportDropdown>
</div>

<div id=fixturesResultsYearDropdown>
</div>

<div id=fixturesResultsDistrictDropdown>
</div>

<div id=fixturesResultsAgeDropdown>
</div>

<div id=fixturesResultsDivisionDropdown>
</div>


</div>
</div>         

_END;

}
 
    
if(isset($_SESSION['leagueChoice']))
{
    
  $leagueChoice = $_SESSION['leagueChoice'];
        
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


<div id=fixturesResultsLeagueTitle>
<p>$leagueChoice</p>
</div>


_END;


    //is user in control of league
$inControlOfLeague = $pdo->prepare('SELECT * FROM leagueControl WHERE leagueName=? and username=?');

//execute query and variables
$inControlOfLeague->execute([$leagueChoice, $username]); 
        
// if rows above 0, show league
    if ($inControlOfLeague->rowCount() > 0)
    { 

echo <<<_END

<div class=fixturesResultsEditCentreAllDivs>

<button type="button" name='fixturesResultsUserControlButton' id='fixturesResultsUserControlButton'>edit fixtures</br>and results</button>

</div>

_END;

     }
}
    
else
{
    
 //see if username already has a default league
    $findDefaultLeague = $pdo->prepare('SELECT league FROM defaultLeagues WHERE username=?'); 

//execute query with variables
$findDefaultLeague->execute([$username]);
    
    // if rows above 0, navigate to that league
    if ($findDefaultLeague->rowCount() > 0)
    {
          ($returnToDefaultLeague = $findDefaultLeague->fetchcolumn());
        
        $_SESSION['leagueChoice'] = $returnToDefaultLeague;
     
echo <<<_END
<script>
  window.location.href = "fixturesResults.php";
</script>
_END;

    }

}


?>

    </body>

</html>