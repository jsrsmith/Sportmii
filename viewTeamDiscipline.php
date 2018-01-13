<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="teamDiscipline.css" rel="stylesheet" type="text/css"/>
        


        
    </head>
    
    <body>
        
<?php
      
     
if (isset($_SESSION['teamID']))
    
{
    

$teamID   = $_SESSION['teamID'];
    
 //find suspension count
$findCurrentSuspensions = $pdo->prepare('SELECT count(suspended) FROM discipline WHERE teamID=? and suspended=?'); 

//execute query with variables
$findCurrentSuspensions->execute([$teamID, yes]);
         
($currentSuspensionsCount = $findCurrentSuspensions->fetchcolumn());
    
//find payments count
$findPaymentsDue = $pdo->prepare('SELECT count(payment) FROM discipline WHERE teamID=? and payment=?'); 

//execute query with variables
$findPaymentsDue->execute([$teamID, yes]);
         
($paymentsDueCount = $findPaymentsDue->fetchcolumn());
    
//find yellow cards
$findYellowCards = $pdo->prepare('SELECT count(card) FROM discipline WHERE teamID=? and card=?'); 

//execute query with variables
$findYellowCards->execute([$teamID, yellow]);
         
($yellowCardsCount = $findYellowCards->fetchcolumn());
    
//find red cards
$findRedCards = $pdo->prepare('SELECT count(card) FROM discipline WHERE teamID=? and card=?'); 

//execute query with variables
$findRedCards->execute([$teamID, red]);
         
($redCardsCount = $findRedCards->fetchcolumn());


echo <<<_END

<div class=teamDisciplineTitle>
<p>discipline</p>
</div>

<div class=viewTeamAllDisciplineInfo>

<div class=currentSuspensionsTitle>
<p>current suspensions:</p>
</div>

<div class=paymentsDueTitle>
<p>payments due:</p>
</div>

<div class=totalYellowCardsTitle>
<p>total yellow cards:</p>
</div>

<div class=totalRedCardsTitle>
<p>total red cards:</p>
</div>

<div class=currentSuspensionsValue>
<p>$currentSuspensionsCount</p>
</div>

<div class=paymentsDueValue>
<p>$paymentsDueCount</p>
</div>

<div class=totalYellowCardsValue>
<p>$yellowCardsCount</p>
</div>

<div class=totalRedCardsValue>
<p>$redCardsCount</p>
</div>

</div>

_END;


}

?>
        
    </body>
</html>
