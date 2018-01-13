<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="teamTopScorers.css" rel="stylesheet" type="text/css"/>
        
          <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
    <!--link to call jquery file to bring up team details change-->
    <script
    src='teamTopScorersPopup.js'>
    </script>    
        
    <!--link to call jquery file to cancel editing team details--> 
    <script
    src='teamTopScorersCancelPopup.js'>
    </script>

        
    </head>
    
    <body>
        
<?php
      
//if football edit is pressed
 if (isset ($_SESSION['teamID'], $_POST['saveTeamTopScorers']))
    
 {
  
    
    $teamID             = $_SESSION['teamID'];
    $addOrMinus         = $_POST['teamTopScorersAddOrMinus'];
    $goalsNumber        = $_POST['teamTopScorersGoalsNumber'];
    $scorersUsername    = $_POST['teamTopScorersName'];
 
 if ($scorersUsername == NULL) {

echo <<<_END
<script>
  window.location.href = "team.php";
</script>
_END;

 }
     else
     {
         
 //is username already in top scorers
$scorerAlreadyInserted = $pdo->prepare('SELECT * FROM topscorers WHERE teamID=? and username=?'); 

//execute query with variables
$scorerAlreadyInserted->execute([$teamID, $scorersUsername]);
    
    // if rows=0 add defualt league to table
    if ($scorerAlreadyInserted->rowCount() > 0)
    {    

 if ($addOrMinus == minus) 
        
        {
     
 switch ($goalsNumber) {
        
    case "1":
        
$minusUsersGoals = "UPDATE topScorers SET goals = goals - 1 WHERE teamID=? and username=?";
        
        //execute query and variables
$pdo->prepare($minusUsersGoals)->execute([$teamID, $scorersUsername]);
            
             break;  
         
case "2":
        
$minusUsersGoals = "UPDATE topScorers SET goals = goals - 2 WHERE teamID=? and username=?";
        
        //execute query and variables
$pdo->prepare($minusUsersGoals)->execute([$teamID, $scorersUsername]);
            
             break; 
         
case "3":
        
$minusUsersGoals = "UPDATE topScorers SET goals = goals - 3 WHERE teamID=? and username=?";
        
        //execute query and variables
$pdo->prepare($minusUsersGoals)->execute([$teamID, $scorersUsername]);
            
             break;  
         
case "4":
        
$minusUsersGoals = "UPDATE topScorers SET goals = goals - 4 WHERE teamID=? and username=?";
        
        //execute query and variables
$pdo->prepare($minusUsersGoals)->execute([$teamID, $scorersUsername]);
            
             break;  
         
case "5":
        
$minusUsersGoals = "UPDATE topScorers SET goals = goals - 5 WHERE teamID=? and username=?";
        
        //execute query and variables
$pdo->prepare($minusUsersGoals)->execute([$teamID, $scorersUsername]);
            
             break;
         
case "6":
        
$minusUsersGoals = "UPDATE topScorers SET goals = goals - 6 WHERE teamID=? and username=?";
        
        //execute query and variables
$pdo->prepare($minusUsersGoals)->execute([$teamID, $scorersUsername]);
            
             break;  
         
         
case "7":
        
$minusUsersGoals = "UPDATE topScorers SET goals = goals - 7 WHERE teamID=? and username=?";
        
        //execute query and variables
$pdo->prepare($minusUsersGoals)->execute([$teamID, $scorersUsername]);
            
             break;  
         
         
case "8":
        
$minusUsersGoals = "UPDATE topScorers SET goals = goals - 8 WHERE teamID=? and username=?";
        
        //execute query and variables
$pdo->prepare($minusUsersGoals)->execute([$teamID, $scorersUsername]);
            
             break; 
         
         
case "9":
        
$minusUsersGoals = "UPDATE topScorers SET goals = goals - 9 WHERE teamID=? and username=?";
        
        //execute query and variables
$pdo->prepare($minusUsersGoals)->execute([$teamID, $scorersUsername]);
            
             break;
         
case "10":
        
$minusUsersGoals = "UPDATE topScorers SET goals = goals - 10 WHERE teamID=? and username=?";
        
        //execute query and variables
$pdo->prepare($minusUsersGoals)->execute([$teamID, $scorersUsername]);
            
             break; 
         
 }
 }
        
 if ($addOrMinus == add) 
        
        {
     
 switch ($goalsNumber) {
        
    case "1":
        
$addUsersGoals = "UPDATE topScorers SET goals = goals + 1 WHERE teamID=? and username=?";
        
        //execute query and variables
$pdo->prepare($addUsersGoals)->execute([$teamID, $scorersUsername]);
            
             break;  
         
case "2":
        
$addUsersGoals = "UPDATE topScorers SET goals = goals + 2 WHERE teamID=? and username=?";
        
        //execute query and variables
$pdo->prepare($addUsersGoals)->execute([$teamID, $scorersUsername]);
            
             break; 
         
case "3":
        
$addUsersGoals = "UPDATE topScorers SET goals = goals + 3 WHERE teamID=? and username=?";
        
        //execute query and variables
$pdo->prepare($addUsersGoals)->execute([$teamID, $scorersUsername]);
            
             break;  
         
case "4":
        
$addUsersGoals = "UPDATE topScorers SET goals = goals + 4 WHERE teamID=? and username=?";
        
        //execute query and variables
$pdo->prepare($addUsersGoals)->execute([$teamID, $scorersUsername]);
            
             break;  
         
case "5":
        
$addUsersGoals = "UPDATE topScorers SET goals = goals + 5 WHERE teamID=? and username=?";
        
        //execute query and variables
$pdo->prepare($addUsersGoals)->execute([$teamID, $scorersUsername]);
            
             break;
         
case "6":
        
$addUsersGoals = "UPDATE topScorers SET goals = goals + 6 WHERE teamID=? and username=?";
        
        //execute query and variables
$pdo->prepare($addUsersGoals)->execute([$teamID, $scorersUsername]);
            
             break;  
         
         
case "7":
        
$addUsersGoals = "UPDATE topScorers SET goals = goals + 7 WHERE teamID=? and username=?";
        
        //execute query and variables
$pdo->prepare($addUsersGoals)->execute([$teamID, $scorersUsername]);
            
             break;  
         
         
case "8":
        
$addUsersGoals = "UPDATE topScorers SET goals = goals + 8 WHERE teamID=? and username=?";
        
        //execute query and variables
$pdo->prepare($addUsersGoals)->execute([$teamID, $scorersUsername]);
            
             break; 
         
         
case "9":
        
$addUsersGoals = "UPDATE topScorers SET goals = goals + 9 WHERE teamID=? and username=?";
        
        //execute query and variables
$pdo->prepare($addUsersGoals)->execute([$teamID, $scorersUsername]);
            
             break;
         
case "10":
        
$addUsersGoals = "UPDATE topScorers SET goals = goals + 10 WHERE teamID=? and username=?";
        
        //execute query and variables
$pdo->prepare($addUsersGoals)->execute([$teamID, $scorersUsername]);
            
             break; 
         
 }
 }

echo <<<_END
<script>
  window.location.href = "team.php";
</script>
_END;

 }
  else
  {
    
 if ($addOrMinus == minus) 
        
        {
  $insertMinusUserGoals = $pdo->prepare('INSERT INTO topScorers (teamID, username, goals) VALUES (?, ?, ?)');
        
        //execute query and variables
$insertMinusUserGoals->execute([$teamID, $scorersUsername, -$goalsNumber]);      
 
 }
        
 if ($addOrMinus == add) 
        
        {
  $insertMinusUserGoals = $pdo->prepare('INSERT INTO topScorers (teamID, username, goals) VALUES (?, ?, ?)');
        
        //execute query and variables
$insertMinusUserGoals->execute([$teamID, $scorersUsername, $goalsNumber]);
 }

echo <<<_END
<script>
  window.location.href = "team.php";
</script>
_END;

  }
 }
 }
     
           
        
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
    
