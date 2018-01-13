<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="viewClubDetails.css" rel="stylesheet" type="text/css"/>
        

        
    </head>
    
    <body>
        
<?php
     
             
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

<div id=viewClubDetailsTitle>
<p>club details</p>
</div>

<div id=ViewClubAllclubDetails>

<div id=ViewClubDetailsClubNameTitle>
<p>club name:</p>
</div>

<div id=ViewClubDetailsClubName>
<p>$clubName</p>
</div>

<div id=ViewClubDetailsStadiumTitle>
<p>stadium:</p>
</div>

<div id=ViewClubDetailsStadium>
<p>$stadium</p>
</div>

<div id=ViewClubDetailsSponsorTitle>
<p>sponsor:</p>
</div>

<div id=ViewClubDetailsSponsor>
<p>$sponsor</p>
</div>

<div id=ViewClubDetailsFoundedTitle>
<p>founded:</p>
</div>

<div id=ViewClubDetailsFounded>
<p>$founded</p>
</div>

</div>


_END;
}
?>
        
    </body>
</html>
