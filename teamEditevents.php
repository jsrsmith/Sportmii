<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="teamEditevents.css" rel="stylesheet" type="text/css"/>
        
        <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
    <!--link to call jquery file to cancel editing an event-->
    <script
    src='teamCanceleditevent.js'>
    </script>
        
    <!--link to call jquery file to bring up editevents2-->
    <script
    src='teamNavigatetoeditevents2.js'>
    </script>
        
    
<?php
if(isset($_SESSION['teamID']))
{
    
    $teamID = $_SESSION['teamID'];
    
    $eventtoedit = $pdo->prepare('SELECT title FROM calendar WHERE username=?'); 

//execute query with variables
$eventtoedit->execute([$teamID]);
    
    
    if ($eventtoedit->rowCount() == 0)
    {
echo <<<_END
<div id=teamNoeventstoedit>
<p>you have no events available. click on a date to add an event.</p>
</div>
        
           <div id=teamEditeventcancelbutton>
    <div id=teamCanceleditevent>
     <button type="button" class="canceledit">cancel</button>
    </div>
    </div>
_END;

   $eventtoedit = null;     
    }
    
    else 
        
    {
        
 $editableevents = $eventtoedit->fetchAll();
 
    print '<div id=teamEditeventsdropdown>';
    print '<select name="teamEditableventslist" id="teamEditableventslist">';
    foreach ($editableevents as $row) {
    print '<option value="'.$row['title'].'">'.$row['title'].'</option>';
    }
print '</select>';
        print '</div>';        

echo <<<_END

        <div id=teamEventstoedit>
    <p>select the event you wish to edit</p>
    </div>
    
    <form action="teamEditevents.php" method="post" id="teamEditeventsform">
    
  <div id=teamEditeventbuttons>
    <div id=teamCanceleditevent>
     <button type="button" class="canceledit">cancel</button>
    </div>
    <div id=teamSubmiteditevent>
    <input type="submit" name="teamEditeventsubmit" value="next" id="teamEditeventsubmit"/> 
     </div>
    </div>

   </form>
_END;

     // declaring dropdown variable 
    $titletoedit = $_POST['teamEditableventslist'];

  $eventtoedit = null;
}
    }
   

?>
     </head>
    
    <body>
        
    </body>
</html>