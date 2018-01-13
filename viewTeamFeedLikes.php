<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="viewProfileFeed.css" rel="stylesheet" type="text/css"/>
        
          <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

        
    </head>
    
    <body>
        
<?php
        
if (isset($_POST['feedID']))
    
    {

 $feedID = ($_POST['feedID']);

  
$findHasUserLiked = $pdo->prepare('SELECT username FROM feedLikes WHERE feedID =? and username=?');
       
//execute query and variables
$findHasUserLiked->execute([$feedID, $username]);
    
if ($findHasUserLiked->rowCount() > 0)
    { 
    
$hasUserLiked = $findHasUserLiked->fetchColumn();
 
echo<<<_END

<form action="feedLikes.php" id="unlikePostForm$feedID" method="post">

<button type="submit" class="unLikeButton"></button>

<input type="hidden" name="feedIDForUnlike" class="feedIDForUnlike$feedID" value="$feedID">

</form>

_END;

?>
<script type="text/javascript">
$(document).ready(function()
{

 $('#unlikePostForm<?php echo $feedID ?>').on('submit', function (e) {  
    e.preventDefault();
 
var feedIDUnlike = $(".feedIDForUnlike<?php echo $feedID ?>").val();



     $.ajax({
      url: "feedLikesClicked.php",
      cache: false,
        type: "POST",
         data: {feedIDUnlike: feedIDUnlike},
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
    
 else
     
 {

echo<<<_END

 <form action="feedLikes.php" id="likePostForm$feedID" method="post">
 
<button type="submit" class="likeButton"></button>


<input type="hidden" name="feedIDForLike" class="feedIDForLike$feedID" value="$feedID">

</form>

_END;

?>
<script type="text/javascript">
$(document).ready(function()
{

 $('#likePostForm<?php echo $feedID ?>').on('submit', function (e) {  
    e.preventDefault();

var feedIDLike = $(".feedIDForLike<?php echo $feedID ?>").val();



     $.ajax({
      url: "feedLikesClicked.php",
      cache: false,
        type: "POST",
         data: {feedIDLike: feedIDLike},
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
    

 $likesNumber = $pdo->prepare('SELECT count(*) FROM feedLikes WHERE feedID =?');
       
//execute query and variables
$likesNumber->execute([$feedID]);
    
$numberOfLikes = $likesNumber->fetchColumn();

print'
<div class=numberOfLikes data-id="'.$feedID .'">
<p>'. $numberOfLikes .'</p>
</div>';
   
}

?>
        
    </body>
</html>

