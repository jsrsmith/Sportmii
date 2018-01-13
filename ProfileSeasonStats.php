<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="ProfileSeasonStats.css" rel="stylesheet" type="text/css"/>
        
          <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <!--link to call jquery file to bring up season stats change-->
    <script
    src='profileSeasonStatsPopup.js'>
    </script>
        
        <!--link to call jquery file to cancel season stats-->
    <script
    src='profileSeasonStatsCancelPopup.js'>
    </script>
        
    </head>
    
    <body>
        
<?php
        
if(isset($_POST['submitProfileSeasonStats']))
{       
        
$apps                  =$_POST['apps'];
$wins                  =$_POST['wins'];
$draws                 =$_POST['draws'];
$losses                =$_POST['losses'];
$goals                 =$_POST['goals'];
$cleanSheets           =$_POST['cleanSheets'];
$MOM                   =$_POST['MOM'];
$yellowCards           =$_POST['yellowCards'];
$redCards              =$_POST['redCards'];
$username              =$_POST['usernameFromSeasonStats'];
        
        
 //find seasonStats from database
$seasonStatsExsist = $pdo->prepare('SELECT * FROM seasonStats WHERE username=?'); 

//execute query with variables
$seasonStatsExsist->execute([$username]);
        
if ($seasonStatsExsist->rowCount() == 0)
            {
    
    $addSeasonStats = $pdo->prepare('INSERT INTO seasonStats (apps, wins, draws, losses, goals, cleanSheets, MOM, yellowCards, redCards, username) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

//execute query and variables
$addSeasonStats->execute([$apps, $wins, $draws, $losses, $goals, $cleanSheets, $MOM, $yellowCards, $redCards, $username]);  
     
     
 }
     else
     {
         $updateSeasonStats = "UPDATE seasonStats SET apps=?, wins=?, draws=?, losses=?, goals=?, cleanSheets=?, MOM=?, yellowCards=?, redCards=? WHERE username=?";
        
        //execute query and variables
$pdo->prepare($updateSeasonStats)->execute([$apps, $wins, $draws, $losses, $goals, $cleanSheets, $MOM, $yellowCards, $redCards, $username]);
    
              
     }

echo <<<_END
<script>
  window.location.href = "profile.php";
</script>
_END;

}
        
        

switch ($primarysport) {
        
    case "football":
        
//see if username has any season stats
$seasonStatsAlready = $pdo->prepare('SELECT * FROM seasonStats WHERE username=?'); 

//execute query with variables
$seasonStatsAlready->execute([$username]);   
        
    if ($seasonStatsAlready->rowCount() == 0)
    {       

echo <<<_END

<div class=seasonStatsTitle>
<p>season stats</p>
</div>

<table class=seasonStatsTable>
  <tr>
    <th>apps.</th>
    <th>wins</th>
    <th> draws </th>
    <th>losses</th>
    <th> goals </th> 
    <th>clean<br>sheets</th>
    <th>man of the<br>match</th>
    <th>yellow<br>cards</th> 
    <th>red<br>cards</th>
  </tr>
  <tr>
    <td>0</td>
    <td>0</td>
    <td>0</td>
    <td>0</td>
    <td>0</td>
    <td>0</td>
    <td>0</td>
    <td>0</td>
    <td>0</td>
  </tr>
  
</table>

_END;

    }
        else
    {
    
//get the rows
while($row = $seasonStatsAlready->fetch(PDO::FETCH_ASSOC)){   

$apps[]               = $row["apps"]; 
$wins[]               = $row["wins"]; 
$draws[]              = $row["draws"];  
$losses[]             = $row["losses"]; 
$goals[]              = $row["goals"]; 
$cleanSheets[]        = $row["cleanSheets"]; 
$MOM[]                = $row["MOM"]; 
$yellowCards[]        = $row["yellowCards"]; 
$redCards[]           = $row["redCards"]; 
}            
            

echo <<<_END

<div class=seasonStatsTitle>
<p>season stats</p>
</div>

<table class=seasonStatsTable>
  <tr>
    <th>apps.</th>
    <th>wins</th>
    <th> draws </th>
    <th>losses</th>
    <th> goals </th> 
    <th>clean<br>sheets</th>
    <th>man of the<br>match</th>
    <th>yellow<br>cards</th> 
    <th>red<br>cards</th>
  </tr>
  <tr>
    <td>$apps[$row]</td>
    <td>$wins[$row]</td>
    <td>$draws[$row]</td>
    <td>$losses[$row]</td>
    <td>$goals[$row]</td>
    <td>$cleanSheets[$row]</td>
    <td>$MOM[$row]</td>
    <td>$yellowCards[$row]</td>
    <td>$redCards[$row]</td>
  </tr>
  
</table>

_END;

    }

echo <<<_END


 <div id=profileSeasonStatsPopup>
    
    <form action="profileSeasonStats.php" id="profileSeasonStatsForm" method="post">
    
    <div id=profileSeasonStatsTitle>
    <p>season stats</p>
    </div>
    
<table class=seasonStatsPopupTable>
  <tr>
    <th>apps.</th>
    <th>wins</th>
    <th> draws </th>
    <th>losses</th>
    <th> goals </th> 
    <th>clean<br>sheets</th>
    <th>man of the<br>match</th>
    <th>yellow<br>cards</th> 
    <th>red<br>cards</th>
  </tr>
  <tr>
    <td><textarea name="apps" class="apps" maxlength="3">$apps[$row]</textarea></td>
    <td><textarea name="wins" class="wins" maxlength="3">$wins[$row]</textarea></td>
    <td><textarea name="draws" class="draws" maxlength="3">$draws[$row]</textarea></td>
    <td><textarea name="losses" class="losses" maxlength="3">$losses[$row]</textarea></td>
    <td><textarea name="goals" class="goals" maxlength="3">$goals[$row]</textarea></td>
    <td><textarea name="cleanSheets" class="cleanSheets" maxlength="3">$cleanSheets[$row]</textarea></td>
    <td><textarea name="MOM" class="MOM" maxlength="3">$MOM[$row]</textarea></td>
    <td><textarea name="yellowCards" class="yellowCards" maxlength="3">$yellowCards[$row]</textarea></td>
    <td><textarea name="redCards" class="redCards" maxlength="3">$redCards[$row]</textarea></td>
  </tr>
  
</table>

<input type="hidden" name="usernameFromSeasonStats" value="$username">
       
       <div id=profileSeasonStatsButtons>
       <input type='submit' name='submitProfileSeasonStats' value='Save'>
       <button type="button" class="cancel">cancel</button>
       </div>
       
       
    </form>
    
    </div>

            

_END;

        break;
}

?>