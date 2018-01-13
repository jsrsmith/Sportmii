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

        
    </head>
    
    <body>
        
<?php
        
if (isset($_POST['feedIDDeleteShout']))
    
    {

 $feedID        = ($_POST['feedIDDeleteShout']);


$deleteShout = $pdo->prepare("DELETE FROM feed WHERE id=?");

//execute query and variables
$deleteShout->execute([$feedID]); 
     
 $deleteShoutComments = $pdo->prepare("DELETE FROM feedComments WHERE feedID=?");

//execute query and variables
$deleteShoutComments->execute([$feedID]); 
     
 $deleteShoutLikes = $pdo->prepare("DELETE FROM feedLikes WHERE feedID=?");

//execute query and variables
$deleteShoutLikes->execute([$feedID]); 



}

?>
        
    </body>
</html>