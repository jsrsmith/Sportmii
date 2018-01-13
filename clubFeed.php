<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'header.php';
?>

<html>

    <head>

        
        
<link href="profileFeed.css" rel="stylesheet" type="text/css"/>

     
      <!--link to call jquery file to send feedID via ajax for likes-->
    <script
    src='clubFeedLikesAjax.js'>
    </script>
        
     <!--link to call jquery file to send feedID via ajax for comments-->
    <script
    src='clubFeedCommentsAjax.js'>
    </script>
        
    <!--link to call jquery file to send feedID via ajax for deleting shout-->
    <script
    src='clubFeedDeleteAjax.js'>
    </script>
        
        
   </head>
   
   <body>
       
<?php

//if football edit is pressed
 if (isset ($_POST['feedUpdateShoutSubmit'], $_SESSION['clubID']))
     
 {
     
         $shout  = ($_POST['feedUpdateShout']);
         $clubID = ($_SESSION['clubID']);
         $clubIDNoCode   = substr($clubID, 3);
     
     
//Code for finding club name from clubID  
$findClubName = $pdo->prepare('SELECT clubName FROM clubs WHERE id=?'); 

//execute query with variables
$findClubName->execute([$clubIDNoCode]);

              
($clubName = $findClubName->fetchcolumn());  

        
        if ($shout == "")
            {  

echo <<<_END
<script>
  window.location.href = "club.php";
</script>
_END;

        } 
        
   
      else
     {

    
    $addShout = $pdo->prepare('INSERT INTO feed (username, name, text) VALUES(?, ?, ?)');

//execute query and variables
$addShout->execute([$clubID, $clubName, $shout]);  



echo <<<_END
<script>
  window.location.href = "club.php";
</script>
_END;

 }
 }
       
       
       
//if football edit is pressed
 if (isset ($_SESSION['clubID']))
     
 {
     

         $clubID = ($_SESSION['clubID']);
         $clubIDNoCode   = substr($clubID, 3);
     
     
//Code for finding club name from teamID  
$findClubName = $pdo->prepare('SELECT clubName FROM clubs WHERE id=?'); 

//execute query with variables
$findClubName->execute([$clubIDNoCode]);

              
($clubName = $findClubName->fetchcolumn()); 

echo <<<_END

<div class=feedCentrePage>

 <form action="clubFeed.php" id="updateShoutForm" method="post">
 
<div class=feedAddShoutTextBox>
<textarea name="feedUpdateShout" class="feedUpdateShout" maxlength="5000" placeholder="add a shout from $clubName..."></textarea>
</div>

<button type='submit' name='feedUpdateShoutSubmit' class='feedUpdateShoutSubmit' value='shout'>shout</button>

</form>

_END;


date_default_timezone_set('Europe/London');

print'<div class=feedAllShouts>';

       
$findShouts = $pdo->prepare('SELECT * FROM feed WHERE name =?  ORDER BY timestamp DESC');
       
//execute query and variables
$findShouts->execute([$clubName]);
   

if ($findShouts->rowCount() > 0)
    {    
    
//get the shouts for each scout
while($row = $findShouts->fetch(PDO::FETCH_ASSOC)){ 

$shoutID[]              = $row['id'];
$shoutUsername[]        = $row["username"];
$shoutName[]            = $row["name"];
$shoutText[]            = $row["text"]; 
$shoutTimestamp[]       = $row["timestamp"];  
} 


$shoutCount = count($shoutUsername); 
        
    
for($indexShout=0; $indexShout < $shoutCount; $indexShout++) {        
  
       
print'
<div class=feedNewShout>';

if (file_exists("profileCover/clubProfilepics/$shoutUsername[$indexShout].jpeg"))
      {
print'
  <div class=shoutProfilepic>
<img src="profileCover/clubProfilepics/'. $shoutUsername[$indexShout] .'.jpeg" width="75" height="75">
  </div>';
      }
    else
    {
  print'
  <div class=shoutProfilepic>
<img src=images/sportmii%20logo%20whitesmoke.png alt="sportmii"
         title="sportmii" width="65" height="75">
  </div>';      
    }

print'

<div class=shoutInformation>

<div class=shoutName>
<p>'. $shoutName[$indexShout] .'</p>
</div>

<div class=shoutTimestamp>
<p>'. timeElapsed("$shoutTimestamp[$indexShout]", 2) .'</p>
</div>

<div class=shoutText>
<p>'. $shoutText[$indexShout] .'</p>
</div>

<input type="hidden" name="feedID" class="feedID" value="'. $shoutID[$indexShout] .'">


<div class=likesAndComments>


<div class=likesAjax data-id="'.$shoutID[$indexShout] .'">
</div>

<div class=commentsAjax data-id="'.$shoutID[$indexShout] .'">
</div>

<div class=deleteShoutAjax data-id="'.$shoutID[$indexShout] .'">
</div>

</div>
</div>
</div>';

}
unset($shoutID);
unset($shoutUsername);
unset($shoutName);
unset($shoutText);
unset($shoutTimestamp);
}

       

    

//end divs - first is for feedAllShouts shouts, second is for centre everything at beggining of page.
print '</div>
</div>';
    
 }
?>
   </body>
    
</html>