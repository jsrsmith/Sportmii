<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="deleteevents.css" rel="stylesheet" type="text/css"/>
        
        <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
    <!--link to call jquery file to cancel editing an event-->
    <script
    src='cancelDeleteEvent.js'>
    </script>
        
    
<?php
if(isset($_SESSION['username']))
{
    
    $eventToDelete = $pdo->prepare('SELECT title FROM calendar WHERE username=?'); 

//execute query with variables
$eventToDelete->execute([$username]);
    
    
    if ($eventToDelete->rowCount() == 0)
    {
echo <<<_END
<div id=noEventsToDelete>
<p>you have no events available. click on a date to add an event.</p>
</div>
        
           <div id=deleteEventCancelButton>
    <div id=cancelDeleteEvent>
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

  <form action="deleteEvents2.php" method="post" id="deleteEventsForm">

_END;

 
    print '<div id=deleteEventsDropdown>';
    print '<select name="deletablEventsList" id="deletablEventsList">';
    foreach ($deletableEvents as $row) {
    print '<option value="'.$row['title'].'">'.$row['title'].'</option>';
    }
print '</select>';
        print '</div>';        

echo <<<_END

        <div id=eventsToDelete>
    <p>select the event you wish to delete</p>
    </div>
    
    
  <div id=deleteEventButtons>
    <div id=cancelDeleteEvent>
     <button type="button" class="cancelDelete">cancel</button>
    </div>
    <div id=submitDeleteEvent>
    <input type="submit" name="deleteEventSubmit" value="delete event" id="deleteEventSubmit"/> 
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