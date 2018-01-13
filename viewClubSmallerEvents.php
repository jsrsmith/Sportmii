<?php
require_once 'header.php';
?>

<html>
    <head>
    
       <link href="viewClubSmallerEvents.css" rel="stylesheet" type="text/css"/>
        
    </head>
    
    <?php

if(isset($_POST['viewClubSmallDate'], $_POST['clubID']))
{
    $viewClubSmallDate  =  $_POST['viewClubSmallDate'];
    $clubID         =  $_POST['clubID'];
    
      $clubEventTitle = $pdo->prepare('SELECT title FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$clubEventTitle->execute([$clubID, $viewClubSmallDate]);

if ($clubEventTitle->rowCount() == 0)
     {
echo <<<_END
<div id=viewClubNoSmallEvents>
<p>there are no events to show for today.</p>
</div>
_END;

$clubEventTitle = null;
       }
    
     else
    
     {
($showClubEventTitle = $clubEventTitle->fetchcolumn());
         
         
          
         
         
echo <<<_END
<div id=viewClubSmallEventFound>

<div id=viewClubSmallTitleBoth>
<div id=viewClubSmallTitleVar>
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
