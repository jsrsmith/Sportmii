<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="events.css" rel="stylesheet" type="text/css"/>
        
    </head>
    
    <?php

if(isset($_POST['myDate'], $_SESSION['username']))
{
    $mydate  =  $_POST['myDate'];
    
      $eventtitle = $pdo->prepare('SELECT title FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventtitle->execute([$username, $mydate]);

if ($eventtitle->rowCount() == 0)
     {
echo <<<_END
<div id=noevents>
<p>there are no events to show for today.</p>
</div>
_END;
       }
    
     else
    
     {
($showeventtitle = $eventtitle->fetchcolumn());
         
         
         
 $eventdestination = $pdo->prepare('SELECT destination FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventdestination->execute([$username, $mydate]);
         
($showeventdestination = $eventdestination->fetchcolumn());
         
         
         
$eventeventtime = $pdo->prepare('SELECT eventtime FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventeventtime->execute([$username, $mydate]);
         
($showeventeventtime = $eventeventtime->fetchcolumn());
         
         
         
$eventdestinationpc = $pdo->prepare('SELECT destinationpc FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventdestinationpc->execute([$username, $mydate]);
         
($showeventdestinationpc = $eventdestinationpc->fetchcolumn());
         
         
         
$eventmeetingpoint = $pdo->prepare('SELECT meetingpoint FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventmeetingpoint->execute([$username, $mydate]);
         
($showeventmeetingpoint = $eventmeetingpoint->fetchcolumn());
         
         

$eventmeetingtime = $pdo->prepare('SELECT meetingtime FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventmeetingtime->execute([$username, $mydate]);
         
($showeventmeetingtime = $eventmeetingtime->fetchcolumn());
         
         
         
$eventmeetingpc = $pdo->prepare('SELECT meetingpc FROM calendar WHERE username=? and startdate=?'); 

//execute query with variables
$eventmeetingpc->execute([$username, $mydate]);
         
($showeventmeetingpc = $eventmeetingpc->fetchcolumn());
         
         
         
echo <<<_END
<div id=eventfound>

<div id=titleboth>
<div id=titlepara>
<p>title:</p>
</div>
<div id=titlevar>
<p>$showeventtitle</p>
</div>
</div>

<br>

<div id=destinationboth>
<div id=destinationpara>
<p>destination:</p>
</div>
<div id=destinationvar>
<p>$showeventdestination</p>
</div>
</div>

<br>

<div id=eventtimeboth>
<div id=eventtimepara>
<p>event time:</p>
</div>
<div id=eventtimevar>
<p>$showeventeventtime</p>
</div>
</div>

<br>

<div id=destinationpcboth>
<div id=destinationpcpara>
<p>destination post code:</p>
</div>
<div id=destinationpcvar>
<p>$showeventdestinationpc</p>
</div>
</div>

<br>

<div id=meetingpointboth>
<div id=meetingpointpara>
<p>meeting point:</p>
</div>
<div id=meetingpointvar>
<p>$showeventmeetingpoint</p>
</div>
</div>

<br>

<div id=meetingtimeboth>
<div id=meetingtimepara>
<p>meeting time:</p>
</div>
<div id=meetingtimevar>
<p>$showeventmeetingtime</p>
</div>
</div>

<br>

<div id=meetingpcboth>
<div id=meetingpcpara>
<p>meeting point post code:</p>
</div>
<div id=meetingpcvar>
<p>$showeventmeetingpc</p>
</div>
</div>

</div>

_END;
         
 }
}

?>
</html>


















