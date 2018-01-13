<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="viewTeamTopScorers.css" rel="stylesheet" type="text/css"/>
        


        
    </head>
    
    <body>
        
<?php
         
        
if (isset($_SESSION['teamID']))
    
{
    

$teamID   = $_SESSION['teamID'];
    

//find all top scoreres for team
$findTopScorers = $pdo->prepare('SELECT * FROM topScorers WHERE teamID=? ORDER BY goals DESC'); 

//execute query with variables
$findTopScorers->execute([$teamID]);
        
// if rows above 0, show league
    if ($findTopScorers->rowCount() > 0)
    {
        
//get the rows
while($row = $findTopScorers->fetch(PDO::FETCH_ASSOC)){  

$usernameTopScorer[]             = $row["username"]; 
$goalsTopScorer[]                = $row["goals"]; 
}
$goalsCount = count($usernameTopScorer);
              

print'<div class=allTeamTopScorers>
<table class=topScorersTable>
<tr>
    <th>username</th> 
    <th>goals</th>
  </tr>'; 
      
for($indexGoals=0; $indexGoals < $goalsCount; $indexGoals++) {
    
//output the league table 
print'
<tr>
<td>'. $usernameTopScorer[$indexGoals] .'</td>
<td>'. $goalsTopScorer[$indexGoals] .'</td>
</tr>'; 
    
}
        
print'
</table>
</div>';
    
    }
    
    else
        
    {
print'<div class=allTeamTopScorers>
<div class=noTopScorers>
<p>there are no current top scorers</p>
</div>
</div>';
    }
    
    

echo <<<_END

<div id=viewTeamTopScorersTitle>
<p>top scorers</p>
</div>

_END;
}
?>
        
    </body>
</html>

