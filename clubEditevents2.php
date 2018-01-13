<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="clubEditevents.css" rel="stylesheet" type="text/css"/>
        
             <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
    <!--link to call jquery file to cancel editing an event-->
    <script
    src='clubCanceleditevent2.js'>
    </script>
        
    <!--link to call jquery file to prevent submitting new event without filling anything in-->
    <script
    src='clubEditeventsubmitbutton.js'>
    </script>
        
<?php
        
 
        if(isset($_SESSION['clubID'], $_POST['clubTitleevent']))
            
        {

           $title    = $_POST['clubTitleevent'];
           $clubID   = $_SESSION['clubID'];
 

    //find id from database
$editid = $pdo->prepare('SELECT id FROM calendar WHERE username=? and title=?'); 

//execute query with variables
$editid->execute([$clubID, $title]);
         
($id = $editid->fetchcolumn());
            
            
            
            
$editeventstartdate = $pdo->prepare('SELECT startdate FROM calendar WHERE username=? and title=?'); 

//execute query with variables
$editeventstartdate->execute([$clubID, $title]);
         
($showediteventstartdate = $editeventstartdate->fetchcolumn());

//explode result into two times for dropdown list
list($startday, $startmonth, $startyear) = explode(' ', $showediteventstartdate);  
            
            
       
 $editdestination = $pdo->prepare('SELECT destination FROM calendar WHERE username=? and title=?'); 

//execute query with variables
$editdestination->execute([$clubID, $title]);
         
($showeditdestination = $editdestination->fetchcolumn());
      
            

$editeventstarttime = $pdo->prepare('SELECT eventtime FROM calendar WHERE username=? and title=?'); 

//execute query with variables
$editeventstarttime->execute([$clubID, $title]);
         
($showediteventstarttime = $editeventstarttime->fetchcolumn());

//explode result into two times for dropdown list
list($eventhour, $eventminute) = explode(':', $showediteventstarttime);  
            

$editdestinationpc = $pdo->prepare('SELECT destinationpc FROM calendar WHERE username=? and title=?'); 

//execute query with variables
$editdestinationpc->execute([$clubID, $title]);

         
($showeditdestinationpc = $editdestinationpc->fetchcolumn());
            
            
            
            
$editmeetingpoint = $pdo->prepare('SELECT meetingpoint FROM calendar WHERE username=? and title=?'); 

//execute query with variables
$editmeetingpoint->execute([$clubID, $title]);

         
($showeditmeetingpoint = $editmeetingpoint->fetchcolumn());
            
            
            
$editmeetingtime = $pdo->prepare('SELECT meetingtime FROM calendar WHERE username=? and title=?'); 

//execute query with variables
$editmeetingtime->execute([$clubID, $title]);

         
($showeditmeetingtime = $editmeetingtime->fetchcolumn());
            
    
 //explode result into two times for dropdown list
list($meethour, $meetminute) = explode(':', $showeditmeetingtime);           
            
            
            
$editmeetingpc = $pdo->prepare('SELECT meetingpc FROM calendar WHERE username=? and title=?'); 

//execute query with variables
$editmeetingpc->execute([$clubID, $title]);

         
($showeditmeetingpc = $editmeetingpc->fetchcolumn());
            
            
  $editeventtitle           = null;       
  $editeventstartdate       = null;       
  $editdestination          = null;         
  $editeventstarttime       = null;       
  $editdestinationpc        = null;       
  $editmeetingpoint         = null;        
  $editmeetingtime          = null;       
  $editmeetingpc            = null;
  $editid                   = null;

echo <<<_END

<form action="clubEditevents3.php" method="post" id="clubEditeventsform2">

<div id="clubEventstartdate">
  <label for="clubEventstartdate" class="event-start-date">event date*</label>
  <div class="startdate">
    <select name="clubEditstartday" id="clubEditstartday">
      <option value="$startday">$startday</option>
      <option value="1">01</option>
      <option value="2">02</option>
      <option value="3">03</option>
      <option value="4">04</option>
      <option value="5">05</option>
      <option value="6">06</option>
      <option value="7">07</option>
      <option value="8">08</option>
      <option value="9">09</option>
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
      <option value="24">24</option>
      <option value="25">25</option>
      <option value="26">26</option>
      <option value="27">27</option>
      <option value="28">28</option>
      <option value="29">29</option>
      <option value="30">30</option>
      <option value="31">31</option>
    </select>
    <select name="clubEditstartmonth" id="clubEditstartmonth">
      <option value="$startmonth">$startmonth</option>
      <option value="january">january</option>
      <option value="february">february</option>
      <option value="march">march</option>
      <option value="april">april</option>
      <option value="may">may</option>
      <option value="june">june</option>
      <option value="july">july</option>
      <option value="august">august</option>
      <option value="september">september</option>
      <option value="october">october</option>
      <option value="november">november</option>
      <option value="december">december</option>
    </select>
     <select name="clubEditstartyear" id="clubEditstartyear">
      <option value="$startyear">$startyear</option>
      <option value="2017">2017</option>
      <option value="2018">2018</option>
      <option value="2019">2019</option>
      <option value="2020">020</option>
      <option value="2021">2021</option>
      <option value="2022">2022</option>
      <option value="2023">2023</option>
      <option value="2024">2024</option>
      <option value="2025">2025</option>
    </select>
  </div>
</div>



<div id=clubTitle>
    <p>title*
    <input type="text" name="clubEdittitle" value="$title">
    </p> 
    </div>

<div id=clubDestination>
    <p>destination*<br>
    <input type="text" name="clubEditdestination" value="$showeditdestination">
    </p>
    </div>
    
  <div id="clubEventstarttime">
  <label for="clubEventstarttime" class="event-start-time">event start time / kickoff*</label>
  <div class="starttime">
    <select name="clubEditeventhour" id="clubEditeventhour">
      <option value="$eventhour">$eventhour</option>
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
    <select name="clubEditeventminute" id="clubEditeventminute">
      <option value="$eventminute">$eventminute</option>
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
    <input type="text" name="clubEditdestinationpc" value="$showeditdestinationpc">
    </p>
    </div>
    
    <div id=clubMeetingdestination>
    <p>meeting point*<br>
    <input type="text" name="clubEditmeetingpoint" value="$showeditmeetingpoint">
    </p>
    </div>
        
        <div id="clubMeetingtime">
  <label for="clubMeetingtime" class="meeting-time">meeting time*</label>
  <div class="meettime">
    <select name="clubEditmeethour" id="clubEditmeethour">
      <option value="$meethour">$meethour</option>
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
    <select name="clubEditmeetminute" id="clubEditmeetminute">
      <option value="$meetminute">$meetminute</option>
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
    <input type="text" name="clubEditmeetingpc" value="$showeditmeetingpc">
    </p>
    </div>  
    
      <div id=clubEditeventbuttons2>
    <div id=clubCanceleditevent2>
     <button type="button" class="canceledit">cancel</button>
    </div>
    <div id=clubSubmiteditevent2>
     <input type="submit" name="clubEditsubmit" value="edit event" id="clubEditsubmit"/>
     </div>
    </div>

<div id=clubIdnumber>     
    <input type="text" name="clubIdnumber" value="$id">
    </div>
    
    
<div id=clubEditeventnotfilledin>
<p>everything with an astrix must be filled in!</p>
</div>

    
    
          </form> 
      

_END;

        }

        else
        {
        
echo "there has been a problem with this page";
        }
?>
        
    </head>
    
      <body>
    
    </body>
</html>