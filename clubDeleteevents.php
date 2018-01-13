<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="clubDeleteevents.css" rel="stylesheet" type="text/css"/>
        
        <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
    <!--link to call jquery file to cancel editing an event-->
    <script
    src='clubCancelDeleteEvent.js'>
    </script>
        
    
<?php
if(isset($_SESSION['clubID']))
{
    $clubID = $_SESSION['clubID'];
    
    $eventToDelete = $pdo->prepare('SELECT title FROM calendar WHERE username=?'); 

//execute query with variables
$eventToDelete->execute([$clubID]);
    
    
    if ($eventToDelete->rowCount() == 0)
    {
echo <<<_END
<div id=clubNoEventsToDelete>
<p>you have no events available. click on a date to add an event.</p>
</div>
        
           <div id=clubDeleteEventCancelButton>
    <div id=clubCancelDeleteEvent>
     <button type="button" class="cancelDelete">cancel</button>
    </div>
    </div>
_END;

   $eventToDelete = null;     
    }
    
    else 
        
    {
        
 $deletableEvents = $eventToDelete->fetchAll();

echo <<<_END

  <form action="clubDeleteEvents2.php" method="post" id="teamDeleteEventsForm">

_END;

 
    print '<div id=clubDeleteEventsDropdown>';
    print '<select name="clubDeletablEventsList" id="clubDeletablEventsList">';
    foreach ($deletableEvents as $row) {
    print '<option value="'.$row['title'].'">'.$row['title'].'</option>';
    }
print '</select>';
        print '</div>';        

echo <<<_END

        <div id=clubEventsToDelete>
    <p>select the event you wish to delete</p>
    </div>
    
    
  <div id=clubDeleteEventButtons>
    <div id=clubCancelDeleteEvent>
     <button type="button" class="cancelDelete">cancel</button>
    </div>
    <div id=clubSubmitDeleteEvent>
    <input type="submit" name="clubDeleteEventSubmit" value="delete event" id="clubDeleteEventSubmit"/> 
     </div>
    </div>

   </form>
_END;

  $eventToDelete = null;
}
    }
   

?>
     </head>
    
    <body>
        
    </body>
</html>