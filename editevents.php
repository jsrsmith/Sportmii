<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="editevents.css" rel="stylesheet" type="text/css"/>
        
        <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
    <!--link to call jquery file to cancel editing an event-->
    <script
    src='canceleditevent.js'>
    </script>
        
    <!--link to call jquery file to bring up editevents2-->
    <script
    src='navigatetoeditevents2.js'>
    </script>
        
    
<?php
if(isset($_SESSION['username']))
{
    
    $eventtoedit = $pdo->prepare('SELECT title FROM calendar WHERE username=?'); 

//execute query with variables
$eventtoedit->execute([$username]);
    
    
    if ($eventtoedit->rowCount() == 0)
    {
echo <<<_END
<div id=noeventstoedit>
<p>you have no events available. click on a date to add an event.</p>
</div>
        
           <div id=editeventcancelbutton>
    <div id=canceleditevent>
     <button type="button" class="canceledit">cancel</button>
    </div>
    </div>
_END;

   $eventtoedit = null;     
    }
    
    else 
        
    {
        
 $editableevents = $eventtoedit->fetchAll();
 
    print '<div id=editeventsdropdown>';
    print '<select name="editableventslist" id="editableventslist">';
    foreach ($editableevents as $row) {
    print '<option value="'.$row['title'].'">'.$row['title'].'</option>';
    }
print '</select>';
        print '</div>';        

echo <<<_END

        <div id=eventstoedit>
    <p>select the event you wish to edit</p>
    </div>
    
    <form action="editevents.php" method="post" id="editeventsform">
    
  <div id=editeventbuttons>
    <div id=canceleditevent>
     <button type="button" class="canceledit">cancel</button>
    </div>
    <div id=submiteditevent>
    <input type="submit" name="editeventsubmit" value="next" id="editeventsubmit"/> 
     </div>
    </div>

   </form>
_END;

     // declaring dropdown variable 
    $titletoedit = $_POST['editableventslist'];

  $eventtoedit = null;
}
    }
   

?>
     </head>
    
    <body>
        
    </body>
</html>