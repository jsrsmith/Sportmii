<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="teamDiscipline.css" rel="stylesheet" type="text/css"/>
        
   <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
    <!--link to call jquery file to bring up team details change-->
    <script
    src='teamDisciplinePopup.js'>
    </script>    

        
    <!--link to call jquery file to cancel editing team details--> 
    <script
    src='teamDisciplineCancelPopup.js'>
    </script>

        
    </head>
    
    <body>
        
<?php
        
//if card is added
 if (isset ($_SESSION['teamID'], $_POST['addDiscipline']))
    
 {
  
    
    $teamID             = $_SESSION['teamID'];
    $cardType           = $_POST['cardType'];
    $cardToUser         = $_POST['teamDisciplineName'];
    $suspended          = $_POST['suspended'];
    $paymentDue         = $_POST['paymentDue'];
 
 if ($cardToUser == NULL) {

echo <<<_END
<script>
  window.location.href = "team.php";
</script>
_END;

 }
     else
     {
     $insertCard = $pdo->prepare('INSERT INTO discipline (teamID, username, card, suspended, payment) VALUES(?, ?, ?, ?, ?)');
        
        //execute query and variables
$insertCard->execute([$teamID, $cardToUser, $cardType, $suspended, $paymentDue]);    

echo <<<_END
<script>
  window.location.href = "team.php";
</script>
_END;

     }
 }
    
        
        
//if suspension is removed
 if (isset ($_SESSION['teamID'], $_POST['removeSuspension']))
    
 {
  
    
    $teamID             = $_SESSION['teamID'];
    $removeSuspended    = $_POST['RemoveSuspensionName'];
 
 if ($removeSuspended == NULL) {

echo <<<_END
<script>
  window.location.href = "team.php";
</script>
_END;

 }
     else
     {
     $removeSuspension = "UPDATE discipline SET suspended = 'no' WHERE teamID=? and username=?";
        
        //execute query and variables
$pdo->prepare($removeSuspension)->execute([$teamID, $removeSuspended]);    

echo <<<_END
<script>
  window.location.href = "team.php";
</script>
_END;

     }
 }
        
        
//if payment is removed
 if (isset ($_SESSION['teamID'], $_POST['removePayment']))
    
 {
  
    
    $teamID             = $_SESSION['teamID'];
    $removePayment      = $_POST['RemovePaymentName'];
 
 if ($removePayment == NULL) {

echo <<<_END
<script>
  window.location.href = "team.php";
</script>
_END;

 }
     else
     {
     $removePaymentDue = "UPDATE discipline SET payment = 'no' WHERE teamID=? and username=?";
        
        //execute query and variables
$pdo->prepare($removePaymentDue)->execute([$teamID, $removePayment]);    

echo <<<_END
<script>
  window.location.href = "team.php";
</script>
_END;

     }
 }
      
     
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

<div class=allDisciplineInfo>

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

<div id=teamDisciplinePopup>

    <div id=teamDisciplinePopupTitle>
    <p>discipline</p>
    </div>
    
    <form action="teamDiscipline.php" id="teamDisciplineAddForm" method="post">

    
    <select name="cardType" id="cardType">
      <option value="yellow">yellow</option>
      <option value="red">red</option>
    </select>
    
    <div id=cardTo>
    <p>card to</p>
    </div>
    

_END;

//find all players registered to team
$findRegisteredPlayers = $pdo->prepare('SELECT username FROM register WHERE teamID=? ORDER BY username ASC'); 

//execute query with variables
$findRegisteredPlayers->execute([$teamID]);       
        
$registeredPlayers = $findRegisteredPlayers->fetchAll(); 


print '<select name="teamDisciplineName" id="teamDisciplineName">';
foreach ($registeredPlayers as $row) {
print '<option value="'.$row['username'].'">'.$row['username'].'</option>';
    }
print '</select>';

echo <<<_END


    <div id=suspendedRadio>
    <p>suspended
        <br>
        
        <input type="radio" name="suspended" value="yes"/>yes
      
        <input type="radio" name="suspended" value="no" checked="checked"/>no
        
        </p>
        </div>
        
        <div id=paymentDueRadio>
        <p>payment due
        <br>
        
        <input type="radio" name="paymentDue" value="yes"/>yes
      
        <input type="radio" name="paymentDue" value="no" checked="checked"/>no
        
        </p>
        </div>
    
     
       <div id=addTeamDisciplineButtons>
       <input type='submit' name='addDiscipline' value='add'>
       </div>
       
  </form> 
  
  
  <form action="teamDiscipline.php" id="teamDisciplineRemoveSusspensionForm" method="post">

<div id=removeSuspensionText>
    <p>remove suspension from</p>
    </div>
    

_END;

//find all players suspended
$findSuspendedPlayers = $pdo->prepare('SELECT username FROM discipline WHERE teamID=? and suspended=? ORDER BY username ASC'); 

//execute query with variables
$findSuspendedPlayers->execute([$teamID, yes]);       
        
$suspendedPlayers = $findSuspendedPlayers->fetchAll(); 


print '<select name="RemoveSuspensionName" id="RemoveSuspensionName">';
foreach ($suspendedPlayers as $row) {
print '<option value="'.$row['username'].'">'.$row['username'].'</option>';
    }
print '</select>';

echo <<<_END
 
     
       <div id=RemoveSuspensionTeamDisciplineButtons>
       <input type='submit' name='removeSuspension' value='remove'>
       </div>
       
  </form>   
       
 <form action="teamDiscipline.php" id="teamDisciplineRemovePaymentForm" method="post">

<div id=removePaymentText>
    <p>remove payment from</p>
    </div>
    

_END;

//find all players with payments
$findPaymentPlayers = $pdo->prepare('SELECT username FROM discipline WHERE teamID=? and payment=? ORDER BY username ASC'); 

//execute query with variables
$findPaymentPlayers->execute([$teamID, yes]);       
        
$paymentPlayers = $findPaymentPlayers->fetchAll(); 


print '<select name="RemovePaymentName" id="RemovePaymentName">';
foreach ($paymentPlayers as $row) {
print '<option value="'.$row['username'].'">'.$row['username'].'</option>';
    }
print '</select>';

echo <<<_END
 
     
       <div id=RemovePaymentTeamDisciplineButtons>
       <input type='submit' name='removePayment' value='remove'>
       </div>
       
  </form>       
       

       
       <button type="button" class="cancel">cancel</button>
  

    
    </div>

_END;


}

?>
        
    </body>
</html>
