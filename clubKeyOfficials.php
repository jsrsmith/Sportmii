<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="clubKeyOfficials.css" rel="stylesheet" type="text/css"/>
        
            <!--link to call Google CDN-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

        
    </head>
    
    <body>
        
<?php

     
if (isset($_SESSION['clubID']))
    
{
    

$clubID   = $_SESSION['clubID'];
$clubIDNoCode   = substr($clubID, 3);
    

//find all club officials
$findKeyOfficials = $pdo->prepare('SELECT * FROM clubs WHERE id=?'); 

//execute query with variables
$findKeyOfficials->execute([$clubIDNoCode]);
        
//get the rows
while($row = $findKeyOfficials->fetch(PDO::FETCH_ASSOC)){  
 
$chairmanFirstname             = $row["chairmanFirstname"];
$chairmanSurname               = $row["chairmanSurname"];
$secretaryFirstname            = $row["secretaryFirstname"];
$secretarySurname              = $row["secretarySurname"];
$treasurerFirstname            = $row["treasurerFirstname"];
$treasurerSurname              = $row["treasurerSurname"];
$welfareOfficerFirstname       = $row["welfareOfficerFirstname"];
$welfareOfficerSurname         = $row["welfareOfficerSurname"];

}
        
$indexCount = count($chairmanFirstname);
              

for($index=0; $index < $indexCount; $index++) {

print '<div class=keyOfficalsTitle>
<p>key officials</p>
</div>

<div class=allKeyOfficials>

<div class=keyOfficialsChairmanTitle>
<p>chairman:</p>
</div>

<div class=keyOfficialsChairmanName>
<p>'. $chairmanFirstname .' '. $chairmanSurname .'</p>
</div>

<div class=keyOfficialsSecretaryTitle>
<p>secretary:</p>
</div>

<div class=keyOfficialsSecretaryName>
<p>'. $secretaryFirstname .' '. $secretarySurname .'</p>
</div>

<div class=keyOfficialsTreasurerTitle>
<p>treasurer:</p>
</div>

<div class=keyOfficialsTreasurerName>
<p>'. $treasurerFirstname .' '. $treasurerSurname .'</p>
</div>

<div class=keyOfficialsWelfareOfficerTitle>
<p>welfare officer:</p>
</div>

<div class=keyOfficialsWelfareOfficerName>
<p>'. $welfareOfficerFirstname .' '. $welfareOfficerSurname .'</p>
</div>

</div>';

}
}
?>
        
    </body>
</html>
