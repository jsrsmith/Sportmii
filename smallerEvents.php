<?php
require_once 'header.php';
?>

<html>
    <head>
    
       <link href="smallerEvents.css" rel="stylesheet" type="text/css"/>
        
    </head>
    
    <?php

if(isset($_POST['smallDate'], $_SESSION['username']))
{
    $smallDate  =  $_POST['smallDate'];
    
      $eventtitle = $pdo->prepare('SELECT title FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventtitle->execute([$username, $smallDate]);

if ($eventtitle->rowCount() == 0)
     {
echo <<<_END
<div id=noSmallEvents>
<p>there are no events to show for today.</p>
</div>
_END;

$eventtitle = null;
       }
    
     else
    
     {
($showeventtitle = $eventtitle->fetchcolumn());
         
         
          
         
         
echo <<<_END
<div id=smallEventFound>

<div id=smallTitleBoth>
<div id=smallTitleVar>
<p>$showeventtitle</p>
</div>
</div>

</div>

_END;

$eventtitle = null;
 }
}

?>
</html>
