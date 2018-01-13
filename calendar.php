<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'defaultsetup.php';
?>

<html>

    <head>
   
    <title>   
    sportmii
    </title>
       
       <!-- little image next to sportmii on tab-->
       <link rel="shortcut icon" type="image/png" href="images/sportmii%20logo.png">
        
        
<link href="calendar.css" rel="stylesheet" type="text/css"/>

     
      <!--link to call jquery file to bring up datepicker-->
    <script
    src='datepicker.js'>
    </script> 
        
    <!--link to call jquery file to cancel addng an event-->
    <script
    src='canceladdevent.js'>
    </script>
        
    <!--link to call jquery file to prevent submitting new event without filling anything in-->
    <script
    src='addeventsubmitbutton.js'>
    </script>
        
    <!--link to call jquery file to get startdate into textbox-->
    <script
    src='startdate.js'>
    </script>
        
     <!--link to call jquery file to bring edit events up-->
    <script
    src='editeventspopup.js'>
    </script>
        
     <!--link to call jquery file to bring delete events up-->
    <script
    src='deleteeventspopup.js'>
    </script>
        
        
   </head>
   
   <body>
       
<?php
 
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
$findEventStartdates->execute([$username]);

              
($eventStartdates = $findEventStartdates->fetchAll(PDO::FETCH_COLUMN));
       
/*$highlightEvents = implode("', '",$eventStartdates);
       
echo <<<_END
 <input type="text" name="eventHighlight" id="eventHighlight" value="'$highlightEvents'">
_END;
*/


?>
       
<script type="text/javascript">
    //Assign php generated json to JavaScript variable
    var event = <?php echo json_encode($eventStartdates); ?>;
</script>

<?php           
  
// if 'createevent' is pressed submit all info to mysql database
if (isset($_POST['createevent']))
{       

  // if below are set
   /* if (isset($_POST['startdate'], $_POST['title'], $_POST['destination'], $_POST['meetingpoint']))*/
    

        
        //declare variables
        $startdate = ($_POST['startdate']);
        $title = ($_POST['title']);
        $destination = ($_POST['destination']);
        $destinationpc = ($_POST['destinationpc']);
        $meetingpoint = ($_POST['meetingpoint']);
        $meetingpc = ($_POST['meetingpc']);  
    
        //declare event times    
        $eventhour=$_POST['eventhour'];
        $eventminute=$_POST['eventminute'];
    
        $eventtime = $eventhour.':'.$eventminute; 
        
        //declare meeting times    
        $meethour=$_POST['meethour'];
        $meetminute=$_POST['meetminute'];
    
        $meetingtime = $meethour.':'.$meetminute; 
        
        
     //if any variables are left empty
    if 
        
        ($startdate == "" || $title == "" || $destination == "" || $eventtime == 0 || $meetingpoint == "" || $meetingtime == 0) 
        
        {

echo <<<_END
<div id=errorposition>
<div id=notfilledin>
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
$entercal->execute([$startdate, $title, $destination, $eventtime, $destinationpc, $meetingpoint, $meetingtime, $meetingpc, $username]);
        
    $entercal = null;
        
echo <<<_END
<script>
  window.location.href = "calendar.php";
</script>
_END;
        
    }
        
}
        
       

echo <<<_END

       <div id=centereverything>
       
       <div id=highlightadate>
       <p>hover over a date to see events</p>
       </div>
       
       <div id=clickonadate>
       <p>click on a date to add an event</p>
       </div>
       
       <div id=events>
       <div id=eventcontent>
       </div>
           </div> 
           
           <div id=eventsheading>
           <div id=headingcontent>
           </div>
           </div>
       
      <div id = "datepicker">
      </div>
      
      <div id=editeventdiv>
      <button type="button" class="edit">edit event</button>
      </div>
      <div id=deleteEventDiv>
      <button type="button" class="delete">delete event</button>
      </div>
      
       </div>
      
    <div id=eventspopup>
    
     <form action="calendar.php" method="post" id="eventsform">
        
    <div id=date>
    <span id="startdatespan" name="startdatespan"></span>
    </div>
    
    <div id=hiddendate>
    <input type="text" name="startdate" id="startdate" value="$startdate">
    </div>
    
    <div id=title>
    <p>title*   
    <input type="text" name="title" value="$title">
    </p> 
    </div>
    
    <div id=destination>
    <p>destination*<br>
    <input type="text" name="destination" value="$destination">
    </p>
    </div>
        
        
    <div id="eventstarttime">
  <label for="eventstarttime" class="event-start-time">event start time / kickoff*</label>
  <div class="starttime">
    <select name="eventhour" id="eventhour">
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
    <select name="eventminute" id="eventminute">
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
     
    <div id=destinationpc>     
    <p>destination post code<br>
    <input type="text" name="destinationpc" value="$destinationpc">
    </p>
    </div>
    
    <div id=meetingdestination>
    <p>meeting point*<br>
    <input type="text" name="meetingpoint" value="$meetingpoint">
    </p>
    </div>
        
        <div id="meetingtime">
  <label for="meetingtime" class="meeting-time">meeting time*</label>
  <div class="meettime">
    <select name="meethour" id="meethour">
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
    <select name="meetminute" id="meetminute">
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
      
    <div id=meetingdestinationpc>     
    <p>meeting point post code<br>
    <input type="text" name="meetingpc" value="$meetingpc">
    </p>
    </div>
        
    <div id=addeventbuttons>
    <div id=canceladdevent>
     <button type="button" class="canceladd">cancel</button>
    </div>
    <div id=submitaddevent>
     <input type="submit" name="createevent" value="create event" id="createevent" />
     </div>
    </div>
    
    <div id=notfilledin>
    <p>everything with an astrix must be filled in!</p>
    </div>
    
        
    </form>

    </div> 
    
    <div id=editeventspopup>
    <!--load ajax page editevents.php in here-->
    </div> 
    
     <div id=deleteEventsPopup>
    <!--load ajax page deleteevents.php in here-->
    </div> 

_END;

?>
   </body>
    
</html>