<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="profileScouting.css" rel="stylesheet" type="text/css"/>
        
          <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
    <!--link to call jquery file to bring up positions popup-->
    <script
    src='profileScoutingPopup.js'>
    </script>     
        
    <!--link to call jquery file to cancel editing positions-->
    <script
    src='profileCancelProfileScoutingPopup.js'>
    </script> 
        
    </head>
    
    <body>

<?php
        
if (isset($_POST['scoutingList']))
{ 
    $unknownProfileTeam = ($_POST['scoutingList']);
  
 //see if list choice is a username, if not navigate to teams
$isUnknownAUsername = $pdo->prepare('SELECT username FROM members WHERE username=?'); 

//execute query with variables
$isUnknownAUsername->execute([$unknownProfileTeam]);   
        
    if ($isUnknownAUsername->rowCount() == 0)
    {
        
        if (substr($unknownProfileTeam, 0, 3) === "CL-")    
        {
            
        $_SESSION['clubID']   =   $unknownProfileTeam;

echo <<<_END
<script>
  window.location.href = "viewClub.php";
</script>
_END;
         
 } 
      
        else
        {
            
        $_SESSION['teamID']   =  $unknownProfileTeam;

echo <<<_END
<script>
  window.location.href = "viewTeam.php";
</script>
_END;

    } 
 }
    
    else
        {
        $_SESSION['userProfile']     =     $unknownProfileTeam;

echo <<<_END
<script>
  window.location.href = "viewProfile.php";
</script>
_END;

   }     
}
        
        

if (isset($_POST['scoutedList']))
{ 
    $unknownProfileTeam = ($_POST['scoutedList']);
  
 //see if list choice is a username, if not navigate to teams
$isUnknownAUsername = $pdo->prepare('SELECT username FROM members WHERE username=?'); 

//execute query with variables
$isUnknownAUsername->execute([$unknownProfileTeam]);   
        
    if ($isUnknownAUsername->rowCount() == 0)
    {
        
        if (substr($unknownProfileTeam, 0, 3) === "CL-")    
        {
            
        $_SESSION['clubID']   =   $unknownProfileTeam;

echo <<<_END
<script>
  window.location.href = "viewClub.php";
</script>
_END;
         
 } 
      
        else
        {
            
        $_SESSION['teamID']   =  $unknownProfileTeam;

echo <<<_END
<script>
  window.location.href = "viewTeam.php";
</script>
_END;

    } 
 }
    
    else
        {
        $_SESSION['userProfile']     =     $unknownProfileTeam;

echo <<<_END
<script>
  window.location.href = "viewProfile.php";
</script>
_END;

   }     
}
        
        
        

//see how many people user is scouting
$scoutingNumber = $pdo->prepare('SELECT scoutedUsername FROM scout WHERE scoutedUsername=?'); 

//execute query with variables
$scoutingNumber->execute([$username]);
    
$scoutingCount = $scoutingNumber->rowCount();
    


//see how many people the user is being scouted by
$scoutedNumber = $pdo->prepare('SELECT scoutingUsername FROM scout WHERE scoutingUsername=?'); 

//execute query with variables
$scoutedNumber->execute([$username]);
    
$scoutedCount = $scoutedNumber->rowCount();




echo <<<_END

<div class=profileScoutingBoth>

<div class=profileScouting>
    <p>scouting</p>
    </div>
    
<div class=profileScoutingcount>
    <p>$scoutingCount</p>
    </div>

    
</div>

<div class=profileScoutedBoth>
    
<div class=profileScouted>
    <p>scouted</p>
    </div>
    
<div class=profileScoutedcount>
    <p>$scoutedCount</p>
    </div>
    
</div>

_END;

        
        

//user is scouting popup

echo <<<_END

<div class=profileScoutingPopup>
    
    <div class=profileScoutingPopupTitle>
    <p>scouting</p>
    </div>
    
    <div class=profileScoutingBoxWithScroll>

_END;

print '<div class=profileScoutingList>';
print '<form action="profileScouting.php" id="profileScoutingForm" method="post">';
        
        
//list of usernames the user is scouting
$scoutingList = $pdo->prepare('SELECT * FROM scout WHERE scoutedUsername=? ORDER BY scoutingName ASC'); 

//execute query with variables
$scoutingList->execute([$username]);
        
//get the results
while($row = $scoutingList->fetch(PDO::FETCH_ASSOC)){ 

$FORscoutingID[]        = $row['id'];
$FORscoutingUsername[]  = $row['scoutingUsername'];
$FORscoutingName[]      = $row["scoutingName"];
$FORscoutedUsername[]   = $row['scoutedUsername'];
$FORscoutedName[]       = $row["scoutedName"]; 
}


$FORscoutingCount = count($FORscoutingID);
        

for($FORscouting=0; $FORscouting < $FORscoutingCount; $FORscouting++) { 
        

print '<div class=profileScoutingList>

<button class="profileScoutingUsernameButton" type="submit" name="scoutingList" value="'. $FORscoutingUsername[$FORscouting] .'">

<p class="profileScoutingName">'. $FORscoutingName[$FORscouting] .'</p>

<br />

<p class="profileScoutingUsername">'. $FORscoutingUsername[$FORscouting] .'</p>

</button>

    
   
</div>';    
    }
    
print '</form>';  

echo <<<_END

                </div>
                </div>
       
       <div class=profileScoutingButtons>
       <button type="button" class="profileCancelScouting" >cancel</button>
       </div>

    </div>

_END;






//scouted by popup    

echo <<<_END

<div class=profileScoutedPopup>
    
    <div class=profileScoutedPopupTitle>
    <p>scouted</p>
    </div>
    
    <div class=profileScoutedBoxWithScroll>

_END;

print '<div class=profileScoutedList>';
print '<form action="profileScouting.php" id="profileScoutedForm" method="post">';
        
        
//list of usernames the user is being scouted by
$scoutedList = $pdo->prepare('SELECT * FROM scout WHERE scoutingUsername=? ORDER BY scoutedName ASC'); 

//execute query with variables
$scoutedList->execute([$username]);
        
//get the results
while($row = $scoutedList->fetch(PDO::FETCH_ASSOC)){ 

$BYscoutedID[]        = $row['id'];
$BYscoutingUsername[]  = $row['scoutingUsername'];
$BYscoutingName[]      = $row["scoutingName"];
$BYscoutedUsername[]   = $row['scoutedUsername'];
$BYscoutedName[]       = $row["scoutedName"]; 
}


$BYscoutedCount = count($BYscoutedID);
        

for($BYscouted=0; $BYscouted < $BYscoutedCount; $BYscouted++) { 
        

print '<div class=profileScoutedList>

<button class="profileScoutedUsernameButton" type="submit" name="scoutedList" value="'. $BYscoutedUsername[$BYscouted] .'">

<p class="profileScoutedName">'. $BYscoutedName[$BYscouted] .'</p>

<br />

<p class="profileScoutedUsername">'. $BYscoutedUsername[$BYscouted] .'</p>

</button>

    
   
</div>';    
    }
    
print '</form>';  

echo <<<_END

                </div>
                </div>
       
       <div class=profileScoutedButtons>
       <button type="button" class="profileCancelScouted" >cancel</button>
       </div>

    </div>

_END;


?>

    </body>
</html>

