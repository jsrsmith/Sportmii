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
    
        
if (isset($_POST['feedIDDelete'], $_SESSION['teamID']))
    
    {

 $feedID = ($_POST['feedIDDelete']);
 $teamID   =   $_SESSION['teamID'];
 
    // query to see if user is in control
  $isUserInControl = $pdo->prepare("SELECT username FROM teamControl WHERE teamID=? and username=?"); 

  $isUserInControl->execute([$teamID, $username]);


// query to see if user is in control
  $didUserSetupTeam = $pdo->prepare("SELECT username FROM teams WHERE id=? and username=?"); 

  $didUserSetupTeam->execute([$teamID, $username]);
        
        
     if (($isUserInControl->rowCount() > 0) || ($didUserSetupTeam->rowCount() > 0))   
  
 
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
      url: "teamFeedDeleteShout2.php",
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

