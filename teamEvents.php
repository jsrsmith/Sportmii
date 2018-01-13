<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="teamEvents.css" rel="stylesheet" type="text/css"/>
        
    </head>
    
    <?php

if(isset($_POST['teamMyDate'], $_SESSION['teamID']))
{
    $mydate  =  $_POST['teamMyDate'];
    $teamID  =  $_SESSION['teamID'];
    
      $eventtitle = $pdo->prepare('SELECT title FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventtitle->execute([$teamID, $mydate]);

if ($eventtitle->rowCount() == 0)
     {
echo <<<_END
<div id=teamNoevents>
<p>there are no events to show for today.</p>
</div>
_END;
       }
    
     else
    
     {
($showeventtitle = $eventtitle->fetchcolumn());
         
         
         
 $eventdestination = $pdo->prepare('SELECT destination FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventdestination->execute([$teamID, $mydate]);
         
($showeventdestination = $eventdestination->fetchcolumn());
         
         
         
$eventeventtime = $pdo->prepare('SELECT eventtime FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventeventtime->execute([$teamID, $mydate]);
         
($showeventeventtime = $eventeventtime->fetchcolumn());
         
         
         
$eventdestinationpc = $pdo->prepare('SELECT destinationpc FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventdestinationpc->execute([$teamID, $mydate]);
         
($showeventdestinationpc = $eventdestinationpc->fetchcolumn());
         
         
         
$eventmeetingpoint = $pdo->prepare('SELECT meetingpoint FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventmeetingpoint->execute([$teamID, $mydate]);
         
($showeventmeetingpoint = $eventmeetingpoint->fetchcolumn());
         
         

$eventmeetingtime = $pdo->prepare('SELECT meetingtime FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventmeetingtime->execute([$teamID, $mydate]);
         
($showeventmeetingtime = $eventmeetingtime->fetchcolumn());
         
         
         
$eventmeetingpc = $pdo->prepare('SELECT meetingpc FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventmeetingpc->execute([$teamID, $mydate]);
         
($showeventmeetingpc = $eventmeetingpc->fetchcolumn());
         
         
         
echo <<<_END
<div id=teamEventfound>

<div id=teamTitleboth>
<div id=teamTitlepara>
<p>title:</p>
</div>
<div id=teamTitlevar>
<p>$showeventtitle</p>
</div>
</div>

<br>

<div id=teamDestinationboth>
<div id=teamDestinationpara>
<p>destination:</p>
</div>
<div id=teamDestinationvar>
<p>$showeventdestination</p>
</div>
</div>

<br>

<div id=teamEventtimeboth>
<div id=teamEventtimepara>
<p>event time:</p>
</div>
<div id=teamEventtimevar>
<p>$showeventeventtime</p>
</div>
</div>

<br>

<div id=teamDestinationpcboth>
<div id=teamDestinationpcpara>
<p>destination post code:</p>
</div>
<div id=teamDestinationpcvar>
<p>$showeventdestinationpc</p>
</div>
</div>

<br>

<div id=teamMeetingpointboth>
<div id=teamMeetingpointpara>
<p>meeting point:</p>
</div>
<div id=teamMeetingpointvar>
<p>$showeventmeetingpoint</p>
</div>
</div>

<br>

<div id=teamMeetingtimeboth>
<div id=teamMeetingtimepara>
<p>meeting time:</p>
</div>
<div id=teamMeetingtimevar>
<p>$showeventmeetingtime</p>
</div>
</div>

<br>

<div id=teamMeetingpcboth>
<div id=teamMeetingpcpara>
<p>meeting point post code:</p>
</div>
<div id=teamMeetingpcvar>
<p>$showeventmeetingpc</p>
</div>
</div>

</div>

_END;
         
 }
}

?>
</html>