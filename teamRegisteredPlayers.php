<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="teamRegisteredPlayers.css" rel="stylesheet" type="text/css"/>
        


        
    </head>
    
    <body>
        
<?php
      
     
if (isset($_SESSION['teamID']))
    
{
    

$teamID   = $_SESSION['teamID'];
    

//find all registered players
$findRegisteredPlayers = $pdo->prepare('SELECT * FROM register WHERE teamID=? ORDER BY firstname ASC'); 

//execute query with variables
$findRegisteredPlayers->execute([$teamID]);
        
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
              

print'<div class=allPlayersInfo>
<table class=registeredPlayers>
<tr>
    <th>firstname</th>
    <th>surname</th>
    <th>username</th> 
  </tr>'; 
      
for($players=0; $players < $playersCount; $players++) {
    
//output the league table 
print'
<tr>
<td>'. $RegisteredFirstname[$players] .'</td>
<td>'. $RegisteredSurname[$players] .'</td>
<td>'. $RegisteredUsername[$players] .'</td>
</tr>'; 
    
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
<p>registered players</p>
</div>

_END;
}
?>
        
    </body>
</html>
