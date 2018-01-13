<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<html>

   <head>
       
        <!--link to CSS-->
        <link href="createClub.css" type="text/css"
              rel="stylesheet">
       
       
        <!--link to call jquery file to bring up datepicker-->
    <script
    src='createClubSubmitButton.js'>
    </script> 

    
           </head>
    
<body>     
 

<?php
    

    if(isset($_POST['createClubSport']))
            
        {

           $clubSport = $_POST['createClubSport'];
        
 switch ($clubSport) {
         
           case "football":
         
         $clubName                      = "";
         $addressLine1                  = "";
         $addressLine2                  = "";
         $addressLine3                  = "";
         $postCode                      = "";
         $clubEmail                     = "";
         $clubWebsite                   = "";
         $chairmansFirstname             = "";
         $chairmansSurname               = "";
         $chairmansContactNumber         = "";
         $chairmansEmail                 = "";
         $secretarysFirstname            = "";
         $secretarysSurname              = "";
         $secretarysContactNumber        = "";
         $secretarysEmail                = "";
         $treasurersFirstname            = "";
         $treasurersSurname              = "";
         $treasurersContactNumber        = "";
         $treasurersEmail                = "";
         $welfareOfficersFirstname       = "";
         $welfareOfficersSurname         = "";
         $welfareOfficersContactNumber   = "";
         $welfareOfficersEmail           = "";
         

echo <<<_END

<div id=createClubTitle>
<p>new club setup</p>
</div>

<div id=createClubexplanation>
<p>just before we setup your club, theres a few details we need to take.<br><br>anything with an astrix must be filled in.</p>
</div>

<div id=createClubOutsideBox>

<form action="club.php" id="createClubFootball" method="post">

<input type="hidden" name="createClubClubSport" id="createClubClubSport" value='$clubSport'>

<div id=createClubClubNameTitle>
<p>club name*</p>
</div>

<input type="text" name="createClubClubName" id="createClubClubName" value='$clubName'>

<div id=createClubAddressTitle>
<p>club address*</p>
</div>

<input type="text" name="createClubAddressLine1" id="createClubAddressLine1" placeholder="address line 1" value='$addressLine1'>

<input type="text" name="createClubAddressLine2" id="createClubAddressLine2" placeholder="address line 2"  value='$addressLine2'>

<input type="text" name="createClubAddressLine3" id="createClubAddressLine3" placeholder="address line 3"  value='$addressLine3'>

<input type="text" name="createClubPostCode" id="createClubPostCode" placeholder="post code"  value='$postCode'>


<div id=createClubClubEmailTitle>
<p>club email</p>
</div>

<input type="text" name="createClubClubEmail" id="createClubClubEmail" value='$clubEmail'>

<div id=createClubClubWebsiteTitle>
<p>club website</p>
</div>

<input type="text" name="createClubClubWebsite" id="createClubClubWebsite" value='$clubWebsite'>


<div id=createClubChairmansFirstnameTitle>
<p>chairmans<br>firstname*</p>
</div>

<input type="text" name="createClubChairmansFirstname" id="createClubChairmansFirstname" value='$chairmansFirstname'>

<div id=createClubChairmansSurnameTitle>
<p>chairmans<br>surname*</p>
</div>

<input type="text" name="createClubChairmansSurname" id="createClubChairmansSurname" value='$chairmansSurname'>

<div id=createClubChairmansContactNumberTitle>
<p>chairmans contact number*</p>
</div>

<input type="text" name="createClubChairmansContactNumber" id="createClubChairmansContactNumber" value='$chairmansContactNumber'> 

<div id=createClubChairmansEmailTitle>
<p>chairmans email*</p>
</div>

<input type="text" name="createClubChairmansEmail" id="createClubChairmansEmail" value='$chairmansEmail'>

<div id=createClubSecretaryFirstnameTitle>
<p>secretarys firstname*</p>
</div>

<input type="text" name="createClubSecretaryFirstname" id="createClubSecretaryFirstname" value='$secretarysFirstname'>

<div id=createClubSecretarySurnameTitle>
<p>secretarys surname*</p>
</div>

<input type="text" name="createClubSecretarySurname" id="createClubSecretarySurname" value='$secretarysSurname'>

<div id=createClubSecretaryContactNumberTitle>
<p>secretarys contact number*</p>
</div>

<input type="text" name="createClubSecretaryContactNumber" id="createClubSecretaryContactNumber" value='$secretarysContactNumber'> 

<div id=createClubSecretaryEmailTitle>
<p>secretarys email*</p>
</div>

<input type="text" name="createClubSecretaryEmail" id="createClubSecretaryEmail" value='$secretarysEmail'>

<div id=createClubTreasurersFirstnameTitle>
<p>treasurers firstname*</p>
</div>

<input type="text" name="createClubTreasurersFirstname" id="createClubTreasurersFirstname" value='$treasurersFirstname'>

<div id=createClubTreasurersSurnameTitle>
<p>treasurers surname*</p>
</div>

<input type="text" name="createClubTreasurersSurname" id="createClubTreasurersSurname" value='$treasurersSurname'>

<div id=createClubTreasurersContactNumberTitle>
<p>treasurers contact number*</p>
</div>

<input type="text" name="createClubTreasurersContactNumber" id="createClubTreasurersContactNumber" value='$treasurersContactNumber'> 

<div id=createClubTreasurersEmailTitle>
<p>treasurers email*</p>
</div>

<input type="text" name="createClubTreasurersEmail" id="createClubTreasurersEmail" value='$treasurersEmail'>

<div id=createClubWelfareOfficersFirstnameTitle>
<p>welfare officers firstname*</p>
</div>

<input type="text" name="createClubWelfareOfficersFirstname" id="createClubWelfareOfficersFirstname" value='$welfareOfficersFirstname'>

<div id=createClubWelfareOfficersSurnameTitle>
<p>welfare officers surname*</p>
</div>

<input type="text" name="createClubWelfareOfficersSurname" id="createClubWelfareOfficersSurname" value='$welfareOfficersSurname'>

<div id=createClubWelfareOfficersContactNumberTitle>
<p>welfare officers contact number*</p>
</div>

<input type="text" name="createClubWelfareOfficersContactNumber" id="createClubWelfareOfficersContactNumber" value='$welfareOfficersContactNumber'> 

<div id=createClubWelfareOfficersEmailTitle>
<p>welfare officers email*</p>
</div>

<input type="text" name="createClubWelfareOfficersEmail" id="createClubWelfareOfficersEmail" value='$welfareOfficersEmail'>


     <input type="submit" name="createNewClubFootball" value="create team" id="createNewClubFootball" />
     

<div id=createClubNotFilledIn>
<p>everything with an astrix must be filled in!</p>
</div>

<div id=createClubContactNumber>
<p>the contact numbers field can only contain numbers 0-9</p>
</div>

</form>

</div>

_END;
         
            break;

     }
    }
    
         else
        {
        
echo "there has been a problem with this page";
        }
         

?>

    </body>

</html>