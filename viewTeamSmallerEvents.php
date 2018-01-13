<?php
require_once 'header.php';
?>

<html>
    <head>
    
       <link href="viewTeamSmallerEvents.css" rel="stylesheet" type="text/css"/>
        
    </head>
    
    <?php

if(isset($_POST['viewTeamSmallDate'], $_POST['teamID']))
{
    $viewTeamSmallDate  =  $_POST['viewTeamSmallDate'];
    $teamID         =  $_POST['teamID'];
    
      $teamEventTitle = $pdo->prepare('SELECT title FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$teamEventTitle->execute([$teamID, $viewTeamSmallDate]);

if ($teamEventTitle->rowCount() == 0)
     {
echo <<<_END
<div id=viewTeamNoSmallEvents>
<p>there are no events to show for today.</p>
</div>
_END;

$teamEventTitle = null;
       }
    
     else
    
     {
($showTeamEventTitle = $teamEventTitle->fetchcolumn());
         
         
          
         
         
echo <<<_END
<div id=viewTeamSmallEventFound>

<div id=viewTeamSmallTitleBoth>
<div id=viewTeamSmallTitleVar>
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
