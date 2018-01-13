<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="clubPlayersList.css" rel="stylesheet" type="text/css"/>
        
<!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
    <!--link to call jquery file to sort the list alphabetically-->
    <script
    src='clubPlayersListSort.js'>
    </script> 
        
    <!--link to call jquery file to remove duplicate data in players list-->
    <script
    src='clubPlayersListDuplicate.js'>
    </script> 

        
    </head>
    
    <body>
        
<?php
      
     
if (isset($_SESSION['clubID']))
    
{
    

$clubID   = $_SESSION['clubID'];
    
    
//find all teams signed up to club
$findRegisteredClubs = $pdo->prepare('SELECT teamID FROM clubTeamList WHERE clubID=?'); 

//execute query with variables
$findRegisteredClubs->execute([$clubID]);
    
// if rows above 0, show league
    if ($findRegisteredClubs->rowCount() > 0)
    {
        
//start of table divs
print'<div class=allPlayersInfo>
<table class=registeredPlayers>
<tr>
    <th>firstname</th>
    <th>surname</th>
    <th>username</th> 
  </tr>';
        
//get the rows
while($list = $findRegisteredClubs->fetch(PDO::FETCH_ASSOC)){  

$teamID[]             = $list["teamID"]; 

}
$teamCount = count($teamID);
 

 for($team=0; $team < $teamCount; $team++) {        
        
       

//find all registered players
$findRegisteredPlayers = $pdo->prepare('SELECT * FROM register WHERE teamID=? ORDER BY firstname ASC'); 

//execute query with variables
$findRegisteredPlayers->execute([$teamID[$team]]);
        
// if rows above 0, show league
    if ($findRegisteredPlayers->rowCount() > 0)
    {
        
//get the rows
while($row = $findRegisteredPlayers->fetch(PDO::FETCH_ASSOC)){  

$RegisteredUsername[]             = $row["username"]; 
$RegisteredFirstname[]                = $row["firstname"];
$RegisteredSurname[]                = $row["surname"];
}
$playersCount = count($RegisteredUsername);
              

      
for($players=0; $players < $playersCount; $players++) {
    
//output the league table 
print'
<tr>
<td>'. $RegisteredFirstname[$players] .'</td>
<td>'. $RegisteredSurname[$players] .'</td>
<td>'. $RegisteredUsername[$players] .'</td>
</tr>'; 
    
}

        
unset($RegisteredUsername);
unset($RegisteredFirstname);
unset($RegisteredSurname);
    
    }
 }
        
print'
</table>
</div>';

    }
    
    else
        
    {
print'<div class=allPlayersInfo>
<div class=noRegisteredPlayers>
<p>there are no current registered players</p>
</div>
</div>';
    }
     

echo <<<_END

<div class=teamRegisteredPlayersTitle>
<p>players list</p>
</div>

_END;
}
?>
        
    </body>
</html>
