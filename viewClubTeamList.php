<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="clubTeamList.css" rel="stylesheet" type="text/css"/>
        
            <!--link to call Google CDN-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

       
    <!--link to call jquery file to load team name in ajax for the edit leagues-->
    <script
    src='clubTeamListAjax.js'>
    </script> 
        
    </head>
    
    <body>
        
<?php


if(isset($_SESSION['username'], $_SESSION['clubID'], $_POST['submitAddTeamList']))
    {
     
  $newTeamID    =    $_POST['clubTeamListID'];
  $clubID       = $_SESSION['clubID'];
     
     //see if teamID exists
    $doesTeamIDExist = $pdo->prepare('SELECT teamName FROM teams WHERE id=?'); 

//execute query with variables
$doesTeamIDExist->execute([$newTeamID]);
    

    if ($doesTeamIDExist->rowCount() > 0)
    {
        
         ($teamNameFound = $doesTeamIDExist->fetchcolumn());
        
//is team already in team list
$teamInTeamListAlready = $pdo->prepare('SELECT * FROM clubTeamList WHERE clubID=? and teamID=? and teamName=?'); 

//execute query with variables
$teamInTeamListAlready->execute([$clubID, $newTeamID, $teamNameFound]);
    
    // if rows=0 add team list
    if ($teamInTeamListAlready->rowCount() > 0)
    {

echo <<<_END
<script>
  window.location.href = "club.php";
</script>
_END;

    }
        
        else
            
    //add team to team list
        {
            
    $insertTeamToTeamList = $pdo->prepare('INSERT INTO clubTeamList (clubID, teamID, teamName) VALUES (?, ?, ?)');
        
        //execute query and variables
$insertTeamToTeamList->execute([$clubID, $newTeamID, $teamNameFound]);  


echo <<<_END
<script>
  window.location.href = "club.php";
</script>
_END;


        }
    }
        
    else
    //
    {

echo <<<_END
<script>
  window.location.href = "club.php";
</script>
_END;

    }
       
 }
        
        
        
    
      
     
if (isset($_SESSION['clubID']))
    
{
    

$clubID   = $_SESSION['clubID'];
    

//find all registered teams to club
$findTeamList = $pdo->prepare('SELECT * FROM clubTeamList WHERE clubID=? ORDER BY teamName ASC'); 

//execute query with variables
$findTeamList->execute([$clubID]);
        
// if rows above 0, show league
    if ($findTeamList->rowCount() > 0)
    {
        
//get the rows
while($row = $findTeamList->fetch(PDO::FETCH_ASSOC)){  

$teamListID[]             = $row["teamID"]; 
$teamListName[]           = $row["teamName"];
}
$teamsCount = count($teamListID);
              

print'<div class=viewClubAllTeamsInfo>
<table class=teamList>
<tr>
    <th>team name</th>
    <th>team id</th>
  </tr>'; 
      
for($teams=0; $teams < $teamsCount; $teams++) {
    
//output the team list 
print'
<tr>
<td>'. $teamListName[$teams] .'</td>
<td>'. $teamListID[$teams] .'</td>
</tr>'; 
    
}
        
print'
</table>
</div>';
    
    }
    
    else
        
    {
print'<div class=viewClubAllTeamsInfo>
<div class=noTeamList>
<p>there are no current teams associated with this club</p>
</div>
</div>';
    }
     

echo <<<_END

<div class=teamListTitle>
<p>team list</p>
</div>


_END;
}
?>
        
    </body>
</html>
