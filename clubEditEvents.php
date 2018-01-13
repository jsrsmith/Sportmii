<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="clubEditevents.css" rel="stylesheet" type="text/css"/>
        
        <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
    <!--link to call jquery file to cancel editing an event-->
    <script
    src='clubCanceleditevent.js'>
    </script>
        
    <!--link to call jquery file to bring up editevents2-->
    <script
    src='clubNavigatetoeditevents2.js'>
    </script>
        
    
<?php
if(isset($_SESSION['clubID']))
{
    
    $clubID = $_SESSION['clubID'];
    
    $eventtoedit = $pdo->prepare('SELECT title FROM calendar WHERE username=?'); 

//execute query with variables
$eventtoedit->execute([$clubID]);
    
    
    if ($eventtoedit->rowCount() == 0)
    {
echo <<<_END
<div id=clubNoeventstoedit>
<p>you have no events available. click on a date to add an event.</p>
</div>
        
           <div id=clubEditeventcancelbutton>
    <div id=clubCanceleditevent>
     <button type="button" class="canceledit">cancel</button>
    </div>
    </div>
_END;

   $eventtoedit = null;     
    }
    
    else 
        
    {
        
 $editableevents = $eventtoedit->fetchAll();
 
    print '<div id=clubEditeventsdropdown>';
    print '<select name="clubEditableventslist" id="clubEditableventslist">';
    foreach ($editableevents as $row) {
    print '<option value="'.$row['title'].'">'.$row['title'].'</option>';
    }
print '</select>';
        print '</div>';        

echo <<<_END

        <div id=clubEventstoedit>
    <p>select the event you wish to edit</p>
    </div>
    
    <form action="clubEditevents.php" method="post" id="clubEditeventsform">
    
  <div id=clubEditeventbuttons>
    <div id=clubCanceleditevent>
     <button type="button" class="canceledit">cancel</button>
    </div>
    <div id=clubSubmiteditevent>
    <input type="submit" name="clubEditeventsubmit" value="next" id="clubEditeventsubmit"/> 
     </div>
    </div>

   </form>
_END;

     // declaring dropdown variable 
    $titletoedit = $_POST['clubEditableventslist'];

  $eventtoedit = null;
}
    }
   

?>
     </head>
    
    <body>
        
    </body>
</html>