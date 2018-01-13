<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="viewClubEvents.css" rel="stylesheet" type="text/css"/>
        
    </head>
    
    <?php

if(isset($_POST['viewClubMyDate'], $_SESSION['clubID']))
{
    $mydate  =  $_POST['viewClubMyDate'];
    $clubID  =  $_SESSION['clubID'];
    
      $eventtitle = $pdo->prepare('SELECT title FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventtitle->execute([$clubID, $mydate]);

if ($eventtitle->rowCount() == 0)
     {
echo <<<_END
<div id=viewClubNoevents>
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
<div id=viewClubEventfound>

<div id=viewClubTitleboth>
<div id=viewClubTitlepara>
<p>title:</p>
</div>
<div id=viewClubTitlevar>
<p>$showeventtitle</p>
</div>
</div>

<br>

<div id=viewClubDestinationboth>
<div id=viewClubDestinationpara>
<p>destination:</p>
</div>
<div id=viewClubDestinationvar>
<p>$showeventdestination</p>
</div>
</div>

<br>

<div id=viewClubEventtimeboth>
<div id=viewClubEventtimepara>
<p>event time:</p>
</div>
<div id=viewClubEventtimevar>
<p>$showeventeventtime</p>
</div>
</div>

<br>

<div id=viewClubDestinationpcboth>
<div id=viewClubDestinationpcpara>
<p>destination post code:</p>
</div>
<div id=viewClubDestinationpcvar>
<p>$showeventdestinationpc</p>
</div>
</div>

<br>

<div id=viewClubMeetingpointboth>
<div id=viewClubMeetingpointpara>
<p>meeting point:</p>
</div>
<div id=viewClubMeetingpointvar>
<p>$showeventmeetingpoint</p>
</div>
</div>

<br>

<div id=viewClubMeetingtimeboth>
<div id=viewClubMeetingtimepara>
<p>meeting time:</p>
</div>
<div id=viewClubMeetingtimevar>
<p>$showeventmeetingtime</p>
</div>
</div>

<br>

<div id=viewClubMeetingpcboth>
<div id=viewClubMeetingpcpara>
<p>meeting point post code:</p>
</div>
<div id=viewClubMeetingpcvar>
<p>$showeventmeetingpc</p>
</div>
</div>

</div>

_END;
         
 }
}

?>
</html>