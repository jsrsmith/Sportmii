<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'header.php';


// if 'editsubmit' is pressed submit all info to mysql database
if (isset($_SESSION['teamID'], $_POST['teamEditsubmit']))
{       

    $teamID = $_SESSION['teamID'];
    
        //declare variables
        $showeditid = ($_POST['teamIdnumber']);
        $showedittitle = ($_POST['teamEdittitle']);
        $showeditdestination = ($_POST['teamEditdestination']);
        $showeditdestinationpc = ($_POST['teamEditdestinationpc']);
        $showeditmeetingpoint = ($_POST['teamEditmeetingpoint']);
        $showeditmeetingpc = ($_POST['teamEditmeetingpc']);  
    
        //declare startdate
        $startday = ($_POST['teamEditstartday']);
        $startmonth = ($_POST['teamEditstartmonth']);
        $startyear = ($_POST['teamEditstartyear']);
   
        $startdate = $startday.' '.$startmonth.' '.$startyear;
   
      //declare event times    
        $eventhour=$_POST['teamEditeventhour'];
        $eventminute=$_POST['teamEditeventminute'];
  
        $eventtime = $eventhour.':'.$eventminute; 
  
        //declare meeting times    
        $meethour=$_POST['teamEditmeethour'];
        $meetminute=$_POST['teamEditmeetminute'];

        $meetingtime = $meethour.':'.$meetminute; 
        
        $startdate                = strtolower($startdate);
        $showedittitle            = strtolower($showedittitle);
        $showeditdestination      = strtolower($showeditdestination);
        $showeditmeetingpoint     = strtolower($showeditmeetingpoint); 
    

        $updateevent = "UPDATE calendar SET startdate=?, title=?, destination=?, eventtime=?, destinationpc=?, meetingpoint=?, meetingtime=?, meetingpc=?, username=? WHERE id=?";
        
        //execute query and variables
$pdo->prepare($updateevent)->execute([$startdate, $showedittitle, $showeditdestination, $eventtime, $showeditdestinationpc, $showeditmeetingpoint, $meetingtime, $showeditmeetingpc, $teamID, $showeditid]);
    
    $updateevent = null;

echo <<<_END
<script>
  window.location.href = "teamCalendar.php";
</script>
_END;

       
}
?>