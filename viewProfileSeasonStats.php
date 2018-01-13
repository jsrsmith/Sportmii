<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="viewProfileSeasonStats.css" rel="stylesheet" type="text/css"/>
        
          <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

        
    </head>
    
    <body>
        
<?php

if (isset($_SESSION['userProfile']))
    
    {
       $userProfile   = $_SESSION['userProfile'];
  
    
 switch ($primarysport) {
        
    case "football":
        
//see if username has any season stats
$seasonStatsAlready = $pdo->prepare('SELECT * FROM seasonStats WHERE username=?'); 

//execute query with variables
$seasonStatsAlready->execute([$userProfile]);   
        
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
            
            
       
            
        break;
}
}

?>