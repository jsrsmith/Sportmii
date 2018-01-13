<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="clubDetails.css" rel="stylesheet" type="text/css"/>
        
          <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
    <!--link to call jquery file to bring up team details change-->
    <script
    src='clubDetailsPopup.js'>
    </script>    

        
    <!--link to call jquery file to cancel editing team details--> 
    <script
    src='cancelClubDetailsPopup.js'>
    </script>
        
    <!--link to call jquery file to stop name being empty--> 
    <script
    src='saveClubDetailsSubmitButton.js'>
    </script>
        
    </head>
    
    <body>
        
<?php
        
//if football edit is pressed
 if (isset ($_POST['saveClubDetails']))
    
 {
  
    
         $clubID        = $_SESSION['clubID'];
         $clubIDNoCode  = substr($clubID, 3);
    $clubNameNoCode     = $_POST['editClubDetailsClubNameText'];
         $stadium       = $_POST['editClubDetailsStadiumText'];
         $sponsor       = $_POST['editClubDetailsSponsorText'];
         $founded       = $_POST['editClubDetailsFoundedText'];
         $clubName      = "CLUB-$clubNameNoCode";
     
        //find previous team name from database
$findPreviousClubName = $pdo->prepare('SELECT clubName FROM clubs WHERE id=?'); 

//execute query with variables
$findPreviousClubName->execute([$clubIDNoCode]);
     
 ($previousClubName = $findPreviousClubName->fetchcolumn());    
     
     
     
        //update club details in teams table
        $updateClubs = "UPDATE clubs SET clubName=?, stadium=?, sponsor=?, founded=? WHERE id=?";
        
        //execute query and variables
        $pdo->prepare($updateClubs)->execute([$clubName, $stadium, $sponsor, $founded, $clubIDNoCode]);
     
     
        //update club name in scouting
        $updateScouting = "UPDATE scout SET scouting=? WHERE scouting=?";
        
        //execute query and variables
        $pdo->prepare($updateScouting)->execute([$clubName, $previousClubName]);
     
        
        //update club name in scouted
        $updateScouted = "UPDATE scout SET scouted=? WHERE scouted=?";
        
        //execute query and variables
        $pdo->prepare($updateScouted)->execute([$clubName, $previousClubName]);
     
     
       //update club name in clubControl
        $updateClubControl = "UPDATE clubControl SET clubName=? WHERE clubID=?";
        
        //execute query and variables
        $pdo->prepare($updateClubControl)->execute([$clubName, $clubID]);
    
     
     

echo <<<_END
<script>
  window.location.href = "club.php";
</script>
_END;

 }
     
             
 if (isset($_SESSION['clubID']))
    
 {        
        
$clubID        = $_SESSION['clubID'];
$clubIDNoCode   = substr($clubID, 3);

//find club name from database
$findClubName = $pdo->prepare('SELECT clubName FROM clubs WHERE id=?'); 

//execute query with variables
$findClubName->execute([$clubIDNoCode]);
        
if ($findClubName->rowCount() == 0)
            {
    
                $clubName =  "";
}
        else   
        {
($clubNameNoCode = $findClubName->fetchcolumn());
$clubName = substr($clubNameNoCode, 5);
        }
        
        
//find stadium from database
$findStadium = $pdo->prepare('SELECT stadium FROM clubs WHERE id=?'); 

//execute query with variables
$findStadium->execute([$clubIDNoCode]);
        
if ($findStadium->rowCount() == 0)
            {
    
                $stadium =  "";
}
        else   
        {
($stadium = $findStadium->fetchcolumn());        
        }
        

//find sponsor from database
$findSponsor = $pdo->prepare('SELECT sponsor FROM clubs WHERE id=?'); 

//execute query with variables
$findSponsor->execute([$clubIDNoCode]);
        
if ($findSponsor->rowCount() == 0)
            {
    
                $sponsor =  "";
}
        else   
        {
($sponsor = $findSponsor->fetchcolumn());        
        }
        
        
//find founded from database
$findFounded = $pdo->prepare('SELECT founded FROM clubs WHERE id=?'); 

//execute query with variables
$findFounded->execute([$clubIDNoCode]);
        
if ($findFounded->rowCount() == 0)
            {
    
                $founded =  "";
}
        else   
        {
($founded = $findFounded->fetchcolumn());        
        }
        
        


echo <<<_END

<div id=clubDetailsTitle>
<p>club details</p>
</div>

<div id=allClubDetails>

<div id=clubDetailsClubNameTitle>
<p>club name:</p>
</div>

<div id=clubDetailsClubName>
<p>$clubName</p>
</div>

<div id=clubDetailsStadiumTitle>
<p>stadium:</p>
</div>

<div id=clubDetailsStadium>
<p>$stadium</p>
</div>

<div id=clubDetailsSponsorTitle>
<p>sponsor:</p>
</div>

<div id=clubDetailsSponsor>
<p>$sponsor</p>
</div>

<div id=clubDetailsFoundedTitle>
<p>founded:</p>
</div>

<div id=clubDetailsFounded>
<p>$founded</p>
</div>

</div>

 <div id=clubDetailsPopup>
    
    <form action="clubDetails.php" id="clubDetailsForm" method="post">
    
    <div id=clubDetailsPopupTitle>
    <p>club details</p>
    </div>
    
     <div id=editClubDetailsClubName> 
        <p>club name*</p>   
        </div>
        
    <input type="text" name="editClubDetailsClubNameText" id="editClubDetailsClubNameText" value='$clubName'>
    
    <div id=editClubDetailsStadium> 
        <p>stadium</p>   
        </div>
        
    <input type="text" name="editClubDetailsStadiumText" id="editClubDetailsStadiumText" value='$stadium'>
    
    <div id=editClubDetailsSponsor> 
        <p>sponsor</p>   
        </div>
        
    <input type="text" name="editClubDetailsSponsorText" id="editClubDetailsSponsorText" value='$sponsor'>
    
    <div id=editClubDetailsFounded> 
        <p>founded</p>   
        </div>
        
    <input type="text" name="editClubDetailsFoundedText" id="editClubDetailsFoundedText" value='$founded'>
       
       <div id=editClubDetailsButtons>
       <input type='submit' name='saveClubDetails' value='Save'><button type="button" class="cancel">cancel</button>
       </div>
       
<div id="clubNameNotFilledIn">
<p>club name must be filled in.</p>
</div>
       
       
    </form>
    
    </div>

_END;
}
?>
        
    </body>
</html>

