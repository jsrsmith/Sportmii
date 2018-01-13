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
        <link href="leagues.css" type="text/css"
              rel="stylesheet">
       
    <!--link to call jquery file to open all ajax files-->
    <script
    src='leaguesAllAjax.js'>
    </script>
  
    <!--link to call jquery file to open search options-->
    <script
    src='leagueSearchAmateurPopup.js'>
    </script>
       
    <!--link to call jquery file to close search options-->
    <script
    src='leagueSearchAmateurHide.js'>
    </script>

     <!--link to call jquery file to navigate to edit leagues-->
    <script
    src='leaguesNavigateToEdit.js'>
    </script>  

    
           </head>
    
<body>     

<?php  
    
    //if change default league is pressed
if(isset($_POST['leaguesDefaultLeagueSubmit'], $_SESSION['leagueChoice']))
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

<div id=leagueSearchOptions>

<div id=createNewLeagueButton>
<a href="leaguesCreateLeague.php" class="createNewLeague">create new</br>league</a>
</div>

<form method='post' action='leagues.php' id="leagueDefaultLeagueForm">
<button type="submit" name='leaguesDefaultLeagueSubmit' id='leaguesDefaultLeagueSubmit'>make this my</br>defualt league</button>
</form>

<form method='post' action='leagues.php' id="leagueReturnToDefaultForm">
<button type="submit" name='leagueReturnToDefaultSubmit' id='leagueReturnToDefaultSubmit'>return to default</br>league</button>
</form>

<div id=leagueSearchButtons>


<div id=searchAmateurLeaguesButton>
<button type="button" class="searchAmateurLeagues">search amateur<br/>leagues</button>
</div>


<div id=searchNationalLeagueButton>
<button type="button" class="searchNationalLeague">search national<br/>league system</button>
</div>

</div>

</div>

<div id=leagueAmateurOptions>
<div id=leagueAmateurOptionsWithin>

<div id=hideAmateurLeagueSearch>
<button type="button" class="hideAmateurLeagueSearchButton">hide search</button>
</div>

<div id=leaguesSportDropdown>
</div>

<div id=leaguesYearDropdown>
</div>

<div id=leaguesDistrictDropdown>
</div>

<div id=leaguesAgeDropdown>
</div>

<div id=leaguesDivisionDropdown>
</div>


</div>
</div>         

_END;

}
 
    
if(isset($_SESSION['leagueChoice']))
{
    
  $leagueChoice = $_SESSION['leagueChoice'];
        
$newTeamID   = "";
$leagueNotes = "";
        
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
        
        
print'<div class=leaguesCentreAllDivs>
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
print'<div class=leaguesCentreAllDivs>
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

<div class=leaguesCentreAllDivs>


<div id=leagueTitle>
<p>$leagueChoice</p>
</div>

<div id=leagueNotesTitle>
<p>league notes</p>
</div>

<div id=leagueTeamsNotes>
<p>$leagueNotes</p>
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

<div class=leaguesCentreAllDivs>

<button type="button" name='leaguesUserControlButton' id='leaguesUserControlButton'>edit league</button>

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
  window.location.href = "leagues.php";
</script>
_END;

    }

}

?>

    </body>

</html>