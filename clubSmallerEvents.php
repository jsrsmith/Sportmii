<?php
require_once 'header.php';
?>

<html>
    <head>
    
       <link href="clubSmallerEvents.css" rel="stylesheet" type="text/css"/>
        
    </head>
    
    <?php

if(isset($_POST['clubSmallDate'], $_POST['clubID']))
{
    $clubSmallDate  =  $_POST['clubSmallDate'];
    $clubID         =  $_POST['clubID'];
    
      $clubEventTitle = $pdo->prepare('SELECT title FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$clubEventTitle->execute([$clubID, $clubSmallDate]);

if ($clubEventTitle->rowCount() == 0)
     {
echo <<<_END
<div id=clubNoSmallEvents>
<p>there are no events to show for today.</p>
</div>
_END;

$clubEventTitle = null;
       }
    
     else
    
     {
($showClubEventTitle = $clubEventTitle->fetchcolumn());
         
         
          
         
         
echo <<<_END
<div id=clubSmallEventFound>

<div id=clubSmallTitleBoth>
<div id=clubSmallTitleVar>
<p>$showClubEventTitle</p>
</div>
</div>

</div>

_END;

$clubEventTitle = null;
 }
}

?>
</html>
