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
        <link href="club.css" type="text/css"
              rel="stylesheet">

       
    <!--link to call jquery file to bring weekly calendar up-->
    <script
    src='clubSmallerDatepicker.js'>
    </script>
       
    <!--link to call jquery file to hover and change picture-->
    <script
    src='clubHoverProfileCoverPics.js'>
    </script> 
       
    <!--link to call jquery file to bring up changing picture-->
    <script
    src='clubProfileCoverPicsDialogbox.js'>
    </script> 
       
    <!--link to call jquery file to cancel profile pic-->
    <script
    src='clubCancelProfileCoverpics.js'>
    </script> 
       
    <!--link to call jquery file to open team details via ajax-->
    <script
    src='clubAllAjax.js'>
    </script>
       

    
           </head>
    
<body>     
 

<?php
      
         
    // if 'createNewTeam' is pressed submit all info to mysql database
if (isset($_POST['createNewClubFootball']))
{ 

        
 //declare variables
$clubSport             = ($_POST['createClubClubSport']);
$clubNameOriginal      = ($_POST['createClubClubName']);
$addressLine1          = ($_POST['createClubAddressLine1']);
$addressLine2          = ($_POST['createClubAddressLine2']);
$addressLine3          = ($_POST['createClubAddressLine3']);
$postCode              = ($_POST['createClubPostCode']);
$clubEmail             = ($_POST['createClubClubEmail']);
$clubWebsite           = ($_POST['createClubClubWebsite']);
$chairmansFirstname     = ($_POST['createClubChairmansFirstname']);
$chairmansSurname       = ($_POST['createClubChairmansSurname']);
$chairmansContactNumber = ($_POST['createClubChairmansContactNumber']);
$chairmansEmail         = ($_POST['createClubChairmansEmail']);
$secretarysFirstname     = ($_POST['createClubSecretaryFirstname']);
$secretarysSurname       = ($_POST['createClubSecretarySurname']);
$secretarysContactNumber = ($_POST['createClubSecretaryContactNumber']);
$secretarysEmail         = ($_POST['createClubTreasurersEmail']);
$treasurersFirstname     = ($_POST['createClubTreasurersFirstname']);
$treasurersSurname       = ($_POST['createClubTreasurersSurname']);
$treasurersContactNumber = ($_POST['createClubSecretaryContactNumber']);
$treasurersEmail         = ($_POST['createClubTreasurersEmail']);
$welfareOfficersFirstname     = ($_POST['createClubWelfareOfficersFirstname']);
$welfareOfficersSurname       = ($_POST['createClubWelfareOfficersSurname']);
$welfareOfficersContactNumber = ($_POST['createClubWelfareOfficersContactNumber']);
$welfareOfficersEmail         = ($_POST['createClubWelfareOfficersEmail']);
        
$clubName = "CLUB-$clubNameOriginal";
$clubCode = "CL-";
    
$clubEmail                = strtolower($clubEmail);
$clubWebsite              = strtolower($clubWebsite);
$chairmansFirstname       = strtolower($chairmansFirstname);
$chairmansSurname         = strtolower($chairmansSurname);
$chairmansEmail           = strtolower($chairmansEmail);
$secretarysFirstname      = strtolower($secretarysFirstname);
$secretarysSurname        = strtolower($secretarysSurname);
$secretarysEmail          = strtolower($secretarysEmail); 
$treasurersFirstname      = strtolower($treasurersFirstname);
$treasurersSurname        = strtolower($treasurersSurname);
$treasurersEmail          = strtolower($treasurersEmail);
$welfareOfficersFirstname = strtolower($welfareOfficersFirstname);
$welfareOfficersSurname   = strtolower($welfareOfficersSurname);
$welfareOfficersEmail     = strtolower($welfareOfficersEmail);
        
        
        $createClub = $pdo->prepare('INSERT INTO clubs (clubCode, clubSport, clubName, addressLine1, addressLine2, addressLine3, postCode, clubEmail, clubWebsite, chairmanFirstname, chairmanSurname, chairmanContactNumber, chairmanEmail, secretaryFirstname, secretarySurname, secretaryContactNumber, secretaryEmail, treasurerFirstname, treasurerSurname, treasurerContactNumber, treasurerEmail, welfareOfficerFirstname, welfareOfficerSurname, welfareOfficerContactNumber, welfareOfficerEmail, username) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        
        //execute query and variables
$createClub->execute([$clubCode, $clubSport, $clubName, $addressLine1, $addressLine2, $addressLine3, $postCode, $clubEmail, $clubWebsite, $chairmansFirstname, $chairmansSurname, $chairmansContactNumber, $chairmansEmail, $secretarysFirstname, $secretarysSurname, $secretarysContactNumber, $secretarysEmail, $treasurersFirstname, $treasurersSurname, $treasurersContactNumber, $treasurersEmail, $welfareOfficersFirstname, $welfareOfficersSurname, $welfareOfficersContactNumber, $welfareOfficersEmail, $username]);
        

  //find id from database
$findClubID = $pdo->prepare('SELECT id FROM clubs WHERE clubName=? and username=?'); 

//execute query with variables
$findClubID->execute([$clubName, $username]);
         
($clubIDAlone = $findClubID->fetchcolumn());
        
$clubID = "$clubCode$clubIDAlone";
    
}

 
    else if (isset($_POST['clubProfileSubmit']))
{  
    
    $clubID   =  ($_POST['clubIDProfilePic']);
    $clubIDNoCode   = substr($clubID, 3);
    
//ALL FOR PROFILE PICTURE
 
 if (isset($_FILES['clubProfilePic']['name']))
  {
     
    $saveto = "profileCover/clubProfilepics/".$clubID.".jpeg";
    move_uploaded_file($_FILES['clubProfilePic']['tmp_name'], $saveto);
    $typeok = TRUE;

    switch($_FILES['clubProfilePic']['type'])
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
    
else if (isset($_POST['clubCoverSubmit']))
{  
    
    $clubID   =  ($_POST['clubIDCoverPhoto']);
    $clubIDNoCode   = substr($clubID, 3);
    
//ALL FOR COVER PHOTO
 
 if (isset($_FILES['clubCoverPhoto']['name']))
  {
    $savetoCover = "profileCover/clubCoverphotos/".$clubID.".jpeg";
    move_uploaded_file($_FILES['clubCoverPhoto']['tmp_name'], $savetoCover);
    $typeok = TRUE;

    switch($_FILES['clubCoverPhoto']['type'])
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
    
    
    else if (isset($_SESSION['clubID']))
    
    {
        $clubID         =   $_SESSION['clubID'];
        $clubIDNoCode   = substr($clubID, 3);
        
    
    
// query to see if user is in control
  $isUserInControl = $pdo->prepare("SELECT username FROM clubControl WHERE clubID=? and username=?"); 

  $isUserInControl->execute([$clubID, $username]);
    
    if ($isUserInControl->rowCount() == 0)
        
    { 

// query to see if user is in control
  $didUserSetupClub = $pdo->prepare("SELECT username FROM clubs WHERE id=? and username=?"); 

  $didUserSetupClub->execute([$clubIDNoCode, $username]);
    
    if ($didUserSetupClub->rowCount() == 0)

       {
 
echo <<<_END
<script>
  window.location.href = "viewClub.php";
</script>
_END;
    
    }
    }
    }
    
    
$_SESSION['clubID']   = $clubID; 
    
    
// start of page after clubID is figured  
    
    
 //find club sport from database
$findClubSport = $pdo->prepare('SELECT clubSport FROM clubs WHERE id=?'); 

//execute query with variables
$findClubSport->execute([$clubIDNoCode]);
    
($clubSport = $findClubSport->fetchcolumn());    



    
//Code for finding events for mini calendar  
$findClubEventStartdates = $pdo->prepare('SELECT startdate FROM calendar WHERE username=?'); 

//execute query with variables
$findClubEventStartdates->execute([$clubID]);

              
($clubEventStartdates = $findClubEventStartdates->fetchAll(PDO::FETCH_COLUMN));

?>
       
<script type="text/javascript">
    //Assign php generated json to JavaScript variable
    var clubEvent = <?php echo json_encode($clubEventStartdates); ?>;
    var clubID    = <?php echo json_encode($clubID); ?>;
</script>

<?php  
    
  
// find images for club profile pic and cover photo
    
  if (file_exists("profileCover/clubProfilepics/$clubID.jpeg"))
      {
echo <<<_END
  <div id=clubProfilepic>
<img src="profileCover/clubProfilepics/$clubID.jpeg">
  </div>
_END;
      }
    
    
   if (file_exists("profileCover/clubCoverphotos/$clubID.jpeg"))
      {
echo <<<_END
  <div id=clubCoverPhoto>
<img src="profileCover/clubCoverphotos/$clubID.jpeg">
  </div>
_END;
      }
    

//Code for finding club name from clubID  
$findClubName = $pdo->prepare('SELECT clubName FROM clubs WHERE id=?'); 

//execute query with variables
$findClubName->execute([$clubIDNoCode]);

              
($clubName = $findClubName->fetchcolumn());      
    


echo <<<_END


<div id=clubDatepicker>
<div id=clubSmallDatepicker>
    </div>
    </div>

 <div id=clubSmallerEvent>
 <div id=clubSmallerEventContent>
    </div>
    </div>
    
<div id=clubFullCalendarButton>
<a href="clubCalendar.php" class="clubCalendar">full calendar</a>
</div>

<div id=clubControl>
    </div>

<div id=clubLeagueTable>
    </div>

<div id=clubScoutingSetup>
    </div>
    
<div id=clubContactDetails>
    </div>

    
<div id=clubProfilepicback>
<div id=clubSportmiiimagewithin>
    <img src=images/sportmii%20logo%20whitesmoke.png alt="sportmii"
         title="sportmii" width="120" height="150">
         </div>
    </div>
    
<div id=clubCoverPhotoBack>
    </div>
    
<div id=clubChangeProfilePic>
<p>change profile picture</p>
</div>

<div id=clubChangeCoverPhoto>
<p>change cover photo</p>
</div>


<div id=clubProfilepicpopup>
    
     <form method='post' action='club.php' id="clubProfilePicForm" enctype='multipart/form-data'>
     
<input type="hidden" name="clubIDProfilePic" value="$clubID">

    <div class=clubButtonlineheight>
     Image: <input type='file' name='clubProfilePic' size='14'>
     <br>
     <input type='submit' name='clubProfileSubmit' value='Save'><button type="button" class="cancel">cancel</button>
    </form><br>
    </div>
    
    </div>
    
<div id=clubCoverPhotoPopup>
    
     <form method='post' action='club.php' id="clubCoverPhotoForm" enctype='multipart/form-data'>
     
<input type="hidden" name="clubIDCoverPhoto" value="$clubID">

    <div class=clubButtonlineheight>
     Image: <input type='file' name='clubCoverPhoto' size='14'>
     <br>
     <input type='submit' name='clubCoverSubmit' value='Save'><button type="button" class="cancel">cancel</button>
    </form><br>
    </div>
    
    </div>
    
<div id=clubName>
<p>$clubName</p>
</div>

<div id=clubSport>
    <p>$clubSport</p>
    </div> 

<div id=clubID>
    <p>$clubID</p>
    </div>
    
<div id=clubDetails>
    </div>
    
<div id=clubTeamList>
    </div>
    
<div id=clubKeyOfficials>
    </div>
    
<div id=clubPlayersList>
    </div>
    
<div id=clubFeed>
</div>


_END;
     

    
?>

    </body>

</html>