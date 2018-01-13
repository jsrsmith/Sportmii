<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'defaultsetup.php';
?>

<html>

   <head>
       
        <!--link to CSS-->
        <link href="team.css" type="text/css"
              rel="stylesheet">

       
    <!--link to call jquery file to bring weekly calendar up-->
    <script
    src='teamSmallerDatepicker.js'>
    </script>
       
    <!--link to call jquery file to hover and change picture-->
    <script
    src='teamHoverProfileCoverPics.js'>
    </script> 
       
    <!--link to call jquery file to bring up changing picture-->
    <script
    src='teamProfileCoverPicsDialogbox.js'>
    </script> 
       
    <!--link to call jquery file to cancel profile pic-->
    <script
    src='teamCancelProfileCoverpics.js'>
    </script> 
       
    <!--link to call jquery file to open team details via ajax-->
    <script
    src='teamAllAjax.js'>
    </script>
       

    
           </head>
    
<body>     
 

<?php
      
         
    // if 'createNewTeam' is pressed submit all info to mysql database
if (isset($_POST['createNewTeamFootball']))
{ 

        
 //declare variables
 $teamSport                 = ($_POST['createTeamTeamSport']);
 $teamName                  = ($_POST['createTeamTeamName']);
 $addressLine1              = ($_POST['createTeamAddressLine1']);
 $addressLine2              = ($_POST['createTeamAddressLine2']);
 $addressLine3              = ($_POST['createTeamAddressLine3']);
 $postCode                  = ($_POST['createTeamPostCode']);
 $teamEmail                 = ($_POST['createTeamTeamEmail']);
 $teamWebsite               = ($_POST['createTeamTeamWebsite']);
 $managersFirstname         = ($_POST['createTeamManagersFirstname']);
 $managersSurname           = ($_POST['createTeamManagersSurname']);
 $managersContactNumber     = ($_POST['createTeamManagersContactNumber']);
 $managersEmail             = ($_POST['createTeamManagersEmail']);
        
        
        $teamEmail              = strtolower($teamEmail);
        $teamWebsite            = strtolower($teamWebsite);
        $managersFirstname      = strtolower($managersFirstname);
        $managersSurname      = strtolower($managersSurname);
        $managersEmail          = strtolower($managersEmail);       
        
        
        $createTeam = $pdo->prepare('INSERT INTO teams (teamSport, teamName, addressLine1, addressLine2, addressLine3, postCode, teamEmail, teamWebsite, managersFirstname, managersSurname, managersContactNumber, managersEmail, username) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        
        //execute query and variables
$createTeam->execute([$teamSport, $teamName, $addressLine1, $addressLine2, $addressLine3, $postCode, $teamEmail, $teamWebsite, $managersFirstname, $managersSurname, $managersContactNumber, $managersEmail, $username]);
        

  //find id from database
$findTeamID = $pdo->prepare('SELECT id FROM teams WHERE teamName=? and username=?'); 

//execute query with variables
$findTeamID->execute([$teamName, $username]);
         
($teamID = $findTeamID->fetchcolumn());
        
        
}
    
    else if (isset($_POST['teamProfileSubmit']))
{  
    
    $teamID   =  ($_POST['teamIDProfilePic']);
    
//ALL FOR PROFILE PICTURE
 
 if (isset($_FILES['teamProfilePic']['name']))
  {
     
    $saveto = "profileCover/teamProfilepics/".$teamID.".jpeg";
    move_uploaded_file($_FILES['teamProfilePic']['tmp_name'], $saveto);
    $typeok = TRUE;

    switch($_FILES['teamProfilePic']['type'])
    {
      case "image/gif":   $src = imagecreatefromgif($saveto); break;
      case "image/jpeg":  // Both regular and progressive jpegs
      case "image/pjpeg": $src = imagecreatefromjpeg($saveto); break;
      case "image/png":   $src = imagecreatefrompng($saveto); break;
      default:            $typeok = FALSE; break;
    }

    if ($typeok)
    {
      list($w, $h) = getimagesize($saveto);

      $max = 150;
      $tw  = $w;
      $th  = $h;

      if ($w > $h && $max < $w)
      {
        $th = $max / $w * $h;
        $tw = $max;
      }
      elseif ($h > $w && $max < $h)
      {
        $tw = $max / $h * $w;
        $th = $max;
      }
      elseif ($max < $w)
      {
        $tw = $th = $max;
      }

      $tmp = imagecreatetruecolor($tw, $th);
      imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h);
      imageconvolution($tmp, array(array(-1, -1, -1),
        array(-1, 16, -1), array(-1, -1, -1)), 8, 0);
      imagejpeg($tmp, $saveto);
      imagedestroy($tmp);
      imagedestroy($src);
    }
  } 
    }
    
