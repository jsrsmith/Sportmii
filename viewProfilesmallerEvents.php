<?php
require_once 'header.php';
?>

<html>
    <head>
    
       <link href="viewProfileSmallerEvents.css" rel="stylesheet" type="text/css"/>
        
    </head>
    
    <?php

if(isset($_POST['viewProfileSmallDate'], $_SESSION['userProfile']))
{
    $viewProfileSmallDate  =  $_POST['viewProfileSmallDate'];
    $userProfile    =  $_SESSION['userProfile'];
    
      $viewProfileEventTitle = $pdo->prepare('SELECT title FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$viewProfileEventTitle->execute([$userProfile, $viewProfileSmallDate]);

if ($viewProfileEventTitle->rowCount() == 0)
     {
echo <<<_END
<div id=viewProfileNoSmallEvents>
<p>there are no events to show for today.</p>
</div>
_END;

$viewProfileEventTitle = null;
       }
    
     else
    
     {
($showViewProfileEventTitle = $viewProfileEventTitle->fetchcolumn());
         
         
          
         
         
echo <<<_END
<div id=viewProfileSmallEventFound>

<div id=viewProfileSmallTitleBoth>
<div id=viewProfileSmallTitleVar>
<p>$showViewProfileEventTitle</p>
</div>
</div>

</div>

_END;

$viewProfileEventTitle = null;
 }
}

?>
</html>
