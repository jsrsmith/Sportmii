<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'header.php';


// if 'editsubmit' is pressed submit all info to mysql database
if (isset($_SESSION['username'], $_POST['deleteEventSubmit']))
{       
         // declaring dropdown variable 
        $titleToDelete = $_POST['deletablEventsList'];

        $deleteEvent = $pdo->prepare("DELETE FROM calendar WHERE title=? and username=?");

//execute query and variables
$deleteEvent->execute([$titleToDelete, $username]);  
         
$deleteEvent = null;

echo <<<_END
<script>
  window.location.href = "calendar.php";
</script>
_END;

       
}
?>