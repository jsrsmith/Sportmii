<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="profileFeed.css" rel="stylesheet" type="text/css"/>
        
          <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
    <!--link to call jquery file to send feedID via ajax for deleteing shouts-->
    <script
    src='clubFeedDeleteShoutCommentAjax.js'>
    </script>

        
    </head>
    
    <body>
        
<?php
        
if (isset($_POST['feedIDComments']))
    
    {

 $feedID = ($_POST['feedIDComments']);

$commentsNumber = $pdo->prepare('SELECT count(*) FROM feedComments WHERE feedID =?');
       
//execute query and variables
$commentsNumber->execute([$feedID]);
    
$commentsNumber = $commentsNumber->fetchColumn();

echo <<<_END
<div class=numberOfComments$feedID>
<div class=numberOfComments>
<p>$commentsNumber comments</p>
</div>
</div>
_END;

    
    
    
$findComments = $pdo->prepare('SELECT * FROM feedComments WHERE feedID =? ORDER BY timestamp ASC');
       
//execute query and variables
$findComments->execute([$feedID]);

    {
    
//get the comments
while($row = $findComments->fetch(PDO::FETCH_ASSOC)){ 

$commentsID[]           = $row['id'];
$commentFeedID[]        = $row['feedID'];
$commentUsername[]      = $row["username"];
$commentName[]          = $row["name"];
$commentText[]          = $row["text"];
$commentTimestamp[]     = $row["timestamp"];  
}


$commentCount = count($commentsID);
    
date_default_timezone_set('Europe/London');

echo <<<_END
<div class=commentsDropdown$feedID>
<div class=commentsDropdown>
_END;

for($indexComment=0; $indexComment < $commentCount; $indexComment++) { 

print'
<div class=allDifferentComments>
<div class=commentInformation>

<div class=deleteShoutCommentAjax data-id="'.$commentsID[$indexComment] .'">
</div>

<div class=commentName>
<p>'. $commentName[$indexComment] .'</p>
</div>

<div class=commentTimestamp>
<p>'. timeElapsed("$commentTimestamp[$indexComment]", 2) .'</p>
</div>

<div class=commentText>
<p>'. $commentText[$indexComment] .'</p>
</div>

</div>
</div>
';   
    
}
unset($commentsID);
unset($commentFeedID);
unset($commentUsername);
unset($commentText);
unset($commentTimestamp);
}

echo <<<_END

</div>
</div>

<form action="feedComments.php" id="clubCommentOnPostForm$feedID" method="post">

<textarea name="feedAddComment$feedID" class="feedAddComment" maxlength="5000" placeholder="hey $firstname, add a comment here"></textarea>

<input type="hidden" name="feedIDComment" class="feedIDComment$feedID" value="$feedID">

<button type="submit" name="commentOnPost" class="commentOnPost" value="add">add</button>

</form>

_END;

    
?>
    
<script type="text/javascript">
$(document).ready(function(){
    
$(".commentsDropdown<?php echo $feedID ?>").hide();
    
var count = 1;
$(".numberOfComments<?php echo $feedID ?>").click(function() {
    count++;
    //even odd click detect 
    var isEven = function(someNumber) {
        return (someNumber % 2 === 0) ? true : false;
    };
    
  // on odd clicks do this
    if (isEven(count) === false) {
        $(".commentsDropdown<?php echo $feedID ?>").hide();
    }
    
// on even clicks do this
    else if (isEven(count) === true) {
        $(".commentsDropdown<?php echo $feedID ?>").show();
    }

});
});

</script> 
        
<script type="text/javascript">
$(document).ready(function()
{

 $('#clubCommentOnPostForm<?php echo $feedID ?>').on('submit', function (e) {  
    e.preventDefault();

var feedIDAddComment = $(".feedIDComment<?php echo $feedID ?>").val();
var feedCommentText   = $("textarea[name=feedAddComment<?php echo $feedID ?>]").val();
 

     $.ajax({
      url: "clubFeedCommentsEntered.php",
      cache: false,
        type: "POST",
         data: {feedIDAddComment: feedIDAddComment, feedCommentText:feedCommentText},
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

