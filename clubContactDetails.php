<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="clubContactDetails.css" rel="stylesheet" type="text/css"/>
        
<!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
    <!--link to call jquery file to bring up team details change-->
    <script
    src='clubContactDetailsPopup.js'>
    </script>    

        
    <!--link to call jquery file to cancel editing team details--> 
    <script
    src='clubContactDetailsCancelPopup.js'>
    </script>

        
    </head>
    
    <body>
        
<?php
      
     
if (isset($_SESSION['clubID']))
    
{
    

$clubID   = $_SESSION['clubID'];
$clubIDNoCode   = substr($clubID, 3);

     
$findContactInfo = $pdo->prepare('SELECT * FROM clubs WHERE id=?');

//execute query and variables
$findContactInfo->execute([$clubIDNoCode]); 
        
// if rows above 0, show league
    if ($findContactInfo->rowCount() > 0)
    {
        
//get the rows
while($row = $findContactInfo->fetch(PDO::FETCH_ASSOC)){  

$clubEmail[]                     = $row["clubEmail"]; 
$chairmanFirstname[]             = $row["chairmanFirstname"];
$chairmanSurname[]               = $row["chairmanSurname"];
$chairmanEmail[]                 = $row["chairmanEmail"];  
$chairmanContactNumber[]         = $row["chairmanContactNumber"];
$secretaryFirstname[]            = $row["secretaryFirstname"];
$secretarySurname[]              = $row["secretarySurname"];
$secretaryEmail[]                = $row["secretaryEmail"];  
$secretaryContactNumber[]        = $row["secretaryContactNumber"];
$treasurerFirstname[]            = $row["treasurerFirstname"];
$treasurerSurname[]              = $row["treasurerSurname"];
$treasurerEmail[]                = $row["treasurerEmail"];  
$treasurerContactNumber[]        = $row["treasurerContactNumber"];
$welfareOfficerFirstname[]       = $row["welfareOfficerFirstname"];
$welfareOfficerSurname[]         = $row["welfareOfficerSurname"];
$welfareOfficerEmail[]           = $row["welfareOfficerEmail"];  
$welfareOfficerContactNumber[]   = $row["welfareOfficerContactNumber"];
}
        
$indexCount = count($clubEmail);


echo <<<_END

<div class=contactDetails>
<p>contact details</p>
</div>

<div class=clubContactDetailsPopup>

    
<div class=clubContactDetailsPopupTitle>
<p>contact details</p>
</div>

<div class=clubEmailTitle>
<p>clubs email:</p>
</div>

<div class=chairmanNameTitle>
<p>chairmans name:</p>
</div>

<div class=chairmanEmailTitle>
<p>chairmans email:</p>
</div>

<div class=chairmanPhoneTitle>
<p>chairmans phone number:</p>
</div>


<div class=secretaryNameTitle>
<p>secretarys name:</p>
</div>

<div class=secretaryEmailTitle>
<p>secretarys email:</p>
</div>

<div class=secretaryPhoneTitle>
<p>secretarys phone number:</p>
</div>

<div class=treasurerNameTitle>
<p>treasurers name:</p>
</div>

<div class=treasurerEmailTitle>
<p>treasurers email:</p>
</div>

<div class=treasurerPhoneTitle>
<p>treasurers phone number:</p>
</div>

<div class=welfareOfficerNameTitle>
<p>welfare officers name:</p>
</div>

<div class=welfareOfficerEmailTitle>
<p>welfare officers email:</p>
</div>

<div class=welfareOfficerPhoneTitle>
<p>welfare officers phone number:</p>
</div>

_END;

for($index=0; $index < $indexCount; $index++) {
    
print'<div class=clubEmail>
<p>'. $clubEmail[$index] .'</p>
</div>
<div class=chairmanName>
<p>'. $chairmanFirstname[$index] .' '. $chairmanSurname[$index] .'</p>
</div>
<div class=chairmanEmail>
<p>'. $chairmanEmail[$index] .'</p>
</div>
<div class=chairmanPhone>
<p>'. $chairmanContactNumber[$index] .'</p>
</div>
<div class=secretaryName>
<p>'. $secretaryFirstname[$index] .' '. $secretarySurname[$index] .'</p>
</div>
<div class=secretaryEmail>
<p>'. $secretaryEmail[$index] .'</p>
</div>
<div class=secretaryPhone>
<p>'. $secretaryContactNumber[$index] .'</p>
</div>
<div class=treasurerName>
<p>'. $treasurerFirstname[$index] .' '. $treasurerSurname[$index] .'</p>
</div>
<div class=treasurerEmail>
<p>'. $treasurerEmail[$index] .'</p>
</div>
<div class=treasurerPhone>
<p>'. $treasurerContactNumber[$index] .'</p>
</div>
<div class=welfareOfficerName>
<p>'. $welfareOfficerFirstname[$index] .' '. $welfareOfficerSurname[$index] .'</p>
</div>
<div class=welfareOfficerEmail>
<p>'. $welfareOfficerEmail[$index] .'</p>
</div>
<div class=welfareOfficerPhone>
<p>'. $welfareOfficerContactNumber[$index] .'</p>
</div>';
    
}

echo <<<_END

<div class=clubAddressMap>
<p>beta map</p>
</div>

        <button type="button" class="cancel">cancel</button>
    
</div>

_END;

}
}


?>
        
    </body>
</html>
