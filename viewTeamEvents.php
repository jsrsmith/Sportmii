<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="viewTeamEvents.css" rel="stylesheet" type="text/css"/>
        
    </head>
    
    <?php

if(isset($_POST['viewTeamMyDate'], $_SESSION['teamID']))
{
    $mydate  =  $_POST['viewTeamMyDate'];
    $teamID  =  $_SESSION['teamID'];
    
      $eventtitle = $pdo->prepare('SELECT title FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventtitle->execute([$teamID, $mydate]);

if ($eventtitle->rowCount() == 0)
     {
echo <<<_END
<div id=viewTeamNoevents>
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
<div id=viewTeamEventfound>

<div id=viewTeamTitleboth>
<div id=viewTeamTitlepara>
<p>title:</p>
</div>
<div id=viewTeamTitlevar>
<p>$showeventtitle</p>
</div>
</div>

<br>

<div id=viewTeamDestinationboth>
<div id=viewTeamDestinationpara>
<p>destination:</p>
</div>
<div id=viewTeamDestinationvar>
<p>$showeventdestination</p>
</div>
</div>

<br>

<div id=viewTeamEventtimeboth>
<div id=viewTeamEventtimepara>
<p>event time:</p>
</div>
<div id=viewTeamEventtimevar>
<p>$showeventeventtime</p>
</div>
</div>

<br>

<div id=viewTeamDestinationpcboth>
<div id=viewTeamDestinationpcpara>
<p>destination post code:</p>
</div>
<div id=viewTeamDestinationpcvar>
<p>$showeventdestinationpc</p>
</div>
</div>

<br>

<div id=viewTeamMeetingpointboth>
<div id=viewTeamMeetingpointpara>
<p>meeting point:</p>
</div>
<div id=viewTeamMeetingpointvar>
<p>$showeventmeetingpoint</p>
</div>
</div>

<br>

<div id=viewTeamMeetingtimeboth>
<div id=viewTeamMeetingtimepara>
<p>meeting time:</p>
</div>
<div id=viewTeamMeetingtimevar>
<p>$showeventmeetingtime</p>
</div>
</div>

<br>

<div id=viewTeamMeetingpcboth>
<div id=viewTeamMeetingpcpara>
<p>meeting point post code:</p>
</div>
<div id=viewTeamMeetingpcvar>
<p>$showeventmeetingpc</p>
</div>
</div>

</div>

_END;
         
 }
}

?>
</html>