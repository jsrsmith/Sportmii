<?php // profile.php
error_reporting(E_ALL);
ini_set('display_errors', 1);
  require_once 'defaultsetup.php';

if (!$loggedin) die();
?>

<html>

   <head>

    
        <!--link to CSS-->
        <link href="profile.css" type="text/css"
              rel="stylesheet">

    
    <!--link to call jquery file to hover and change picture-->
    <script
    src='hoverProfileCoverPics.js'>
    </script> 
    
    <!--link to call jquery file to bring up changing picture-->
    <script
    src='profileCoverPicsDialogbox.js'>
    </script> 
       
       <!--link to call jquery file to cancel profile pic-->
    <script
    src='cancelProfileCoverpics.js'>
    </script> 
       
     <!--link to call jquery file to bring weekly calendar up-->
    <script
    src='smallerDatepicker.js'>
    </script>
       
    <!--link to call jquery file to open all ajax files-->
    <script
    src='profileAllAjax.js'>
    </script>

       
   </head>
    
<body>

<?php
    
//Code for finding events for mini calendar
    
$findEventStartdates = $pdo->prepare('SELECT startdate FROM calendar WHERE username=?'); 

//execute query with variables
$findEventStartdates->execute([$username]);

              
($eventStartdates = $findEventStartdates->fetchAll(PDO::FETCH_COLUMN));

?>
       
<script type="text/javascript">
    //Assign php generated json to JavaScript variable
    var event = <?php echo json_encode($eventStartdates); ?>;
</script>

<?php  
    
$findEventStartdates = null;    

//ALL FOR PROFILE PICTURE
 
 if (isset($_FILES['profilePic']['name']))
  {
    $saveto = "profileCover/profilepics/".$username.".jpeg";
    move_uploaded_file($_FILES['profilePic']['tmp_name'], $saveto);
    $typeok = TRUE;

    switch($_FILES['profilePic']['type'])
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

      if (file_exists("profileCover/profilepics/$username.jpeg"))
      {
echo <<<_END
  <div id=profilepic>
<img src="profileCover/profilepics/$username.jpeg">
  </div>
_END;
      }
    
    
    

//ALL FOR COVER PHOTO
 
 if (isset($_FILES['coverPhoto']['name']))
  {
    $savetoCover = "profileCover/coverphotos/".$username.".jpeg";
    move_uploaded_file($_FILES['coverPhoto']['tmp_name'], $savetoCover);
    $typeok = TRUE;

    switch($_FILES['coverPhoto']['type'])
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

      if (file_exists("profileCover/coverphotos/$username.jpeg"))
      {
echo <<<_END
  <div id=coverPhoto>
<img src="profileCover/coverphotos/$username.jpeg">
  </div>
_END;
      }
      
      
      
/*    
//to find club for profile description
switch ($primarysport) {
        
    case "football":
            
 //find football team from database
$findFootballTeam = $pdo->prepare('SELECT footballTeam FROM aboutMe WHERE username=?'); 

//execute query with variables
$findFootballTeam->execute([$username]);
         
($footballTeam = $findFootballTeam->fetchcolumn());  
        
        break;

}*/

echo <<<_END

    
<div id=profileDatepicker>
<div id=smallDatepicker>
    </div>
    </div>
 
 <div id=smallerEvent>
 <div id=smallerEventContent>
    </div>
    </div>
    
<div id=fullCalendarButton>
<a href="calendar.php" class="calendar">full calendar</a>
</div>
    
<div id=league>
    </div>

    
<div id=scoutingSetup>
    </div>

    
<div id=profilepicback>
<div id=sportmiiimagewithin>
    <img src=images/sportmii%20logo%20whitesmoke.png alt="sportmii"
         title="sportmii" width="120" height="150">
         </div>
    </div>
    
<div id=coverPhotoBack>
    </div>
    
<div id=changeProfilePic>
<p>change profile picture</p>
</div>

<div id=changeCoverPhoto>
<p>change cover photo</p>
</div>
   
  
<div id=profilepicpopup>
    
     <form method='post' action='profile.php' enctype='multipart/form-data'>

    <div class=buttonlineheight>
     Image: <input type='file' name='profilePic' size='14'>
     <br>
     <input type='submit' value='Save'><button type="button" class="cancel">cancel</button>
    </form><br>
    </div>
    
    </div>
    
<div id=coverPhotoPopup>
    
     <form method='post' action='profile.php' enctype='multipart/form-data'>

    <div class=buttonlineheight>
     Image: <input type='file' name='coverPhoto' size='14'>
     <br>
     <input type='submit' value='Save'><button type="button" class="cancel">cancel</button>
    </form><br>
    </div>
    
    </div>
    
<div id=name>
    <p>$firstname $surname</p>
    </div>
 
<div id=sport>
    <p>$primarysport</p>
    </div>    
    
<div id=club>
    </div>
    
<div id=username>
    <p>$username</p>
    </div>
    
<div id=aboutMe>
    </div>
    
    
<div id=positions>
</div>


<div id=seasonStats>
</div>
   
<div id=feed>
</div>

_END;

?>

    </body>

</html>