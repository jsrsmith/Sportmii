<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="clubEvents.css" rel="stylesheet" type="text/css"/>
        
    </head>
    
    <?php

if(isset($_POST['clubMyDate'], $_SESSION['clubID']))
{
    $mydate  =  $_POST['clubMyDate'];
    $clubID  =  $_SESSION['clubID'];
    
      $eventtitle = $pdo->prepare('SELECT title FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventtitle->execute([$clubID, $mydate]);

if ($eventtitle->rowCount() == 0)
     {
echo <<<_END
<div id=clubNoevents>
<p>there are no events to show for today.</p>
</div>
_END;
       }
    
     else
    
     {
($showeventtitle = $eventtitle->fetchcolumn());
         
         
         
 $eventdestination = $pdo->prepare('SELECT destination FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventdestination->execute([$clubID, $mydate]);
         
($showeventdestination = $eventdestination->fetchcolumn());
         
         
         
$eventeventtime = $pdo->prepare('SELECT eventtime FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventeventtime->execute([$clubID, $mydate]);
         
($showeventeventtime = $eventeventtime->fetchcolumn());
         
         
         
$eventdestinationpc = $pdo->prepare('SELECT destinationpc FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventdestinationpc->execute([$clubID, $mydate]);
         
($showeventdestinationpc = $eventdestinationpc->fetchcolumn());
         
         
         
$eventmeetingpoint = $pdo->prepare('SELECT meetingpoint FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventmeetingpoint->execute([$clubID, $mydate]);
         
($showeventmeetingpoint = $eventmeetingpoint->fetchcolumn());
         
         

$eventmeetingtime = $pdo->prepare('SELECT meetingtime FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventmeetingtime->execute([$clubID, $mydate]);
         
($showeventmeetingtime = $eventmeetingtime->fetchcolumn());
         
         
         
$eventmeetingpc = $pdo->prepare('SELECT meetingpc FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventmeetingpc->execute([$clubID, $mydate]);
         
($showeventmeetingpc = $eventmeetingpc->fetchcolumn());
         
         
         
echo <<<_END
<div id=clubEventfound>

<div id=clubTitleboth>
<div id=clubTitlepara>
<p>title:</p>
</div>
<div id=clubTitlevar>
<p>$showeventtitle</p>
</div>
</div>

<br>

<div id=clubDestinationboth>
<div id=clubDestinationpara>
<p>destination:</p>
</div>
<div id=clubDestinationvar>
<p>$showeventdestination</p>
</div>
</div>

<br>

<div id=clubEventtimeboth>
<div id=clubEventtimepara>
<p>event time:</p>
</div>
<div id=clubEventtimevar>
<p>$showeventeventtime</p>
</div>
</div>

<br>

<div id=clubDestinationpcboth>
<div id=clubDestinationpcpara>
<p>destination post code:</p>
</div>
<div id=clubDestinationpcvar>
<p>$showeventdestinationpc</p>
</div>
</div>

<br>

<div id=clubMeetingpointboth>
<div id=clubMeetingpointpara>
<p>meeting point:</p>
</div>
<div id=clubMeetingpointvar>
<p>$showeventmeetingpoint</p>
</div>
</div>

<br>

<div id=clubMeetingtimeboth>
<div id=clubMeetingtimepara>
<p>meeting time:</p>
</div>
<div id=clubMeetingtimevar>
<p>$showeventmeetingtime</p>
</div>
</div>

<br>

<div id=clubMeetingpcboth>
<div id=clubMeetingpcpara>
<p>meeting point post code:</p>
</div>
<div id=clubMeetingpcvar>
<p>$showeventmeetingpc</p>
</div>
</div>

</div>

_END;
         
 }
}

?>
</html>