//find all players registered to team
$findRegisteredPlayers = $pdo->prepare('SELECT username FROM register WHERE teamID=? ORDER BY username ASC'); 

//execute query with variables
$findRegisteredPlayers->execute([$teamID]);       
        
$registeredPlayers = $findRegisteredPlayers->fetchAll();     

echo <<<_END

<div id=teamTopScorersTitle>
<p>top scorers</p>
</div>

 <div id=teamTopScorersPopup>
    
    <form action="teamTopScorers.php" id="teamTopScorersForm" method="post">
    
    <div id=teamTopScorersPopupTitle>
    <p>top scorers</p>
    </div>
 
 
 <select name="teamTopScorersAddOrMinus" id="teamTopScorersAddOrMinus">
    <option value="add">add</option>
    <option value="minus">minus</option>
    </select>
    
<select name="teamTopScorersGoalsNumber" id="teamTopScorersGoalsNumber">
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
    </select>
    
<div id=teamTopScorersTO>
<p>goals to</p>
</div>


_END;


print '<select name="teamTopScorersName" id="teamTopScorersName">';
foreach ($registeredPlayers as $row) {
print '<option value="'.$row['username'].'">'.$row['username'].'</option>';
    }
print '</select>';

echo <<<_END

       <div id=editTeamTopScorersButtons>
       <input type='submit' name='saveTeamTopScorers' value='Save'><div id=cancelTeamTopScorers>
     <button type="button" class="cancelTeamTopScorersButton">cancel</button>
    </div>
       </div>
       

       
    </form>
    
    </div>

_END;
}
?>
        
    </body>
</html>

