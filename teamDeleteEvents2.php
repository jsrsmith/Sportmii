<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'header.php';


// if 'editsubmit' is pressed submit all info to mysql database
if (isset($_SESSION['teamID'], $_POST['teamDeleteEventSubmit']))
{       
    
    $teamID = $_SESSION['teamID'];
    
    
         // declaring dropdown variable 
        $titleToDelete = $_POST['teamDeletablEventsList'];

        $deleteEvent = $pdo->prepare("DELETE FROM calendar WHERE title=? and username=?");

//execute query and variables
$deleteEvent->execute([$titleToDelete, $teamID]);  
         
$deleteEvent = null;

echo <<<_END
<script>
  window.location.href = "teamCalendar.php";
</script>
_END;

       
}
?>