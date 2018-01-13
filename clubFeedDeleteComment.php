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

        
if (isset($_POST['commentIDDelete'], $_SESSION['teamID']))
    
    {

 $commentID = ($_POST['commentIDDelete']);
 $clubID   =   $_SESSION['clubID'];
 $clubIDNoCode   = substr($clubID, 3);
 


    // query to see if its your own comment from your own username
$findCommentUsername = $pdo->prepare('SELECT username FROM feedComments WHERE id =?');
       
//execute query and variables
$findCommentUsername->execute([$commentID]);
    
$commentUsername = $findCommentUsername->fetchColumn();
    
    
        
        
     if (($commentUsername == $clubID) || ($commentUsername === $username))     
 
{

echo <<<_END

<form action="feed.php" id="deleteCommentForm$commentID" method="post">

<input type="hidden" name="deleteCommentID" class="deleteCommentID$commentID" value="$commentID">

<input type="submit" name="deleteCommentSubmit" class="deleteCommentSubmit" value="x">

</form> 

_END;

}
?>

<script type="text/javascript">
$(document).ready(function()
{

 $('#deleteCommentForm<?php echo $commentID ?>').on('submit', function (e) {  
    e.preventDefault();

var feedIDDeleteComment = $(".deleteCommentID<?php echo $commentID ?>").val();
 

     $.ajax({
      url: "clubFeedDeleteComment2.php",
      cache: false,
        type: "POST",
         data: {feedIDDeleteComment: feedIDDeleteComment},
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