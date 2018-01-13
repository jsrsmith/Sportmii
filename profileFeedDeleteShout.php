<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="profileFeed.css" rel="stylesheet" type="text/css"/>
        
          <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

        
    </head>
    
    <body>
        
<?php
    
        
if (isset($_POST['feedIDDelete']))
    
    {


 $feedID = ($_POST['feedIDDelete']);
 
    $findShoutUsername = $pdo->prepare('SELECT name FROM feed WHERE id =?');
       
//execute query and variables
$findShoutUsername->execute([$feedID]);
    
$shoutUsername = $findShoutUsername->fetchColumn(); 


 if
     ($shoutUsername === $username)   
 
{

echo <<<_END

<form action="feed.php" id="deleteShoutForm$feedID" method="post">

<input type="hidden" name="deleteShoutID" class="deleteShoutID$feedID" value="$feedID">

<input type="submit" name="deleteShoutSubmit" class="deleteShoutSubmit" value="x">

</form>   

_END;

}

?>

<script type="text/javascript">
$(document).ready(function()
{

 $('#deleteShoutForm<?php echo $feedID ?>').on('submit', function (e) {  
    e.preventDefault();

var feedIDDeleteShout = $(".deleteShoutID<?php echo $feedID ?>").val();
 

     $.ajax({
      url: "feedDeleteShout2.php",
      cache: false,
        type: "POST",
         data: {feedIDDeleteShout: feedIDDeleteShout},
         dataType: "html",
      success: function(html){
location.reload();
      
      }
    });
    });
});

</script>    

<?php

}

?>
        
    </body>
</html>

