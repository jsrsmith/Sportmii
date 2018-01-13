<?php
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

?>
        
    </body>
</html>