else if (isset($_POST['teamCoverSubmit']))
{  
    
    $teamID   =  ($_POST['teamIDCoverPhoto']);
    
//ALL FOR COVER PHOTO
 
 if (isset($_FILES['teamCoverPhoto']['name']))
  {
    $savetoCover = "profileCover/teamCoverphotos/".$teamID.".jpeg";
    move_uploaded_file($_FILES['teamCoverPhoto']['tmp_name'], $savetoCover);
    $typeok = TRUE;

    switch($_FILES['teamCoverPhoto']['type'])
    {
      case "image/gif":   $src = imagecreatefromgif($savetoCover); break;
      case "image/jpeg":  // Both regular and progressive jpegs
      case "image/pjpeg": $src = imagecreatefromjpeg($savetoCover); break;
      case "image/png":   $src = imagecreatefrompng($savetoCover); break;
      default:            $typeok = FALSE; break;
    }

    if ($typeok)
    {
      list($w, $h) = getimagesize($savetoCover);

      $max = 850;
      $tw  = $w;
      $th  = $h;

      if ($w > $h && $max < $w)
      {
        $th = $max / $w * $h;
        $tw = $max;
      }
      elseif ($h > $w && $max < $h)
      {
        $tw = $max / $h * $w;
        $th = $max;
      }
      elseif ($max < $w)
      {
        $tw = $th = $max;
      }

      $tmp = imagecreatetruecolor($tw, $th);
      imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h);
      imageconvolution($tmp, array(array(-1, -1, -1),
        array(-1, 16, -1), array(-1, -1, -1)), 8, 0);
      imagejpeg($tmp, $savetoCover);
      imagedestroy($tmp);
      imagedestroy($src);
    }
  }
}
    
    
    else if (isset($_SESSION['teamID']))
    
    {
         $teamID   =   $_SESSION['teamID']; 
    
    
// query to see if user is in control
  $isUserInControl = $pdo->prepare("SELECT username FROM teamControl WHERE teamID=? and username=?"); 

  $isUserInControl->execute([$teamID, $username]);
    
    if ($isUserInControl->rowCount() == 0)
        
    { 

// query to see if user is in control
  $didUserSetupTeam = $pdo->prepare("SELECT username FROM teams WHERE id=? and username=?"); 

  $didUserSetupTeam->execute([$teamID, $username]);
    
    if ($didUserSetupTeam->rowCount() == 0)

       {
 
echo <<<_END
<script>
  window.location.href = "viewTeam.php";
</script>
_END;
    
    }
    }
    }
    
    
$_SESSION['teamID']   = $teamID; 
    
    
// start of page after teamID is figured  
    
    
 //find team sport from database
$findTeamSport = $pdo->prepare('SELECT teamSport FROM teams WHERE id=?'); 

//execute query with variables
$findTeamSport->execute([$teamID]);
    
($teamSport = $findTeamSport->fetchcolumn()); 
    
    
 //find club for team if available
$findTeamClub = $pdo->prepare('SELECT clubID FROM clubTeamList WHERE teamID=?'); 

//execute query with variables
$findTeamClub->execute([$teamID]);

    // if rows above 0, show league
    if ($findTeamClub->rowCount() > 0)
    {
($teamClubID = $findTeamClub->fetchcolumn()); 
$clubIDNoCode   = substr($teamClubID, 3);

//find clubname from id
$findTeamClubName = $pdo->prepare('SELECT clubName FROM clubs WHERE id=?'); 

//execute query with variables
$findTeamClubName->execute([$clubIDNoCode]);
        
($clubName = $findTeamClubName->fetchcolumn());

echo <<<_END

<div id=teamClub>
    <p>$clubName</p>
    </div>

_END;

    }

    
