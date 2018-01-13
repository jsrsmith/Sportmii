<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'header.php';


// if 'editsubmit' is pressed submit all info to mysql database
if (isset($_SESSION['clubID'], $_POST['clubEditsubmit']))
{       

    $clubID = $_SESSION['clubID'];
    
        //declare variables
        $showeditid = ($_POST['clubIdnumber']);
        $showedittitle = ($_POST['clubEdittitle']);
        $showeditdestination = ($_POST['clubEditdestination']);
        $showeditdestinationpc = ($_POST['clubEditdestinationpc']);
        $showeditmeetingpoint = ($_POST['clubEditmeetingpoint']);
        $showeditmeetingpc = ($_POST['clubEditmeetingpc']);  
    
        //declare startdate
        $startday = ($_POST['clubEditstartday']);
        $startmonth = ($_POST['clubEditstartmonth']);
        $startyear = ($_POST['clubEditstartyear']);
   
        $startdate = $startday.' '.$startmonth.' '.$startyear;
   
      //declare event times    
        $eventhour=$_POST['clubEditeventhour'];
        $eventminute=$_POST['clubEditeventminute'];
  
        $eventtime = $eventhour.':'.$eventminute; 
  
        //declare meeting times    
        $meethour=$_POST['clubEditmeethour'];
        $meetminute=$_POST['clubEditmeetminute'];

        $meetingtime = $meethour.':'.$meetminute; 
        
        $startdate                = strtolower($startdate);
        $showedittitle            = strtolower($showedittitle);
        $showeditdestination      = strtolower($showeditdestination);
        $showeditmeetingpoint     = strtolower($showeditmeetingpoint); 
    

        $updateevent = "UPDATE calendar SET startdate=?, title=?, destination=?, eventtime=?, destinationpc=?, meetingpoint=?, meetingtime=?, meetingpc=?, username=? WHERE id=?";
        
        //execute query and variables
$pdo->prepare($updateevent)->execute([$startdate, $showedittitle, $showeditdestination, $eventtime, $showeditdestinationpc, $showeditmeetingpoint, $meetingtime, $showeditmeetingpc, $clubID, $showeditid]);
    
    $updateevent = null;

echo <<<_END
<script>
  window.location.href = "clubCalendar.php";
</script>
_END;

       
}
?>