<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'header.php';


// if 'editsubmit' is pressed submit all info to mysql database
if (isset($_SESSION['username'], $_POST['editsubmit']))
{       

        //declare variables
        $showeditid = ($_POST['idnumber']);
        $showedittitle = ($_POST['edittitle']);
        $showeditdestination = ($_POST['editdestination']);
        $showeditdestinationpc = ($_POST['editdestinationpc']);
        $showeditmeetingpoint = ($_POST['editmeetingpoint']);
        $showeditmeetingpc = ($_POST['editmeetingpc']);  
    
        //declare startdate
        $startday = ($_POST['editstartday']);
        $startmonth = ($_POST['editstartmonth']);
        $startyear = ($_POST['editstartyear']);
   
        $startdate = $startday.' '.$startmonth.' '.$startyear;
   
      //declare event times    
        $eventhour=$_POST['editeventhour'];
        $eventminute=$_POST['editeventminute'];
  
        $eventtime = $eventhour.':'.$eventminute; 
  
        //declare meeting times    
        $meethour=$_POST['editmeethour'];
        $meetminute=$_POST['editmeetminute'];

        $meetingtime = $meethour.':'.$meetminute; 
        
        $startdate                = strtolower($startdate);
        $showedittitle            = strtolower($showedittitle);
        $showeditdestination      = strtolower($showeditdestination);
        $showeditmeetingpoint     = strtolower($showeditmeetingpoint); 
    

        $updateevent = "UPDATE calendar SET startdate=?, title=?, destination=?, eventtime=?, destinationpc=?, meetingpoint=?, meetingtime=?, meetingpc=?, username=? WHERE id=?";
        
        //execute query and variables
$pdo->prepare($updateevent)->execute([$startdate, $showedittitle, $showeditdestination, $eventtime, $showeditdestinationpc, $showeditmeetingpoint, $meetingtime, $showeditmeetingpc, $username, $showeditid]);
    
    $updateevent = null;

echo <<<_END
<script>
  window.location.href = "calendar.php";
</script>
_END;

       
}
?>