//Code for finding events for mini calendar  
$findTeamEventStartdates = $pdo->prepare('SELECT startdate FROM calendar WHERE username=?'); 

//execute query with variables
$findTeamEventStartdates->execute([$teamID]);

              
($teamEventStartdates = $findTeamEventStartdates->fetchAll(PDO::FETCH_COLUMN));

?>
       
<script type="text/javascript">
    //Assign php generated json to JavaScript variable
    var teamEvent = <?php echo json_encode($teamEventStartdates); ?>;
    var teamID    = <?php echo json_encode($teamID); ?>;
</script>

<?php  
    
  
// find images for team profile pic and cover photo
    
  if (file_exists("profileCover/teamProfilepics/$teamID.jpeg"))
      {
echo <<<_END
  <div id=teamProfilepic>
<img src="profileCover/teamProfilepics/$teamID.jpeg">
  </div>
_END;
      }
    
    
   if (file_exists("profileCover/teamCoverphotos/$teamID.jpeg"))
      {
echo <<<_END
  <div id=teamCoverPhoto>
<img src="profileCover/teamCoverphotos/$teamID.jpeg">
  </div>
_END;
      }
    

//Code for finding team name from teamID  
$findTeamName = $pdo->prepare('SELECT teamName FROM teams WHERE id=?'); 

//execute query with variables
$findTeamName->execute([$teamID]);

              
($teamName = $findTeamName->fetchcolumn());      
    


echo <<<_END


<div id=teamDatepicker>
<div id=teamSmallDatepicker>
    </div>
    </div>
 
 <div id=teamSmallerEvent>
 <div id=teamSmallerEventContent>
    </div>
    </div>
    
<div id=teamFullCalendarButton>
<a href="teamCalendar.php" class="teamCalendar">full calendar</a>
</div>

<div id=teamControl>
    </div>

<div id=teamRegister>
    </div>
    
<div id=teamLeagueTable>
    </div>

<div id=teamScoutingSetup>
    </div>
    
<div id=teamContactDetails>
    </div>

    
<div id=teamProfilepicback>
<div id=teamSportmiiimagewithin>
    <img src=images/sportmii%20logo%20whitesmoke.png alt="sportmii"
         title="sportmii" width="120" height="150">
         </div>
    </div>
    
<div id=teamCoverPhotoBack>
    </div>
    
<div id=teamChangeProfilePic>
<p>change profile picture</p>
</div>

<div id=teamChangeCoverPhoto>
<p>change cover photo</p>
</div>

<div id=teamProfilepicpopup>
    
     <form method='post' action='team.php' id="teamProfilePicForm" enctype='multipart/form-data'>
     
<input type="hidden" name="teamIDProfilePic" value="$teamID">

    <div class=teamButtonlineheight>
     Image: <input type='file' name='teamProfilePic' size='14'>
     <br>
     <input type='submit' name='teamProfileSubmit' value='Save'><button type="button" class="cancel">cancel</button>
    </form><br>
    </div>
    
    </div>
    
<div id=teamCoverPhotoPopup>
    
     <form method='post' action='team.php' id="teamCoverPhotoForm" enctype='multipart/form-data'>
     
<input type="hidden" name="teamIDCoverPhoto" value="$teamID">

    <div class=teamButtonlineheight>
     Image: <input type='file' name='teamCoverPhoto' size='14'>
     <br>
     <input type='submit' name='teamCoverSubmit' value='Save'><button type="button" class="cancel">cancel</button>
    </form><br>
    </div>
    
    </div>
    
<div id=teamName>
<p>$teamName</p>
</div>

<div id=teamSport>
    <p>$teamSport</p>
    </div> 

<div id=teamID>
    <p>$teamID</p>
    </div>
    
<div id=teamDetails>
    </div>
    
<div id=teamTopScorers>
    </div>
    
<div id=teamRegisteredPlayers>
    </div>
    
<div id=teamDiscipline>
    </div>
    
<div id=teamFeed>
</div>

_END;
     

?>

    </body>

</html>