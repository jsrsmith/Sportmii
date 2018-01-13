<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'defaultsetup.php';
?>

<html>

    <head>
       
       <!-- little image next to sportmii on tab-->
       <link rel="shortcut icon" type="image/png" href="images/sportmii%20logo.png">
        
        
<link href="viewTeamCalendar.css" rel="stylesheet" type="text/css"/>

     
    <!--link to call jquery file to bring up datepicker--> 
    <script
    src='viewTeamDatepicker.js'>
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
    var viewTeamEventCal = <?php echo json_encode($eventStartdates); ?>;
</script>

<?php           


echo <<<_END

       <div id=viewTeamCentereverything>
       
       <div id=viewTeamHighlightadate>
       <p>hover over a date to see events</p>
       </div>
       
       <div id=viewTeamEvents>
       <div id=viewTeamEventcontent>
       </div>
           </div> 
           
           <div id=viewTeamEventsheading>
           <div id=viewTeamHeadingcontent>
           </div>
           </div>
       
      <div id = "viewTeamDatepickerCal">
      </div>
      
       </div>

_END;

?>
   </body>
    
</html>