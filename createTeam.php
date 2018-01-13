<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<html>

   <head>
       
        <!--link to CSS-->
        <link href="createTeam.css" type="text/css"
              rel="stylesheet">
       
       
        <!--link to call jquery file to bring up datepicker-->
    <script
    src='createTeamSubmitButton.js'>
    </script> 

    
           </head>
    
<body>     
 

<?php
    

    if(isset($_POST['createTeamSport']))
            
        {

           $teamSport = $_POST['createTeamSport'];
        
 switch ($teamSport) {
         
           case "football":
         
         $teamName                      = "";
         $addressLine1                  = "";
         $addressLine2                  = "";
         $addressLine3                  = "";
         $postCode                      = "";
         $teamEmail                     = "";
         $teamWebsite                   = "";
         $managersFirstname             = "";
         $managersSurname               = "";
         $managersContactNumber         = "";
         $managersEmail                 = "";     
         

echo <<<_END

<div id=createTeamTitle>
<p>new team setup</p>
</div>

<div id=createTeamexplanation>
<p>just before we setup your team, theres a few details we need to take.<br><br>anything with an astrix must be filled in.</p>
</div>

<div id=createTeamOutsideBox>

<form action="team.php" id="createTeamFootball" method="post">

<input type="hidden" name="createTeamTeamSport" id="createTeamTeamSport" value='$teamSport'>

<div id=createTeamTeamNameTitle>
<p>team name*</p>
</div>

<input type="text" name="createTeamTeamName" id="createTeamTeamName" value='$teamName'>

<div id=createTeamAddressTitle>
<p>team address*</p>
</div>

<input type="text" name="createTeamAddressLine1" id="createTeamAddressLine1" placeholder="address line 1" value='$addressLine1'>

<input type="text" name="createTeamAddressLine2" id="createTeamAddressLine2" placeholder="address line 2"  value='$addressLine2'>

<input type="text" name="createTeamAddressLine3" id="createTeamAddressLine3" placeholder="address line 3"  value='$addressLine3'>

<input type="text" name="createTeamPostCode" id="createTeamPostCode" placeholder="post code"  value='$postCode'>


<div id=createTeamTeamEmailTitle>
<p>team email</p>
</div>

<input type="text" name="createTeamTeamEmail" id="createTeamTeamEmail" value='$teamEmail'>

<div id=createTeamTeamWebsiteTitle>
<p>team website</p>
</div>

<input type="text" name="createTeamTeamWebsite" id="createTeamTeamWebsite" value='$teamWebsite'>


<div id=createTeamManagersFirstnameTitle>
<p>managers firstname*</p>
</div>

<input type="text" name="createTeamManagersFirstname" id="createTeamManagersFirstname" value='$managersFirstname'>

<div id=createTeamManagersSurnameTitle>
<p>managers surname*</p>
</div>

<input type="text" name="createTeamManagersSurname" id="createTeamManagersSurname" value='$managersSurname'>

<div id=createTeamManagersContactNumberTitle>
<p>managers contact number*</p>
</div>

<input type="text" name="createTeamManagersContactNumber" id="createTeamManagersContactNumber" value='$managersContactNumber'> 

<div id=createTeamManagersEmailTitle>
<p>managers email*</p>
</div>

<input type="text" name="createTeamManagersEmail" id="createTeamManagersEmail" value='$managersEmail'>


     <input type="submit" name="createNewTeamFootball" value="create team" id="createNewTeamFootball" />
     

<div id=createTeamNotFilledIn>
<p>everything with an astrix must be filled in!</p>
</div>

<div id=createTeamContactNumber>
<p>the managers contact number field can only contain numbers 0-9</p>
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