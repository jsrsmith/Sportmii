<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'defaultsetup.php';
?>

<html>

    <head>
       
       <!-- little image next to sportmii on tab-->
       <link rel="shortcut icon" type="image/png" href="images/sportmii%20logo.png">
        
        
<link href="clubCalendar.css" rel="stylesheet" type="text/css"/>

     
    <!--link to call jquery file to bring up datepicker--> 
    <script
    src='clubDatepicker.js'>
    </script>
        
    <!--link to call jquery file to cancel addng an event-->
    <script
    src='clubCanceladdevent.js'>
    </script>
        
    <!--link to call jquery file to prevent submitting new event without filling anything in-->
    <script
    src='clubAddEventSubmitButton.js'>
    </script>
        
    <!--link to call jquery file to get startdate into textbox-->
    <script
    src='clubStartdate.js'>
    </script>
        
     <!--link to call jquery file to bring edit events up-->
    <script
    src='clubEditEventsPopup.js'>
    </script>
        
     <!--link to call jquery file to bring delete events up-->
    <script
    src='clubDeleteEventsPopup.js'>
    </script>
        
        
   </head>
   
   <body>
       
<?php
       
$clubID  =  $_SESSION['clubID'];
 
$startdate = "";
$title = "";
$destination = "";
$destinationpc = "";
$meetingpoint = "";
$meetingpc = "";
$mydate = "";
$showevent = "";
       
$findEventStartdates = $pdo->prepare('SELECT startdate FROM calendar WHERE username=?'); 

//execute query with variables
$findEventStartdates->execute([$clubID]);

              
($eventStartdates = $findEventStartdates->fetchAll(PDO::FETCH_COLUMN));
       
/*$highlightEvents = implode("', '",$eventStartdates);
       
echo <<<_END
 <input type="text" name="eventHighlight" id="eventHighlight" value="'$highlightEvents'">
_END;
*/


?>
       
<script type="text/javascript">
    //Assign php generated json to JavaScript variable
    var clubEvent = <?php echo json_encode($eventStartdates); ?>;
</script>

<?php           
  
