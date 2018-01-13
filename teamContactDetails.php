<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="teamContactDetails.css" rel="stylesheet" type="text/css"/>
        
<!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
    <!--link to call jquery file to bring up team details change-->
    <script
    src='teamContactDetailsPopup.js'>
    </script>    

        
    <!--link to call jquery file to cancel editing team details--> 
    <script
    src='teamContactDetailsCancelPopup.js'>
    </script>

        
    </head>
    
    <body>
        
<?php
      
     
if (isset($_SESSION['teamID']))
    
{
    

$teamID   = $_SESSION['teamID'];

     
$findContactInfo = $pdo->prepare('SELECT * FROM teams WHERE id=?');

//execute query and variables
$findContactInfo->execute([$teamID]); 
        
// if rows above 0, show league
    if ($findContactInfo->rowCount() > 0)
    {
        
//get the rows
while($row = $findContactInfo->fetch(PDO::FETCH_ASSOC)){  

$teamEmail[]                   = $row["teamEmail"]; 
$managersFirstname[]           = $row["managersFirstname"];
$managersSurname[]             = $row["managersSurname"];
$managersEmail[]               = $row["managersEmail"];  
$managersContactNumber[]       = $row["managersContactNumber"]; 
}
        
$indexCount = count($teamEmail);


echo <<<_END

<div class=contactDetails>
<p>contact details</p>
</div>

<div class=teamContactDetailsPopup>

    
<div class=teamContactDetailsPopupTitle>
<p>contact details</p>
</div>

<div class=teamEmailTitle>
<p>teams email:</p>
</div>

<div class=ManagersNameTitle>
<p>managers name:</p>
</div>

<div class=managersEmailTitle>
<p>managers email:</p>
</div>

<div class=managersPhoneTitle>
<p>managers phone number:</p>
</div>

_END;

for($index=0; $index < $indexCount; $index++) {
    
print'<div class=teamEmail>
<p>'. $teamEmail[$index] .'</p>
</div>
<div class=ManagersName>
<p>'. $managersFirstname[$index] .' '. $managersSurname[$index] .'</p>
</div>
<div class=managersEmail>
<p>'. $managersEmail[$index] .'</p>
</div>
<div class=managersPhone>
<p>'. $managersContactNumber[$index] .'</p>
</div>';
    
}

echo <<<_END

<div class=teamAddressMap>
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
