<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="feed.css" rel="stylesheet" type="text/css"/>
        
          <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

        
    </head>
    
    <body>
     
<?php
     
if (isset($_POST['feedIDUnlike']))
    
    {

 $feedID = ($_POST['feedIDUnlike']);
    
    
$deleteLike = $pdo->prepare("DELETE FROM feedLikes WHERE feedID=? and username=?");

//execute query and variables
$deleteLike->execute([$feedID, $username]);  
}
        
if (isset($_POST['feedIDLike']))
    
    {

 $feedID = ($_POST['feedIDLike']);
    
    
$addLike = $pdo->prepare('INSERT INTO feedLikes (feedID, username, name) VALUES(?, ?, ?)');

//execute query and variables
$addLike->execute([$feedID, $username, $username]);  
}

           
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
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

<form action="feedLikes.php" id="unlikePostForm$feedID" method="post" onsubmit="return false">

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
      url: "feedLikes.php",
      cache: false,
        type: "POST",
         data: {feedIDUnlike: feedIDUnlike},
         dataType: "html",
      success: function(html){
    $(".likesAjax[data-id='"+ feedIDUnlike +"']").load('feed.php');
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

 <form action="feedLikes.php" id="likePostForm$feedID" method="post" onsubmit="return false">
 
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
      url: "feedLikes.php",
      cache: false,
        type: "POST",
         data: {feedIDLike: feedIDLike},
         dataType: "html",
      success: function(html){
    $(".likesAjax[data-id='"+ feedIDLike +"']").load('feed.php');
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

