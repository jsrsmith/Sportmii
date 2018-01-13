<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'defaultsetup.php';
?>

<html>

    <head>
       
       <!-- little image next to sportmii on tab-->
       <link rel="shortcut icon" type="image/png" href="images/sportmii%20logo.png">
        
        
<link href="teamCalendar.css" rel="stylesheet" type="text/css"/>

     
    <!--link to call jquery file to bring up datepicker--> 
    <script
    src='teamDatepicker.js'>
    </script>
        
    <!--link to call jquery file to cancel addng an event-->
    <script
    src='teamCanceladdevent.js'>
    </script>
        
    <!--link to call jquery file to prevent submitting new event without filling anything in-->
    <script
    src='teamAddeventsubmitbutton.js'>
    </script>
        
    <!--link to call jquery file to get startdate into textbox-->
    <script
    src='teamStartdate.js'>
    </script>
        
     <!--link to call jquery file to bring edit events up-->
    <script
    src='teamEditeventspopup.js'>
    </script>
        
     <!--link to call jquery file to bring delete events up-->
    <script
    src='teamDeleteeventspopup.js'>
    </script>
        
        
   </head>
   
   <body>
       
<?php
       
$teamID  =  $_SESSION['teamID'];
 
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
$findEventStartdates->execute([$teamID]);

              
($eventStartdates = $findEventStartdates->fetchAll(PDO::FETCH_COLUMN));
       
/*$highlightEvents = implode("', '",$eventStartdates);
       
echo <<<_END
 <input type="text" name="eventHighlight" id="eventHighlight" value="'$highlightEvents'">
_END;
*/


?>
       
<script type="text/javascript">
    //Assign php generated json to JavaScript variable
    var teamEvent = <?php echo json_encode($eventStartdates); ?>;
</script>

<?php           
  
// if 'createevent' is pressed submit all info to mysql database
if (isset($_POST['teamCreateevent']))
{       

  // if below are set
   /* if (isset($_POST['startdate'], $_POST['title'], $_POST['destination'], $_POST['meetingpoint']))*/
    

        
        //declare variables
        $startdate = ($_POST['teamStartdate']);
        $title = ($_POST['teamTitle']);
        $destination = ($_POST['teamDestination']);
        $destinationpc = ($_POST['teamDestinationpc']);
        $meetingpoint = ($_POST['teamMeetingpoint']);
        $meetingpc = ($_POST['teamMeetingpc']);  
    
        //declare event times    
        $eventhour=$_POST['teamEventhour'];
        $eventminute=$_POST['teamEventminute'];
    
        $eventtime = $eventhour.':'.$eventminute; 
        
        //declare meeting times    
        $meethour=$_POST['teamMeethour'];
        $meetminute=$_POST['teamMeetminute'];
    
        $meetingtime = $meethour.':'.$meetminute; 
        
        
     //if any variables are left empty
    if 
        
        ($startdate == "" || $title == "" || $destination == "" || $eventtime == 0 || $meetingpoint == "" || $meetingtime == 0) 
        
        {

echo <<<_END
<div id=teamErrorposition>
<div id=teamNotfilledin>
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
$entercal->execute([$startdate, $title, $destination, $eventtime, $destinationpc, $meetingpoint, $meetingtime, $meetingpc, $teamID]);
        
    $entercal = null;
        
echo <<<_END
<script>
  window.location.href = "teamCalendar.php";
</script>
_END;
        
    }
        
}
        
       

echo <<<_END

       <div id=teamCentereverything>
       
       <div id=teamHighlightadate>
       <p>hover over a date to see events</p>
       </div>
       
       <div id=teamClickonadate>
       <p>click on a date to add an event</p>
       </div>
       
       <div id=teamEvents>
       <div id=teamEventcontent>
       </div>
           </div> 
           
           <div id=teamEventsheading>
           <div id=teamHeadingcontent>
           </div>
           </div>
       
      <div id = "teamDatepicker">
      </div>
      
      <div id=teamEditeventdiv>
      <button type="button" class="edit">edit event</button>
      </div>
      <div id=teamDeleteEventDiv>
      <button type="button" class="delete">delete event</button>
      </div>
      
       </div>
      
    <div id=teamEventspopup>
    
     <form action="teamCalendar.php" method="post" id="teamEventsform">
        
    <div id=teamDate>
    <span id="teamStartdatespan" name="teamStartdatespan"></span>
    </div>
    
    <div id=teamHiddendate>
    <input type="text" name="teamStartdate" id="teamStartdate" value="$startdate">
    </div>
    
    <div id=teamTitle>
    <p>title*   
    <input type="text" name="teamTitle" value="$title">
    </p> 
    </div>
    
    <div id=teamDestination>
    <p>destination*<br>
    <input type="text" name="teamDestination" value="$destination">
    </p>
    </div>
        
        
    <div id="teamEventstarttime">
  <label for="teamEventstarttime" class="event-start-time">event start time / kickoff*</label>
  <div class="starttime">
    <select name="teamEventhour" id="teamEventhour">
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
    <select name="teamEventminute" id="teamEventminute">
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
     
    <div id=teamDestinationpc>     
    <p>destination post code<br>
    <input type="text" name="teamDestinationpc" value="$destinationpc">
    </p>
    </div>
    
    <div id=teamMeetingdestination>
    <p>meeting point*<br>
    <input type="text" name="teamMeetingpoint" value="$meetingpoint">
    </p>
    </div>
        
        <div id="teamMeetingtime">
  <label for="teamMeetingtime" class="meeting-time">meeting time*</label>
  <div class="meettime">
    <select name="teamMeethour" id="teamMeethour">
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
    <select name="teamMeetminute" id="teamMeetminute">
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
      
    <div id=teamMeetingdestinationpc>     
    <p>meeting point post code<br>
    <input type="text" name="teamMeetingpc" value="$meetingpc">
    </p>
    </div>
        
    <div id=teamAddeventbuttons>
    <div id=teamCanceladdevent>
     <button type="button" class="canceladd">cancel</button>
    </div>
    <div id=teamSubmitaddevent>
     <input type="submit" name="teamCreateevent" value="create event" id="teamCreateevent" />
     </div>
    </div>
    
    <div id=teamNotfilledin>
    <p>everything with an astrix must be filled in!</p>
    </div>
    
        
    </form>

    </div> 
    
    <div id=teamEditeventspopup>
    <!--load ajax page editevents.php in here-->
    </div> 
    
     <div id=teamDeleteEventsPopup>
    <!--load ajax page deleteevents.php in here-->
    </div> 

_END;

?>
   </body>
    
</html>