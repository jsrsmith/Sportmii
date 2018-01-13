<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'defaultsetup.php';

if (!$loggedin) die();
?>

<html>

    <head>
   
    <title>   
    sportmii
    </title>
       
       <!-- little image next to sportmii on tab-->
       <link rel="shortcut icon" type="image/png" href="images/sportmii%20logo.png">
        
        
<link href="create.css" rel="stylesheet" type="text/css"/>

    
     <!--link to call jquery file to check email availability-->
    <script
    src='createTeamAjax.js'>
    </script>  
        
    <!--link to call jquery file to check email availability-->
    <script
    src='createClubAjax.js'>
    </script> 
        
    <!--link to call jquery file to check email availability-->
    <script
    src='createSendSportTeamClub.js'>
    </script> 
     
        
        
   </head>
   
   <body>

<?php

echo <<<_END

<div id=chooseTeamOrClub>

<div id=createTitle>
<p>what would you like to create?</p>
</div>

<div id=outsideBox>

<div id=newDropdownText>
<p>select a sport</p>
</div>


 <select name="newTeamClubDropdown" id="newTeamClubDropdown">
      <option value="$primarysport">$primarysport</option>
      <option value="football">football</option>
      
      </select>


<input type="button" name="chooseCreateTeam" id="chooseCreateTeam" value="create&#10; new team"/>


<input type="button" name="chooseCreateClub" id="chooseCreateClub" value="create&#10; new club"/>


</div>

</div>

<div id=setupCreateTeam>
</div>

<div id=setupCreateClub>
</div>

_END;

?>
   </body>
    
</html>