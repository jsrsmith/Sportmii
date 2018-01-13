<?php
require_once 'header.php';
?>

<html>
    <head>
    
       <link href="teamSmallerEvents.css" rel="stylesheet" type="text/css"/>
        
    </head>
    
    <?php

if(isset($_POST['teamSmallDate'], $_POST['teamID']))
{
    $teamSmallDate  =  $_POST['teamSmallDate'];
    $teamID         =  $_POST['teamID'];
    
      $teamEventTitle = $pdo->prepare('SELECT title FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$teamEventTitle->execute([$teamID, $teamSmallDate]);

if ($teamEventTitle->rowCount() == 0)
     {
echo <<<_END
<div id=teamNoSmallEvents>
<p>there are no events to show for today.</p>
</div>
_END;

$teamEventTitle = null;
       }
    
     else
    
     {
($showTeamEventTitle = $teamEventTitle->fetchcolumn());
         
         
          
         
         
echo <<<_END
<div id=teamSmallEventFound>

<div id=teamSmallTitleBoth>
<div id=teamSmallTitleVar>
<p>$showTeamEventTitle</p>
</div>
</div>

</div>

_END;

$teamEventTitle = null;
 }
}

?>
</html>
