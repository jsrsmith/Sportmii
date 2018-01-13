<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'defaultsetup.php';
?>

<html>

    <head>
       
       <!-- little image next to sportmii on tab-->
       <link rel="shortcut icon" type="image/png" href="images/sportmii%20logo.png">
        
        
<link href="viewClubCalendar.css" rel="stylesheet" type="text/css"/>

     
    <!--link to call jquery file to bring up datepicker--> 
    <script
    src='viewClubDatepicker.js'>
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
    var viewClubEventCal = <?php echo json_encode($eventStartdates); ?>;
</script>

<?php           


echo <<<_END

       <div id=viewClubCentereverything>
       
       <div id=viewClubHighlightadate>
       <p>hover over a date to see events</p>
       </div>
       
       <div id=viewClubEvents>
       <div id=viewClubEventcontent>
       </div>
           </div> 
           
           <div id=viewClubEventsheading>
           <div id=viewClubHeadingcontent>
           </div>
           </div>
       
      <div id = "viewClubDatepickerCal">
      </div>
      
       </div>

_END;

?>
   </body>
    
</html>