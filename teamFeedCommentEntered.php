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
        
if (isset($_POST['feedIDAddComment'], $_POST['feedCommentText'], $_SESSION['teamID']))
    
    {

 $feedID        = ($_POST['feedIDAddComment']);
 $commentText   = ($_POST['feedCommentText']);
 $teamID        = ($_SESSION['teamID']);
    
    
    
//Code for finding team name from teamID  
$findTeamName = $pdo->prepare('SELECT teamName FROM teams WHERE id=?'); 

//execute query with variables
$findTeamName->execute([$teamID]);

              
($teamName = $findTeamName->fetchcolumn());  
    
    
    
    
    
//code to add comment
$addComment = $pdo->prepare('INSERT INTO feedComments (feedID, username, name, text) VALUES(?, ?, ?, ?)');

//execute query and variables
$addComment->execute([$feedID, $teamID, $teamName, $commentText]);



}

?>
        
    </body>
</html>

