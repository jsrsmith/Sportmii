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
        
if (isset($_POST['feedIDDeleteComment']))
    
    {

 $commentID        = ($_POST['feedIDDeleteComment']);


$deleteShoutComment = $pdo->prepare("DELETE FROM feedComments WHERE id=?");

//execute query and variables
$deleteShoutComment->execute([$commentID]);


}

?>
        
    </body>
</html>
