<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="teamDeleteevents.css" rel="stylesheet" type="text/css"/>
        
        <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
    <!--link to call jquery file to cancel editing an event-->
    <script
    src='teamCancelDeleteEvent.js'>
    </script>
        
    
<?php
if(isset($_SESSION['teamID']))
{
    $teamID = $_SESSION['teamID'];
    
    $eventToDelete = $pdo->prepare('SELECT title FROM calendar WHERE username=?'); 

//execute query with variables
$eventToDelete->execute([$teamID]);
    
    
    if ($eventToDelete->rowCount() == 0)
    {
echo <<<_END
<div id=teamNoEventsToDelete>
<p>you have no events available. click on a date to add an event.</p>
</div>
        
           <div id=teamDeleteEventCancelButton>
    <div id=teamCancelDeleteEvent>
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

  <form action="teamDeleteEvents2.php" method="post" id="teamDeleteEventsForm">

_END;

 
    print '<div id=teamDeleteEventsDropdown>';
    print '<select name="teamDeletablEventsList" id="teamDeletablEventsList">';
    foreach ($deletableEvents as $row) {
    print '<option value="'.$row['title'].'">'.$row['title'].'</option>';
    }
print '</select>';
        print '</div>';        

echo <<<_END

        <div id=teamEventsToDelete>
    <p>select the event you wish to delete</p>
    </div>
    
    
  <div id=teamDeleteEventButtons>
    <div id=teamCancelDeleteEvent>
     <button type="button" class="cancelDelete">cancel</button>
    </div>
    <div id=teamSubmitDeleteEvent>
    <input type="submit" name="teamDeleteEventSubmit" value="delete event" id="teamDeleteEventSubmit"/> 
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