// if 'createevent' is pressed submit all info to mysql database
if (isset($_POST['clubCreateevent']))
{       

  // if below are set
   /* if (isset($_POST['startdate'], $_POST['title'], $_POST['destination'], $_POST['meetingpoint']))*/
    

        
        //declare variables
        $startdate = ($_POST['clubStartdate']);
        $title = ($_POST['clubTitle']);
        $destination = ($_POST['clubDestination']);
        $destinationpc = ($_POST['clubDestinationpc']);
        $meetingpoint = ($_POST['clubMeetingpoint']);
        $meetingpc = ($_POST['clubMeetingpc']);  
    
        //declare event times    
        $eventhour=$_POST['clubEventhour'];
        $eventminute=$_POST['clubEventminute'];
    
        $eventtime = $eventhour.':'.$eventminute; 
        
        //declare meeting times    
        $meethour=$_POST['clubMeethour'];
        $meetminute=$_POST['clubMeetminute'];
    
        $meetingtime = $meethour.':'.$meetminute; 
        
        
     //if any variables are left empty
    if 
        
        ($startdate == "" || $title == "" || $destination == "" || $eventtime == 0 || $meetingpoint == "" || $meetingtime == 0) 
        
        {

echo <<<_END
<div id=clubErrorposition>
<div id=clubNotfilledin>
<p>sorry! everything with an astrix must be filled in.</p>
</div>
</div>
_END;

        }    
        
    else
    {
        
        $startdate        = strtolower($startdate);
        $title            = strtolower($title);
        $destination      = strtolower($destination);
        $meetingpoint     = strtolower($meetingpoint);       
        
        
        $entercal = $pdo->prepare('INSERT INTO calendar (startdate, title, destination, eventtime, destinationpc, meetingpoint, meetingtime, meetingpc, username) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
        
        //execute query and variables
$entercal->execute([$startdate, $title, $destination, $eventtime, $destinationpc, $meetingpoint, $meetingtime, $meetingpc, $clubID]);
        
    $entercal = null;
        
echo <<<_END
<script>
  window.location.href = "clubCalendar.php";
</script>
_END;
        
    }
        
}
        
       

echo <<<_END

       <div id=clubCentereverything>
       
       <div id=clubHighlightadate>
       <p>hover over a date to see events</p>
       </div>
       
       <div id=clubClickonadate>
       <p>click on a date to add an event</p>
       </div>
       
       <div id=clubEvents>
       <div id=clubEventcontent>
       </div>
           </div> 
           
           <div id=clubEventsheading>
           <div id=clubHeadingcontent>
           </div>
           </div>
       
      <div id = "clubDatepicker">
      </div>
      
      <div id=clubEditeventdiv>
      <button type="button" class="edit">edit event</button>
      </div>
      <div id=clubDeleteEventDiv>
      <button type="button" class="delete">delete event</button>
      </div>
      
       </div>
      
    <div id=clubEventspopup>
    
     <form action="clubCalendar.php" method="post" id="clubEventsform">
        
    <div id=clubDate>
    <span id="clubStartdatespan" name="clubStartdatespan"></span>
    </div>
    
    <div id=clubHiddendate>
    <input type="text" name="clubStartdate" id="clubStartdate" value="$startdate">
    </div>
    
    <div id=clubTitle>
    <p>title*   
    <input type="text" name="clubTitle" value="$title">
    </p> 
    </div>
    
    <div id=clubDestination>
    <p>destination*<br>
    <input type="text" name="clubDestination" value="$destination">
    </p>
    </div>
        
        
    <div id="clubEventstarttime">
  <label for="clubEventstarttime" class="event-start-time">event start time / kickoff*</label>
  <div class="starttime">
    <select name="clubEventhour" id="clubEventhour">
      <option value="">hour</option>
      <option value="01">01</option>
      <option value="02">02</option>
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07">07</option>
      <option value="08">08</option>
      <option value="09">09</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
    </select>
    <select name="clubEventminute" id="clubEventminute">
      <option value="">minute</option>
      <option value="00">00</option>
      <option value="05">05</option>
      <option value="10">10</option>
      <option value="15">15</option>
      <option value="20">20</option>
      <option value="25">25</option>
      <option value="30">30</option>
      <option value="35">35</option>
      <option value="40">40</option>
      <option value="45">45</option>
      <option value="50">50</option>
      <option value="55">55</option>
    </select>
  </div>
</div>
     
    <div id=clubDestinationpc>     
    <p>destination post code<br>
    <input type="text" name="clubDestinationpc" value="$destinationpc">
    </p>
    </div>
    
    <div id=clubMeetingdestination>
    <p>meeting point*<br>
    <input type="text" name="clubMeetingpoint" value="$meetingpoint">
    </p>
    </div>
        
        <div id="clubMeetingtime">
  <label for="clubMeetingtime" class="meeting-time">meeting time*</label>
  <div class="meettime">
    <select name="clubMeethour" id="clubMeethour">
      <option value="">hour</option>
      <option value="01">01</option>
      <option value="02">02</option>
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07">07</option>
      <option value="08">08</option>
      <option value="09">09</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
    </select>
    <select name="clubMeetminute" id="clubMeetminute">
      <option value="">minute</option>
      <option value="00">00</option>
      <option value="05">05</option>
      <option value="10">10</option>
      <option value="15">15</option>
      <option value="20">20</option>
      <option value="25">25</option>
      <option value="30">30</option>
      <option value="35">35</option>
      <option value="40">40</option>
      <option value="45">45</option>
      <option value="50">50</option>
      <option value="55">55</option>
    </select>
  </div>
</div>
      
    <div id=clubMeetingdestinationpc>     
    <p>meeting point post code<br>
    <input type="text" name="clubMeetingpc" value="$meetingpc">
    </p>
    </div>
        
    <div id=clubAddeventbuttons>
    <div id=clubCanceladdevent>
     <button type="button" class="canceladd">cancel</button>
    </div>
    <div id=clubSubmitaddevent>
     <input type="submit" name="clubCreateevent" value="create event" id="clubCreateevent" />
     </div>
    </div>
    
    <div id=clubNotfilledin>
    <p>everything with an astrix must be filled in!</p>
    </div>
    
        
    </form>

    </div> 
    
    <div id=clubEditeventspopup>
    <!--load ajax page editevents.php in here-->
    </div> 
    
     <div id=clubDeleteEventsPopup>
    <!--load ajax page deleteevents.php in here-->
    </div> 

_END;

?>
   </body>
    
</html>