<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="ProfilePositions.css" rel="stylesheet" type="text/css"/>
        
          <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
         <!--link to call jquery file to bring up positions popup-->
    <script
    src='positionsPopup.js'>
    </script>     
        
    <!--link to call jquery file to cancel editing positions-->
    <script
    src='cancelPositionsPopup.js'>
    </script> 
        
    <!--link to call jquery file to change football position colours-->
    <script
    src='footballPositionColours.js'>
    </script> 

        
    </head>
    
    <body>
        
<?php
        
        
//if football edit is pressed
 if (isset ($_POST['savePositions']))
     
 {     
     
     switch ($primarysport) {
        
    case "football":
        
            $footballGK      = $_POST['footballGKDropdown'];
            $footballLCB     = $_POST['footballLCBDropdown'];
            $footballRCB     = $_POST['footballRCBDropdown'];
            $footballLB      = $_POST['footballLBDropdown'];
            $footballLWB     = $_POST['footballLWBDropdown'];
            $footballRB      = $_POST['footballRBDropdown'];
            $footballRWB     = $_POST['footballRWBDropdown'];
            $footballLDM     = $_POST['footballLDMDropdown'];
            $footballRDM     = $_POST['footballRDMDropdown'];
            $footballLCM     = $_POST['footballLCMDropdown'];
            $footballRCM     = $_POST['footballRCMDropdown'];
            $footballLM      = $_POST['footballLMDropdown'];
            $footballRM      = $_POST['footballRMDropdown'];
            $footballAM      = $_POST['footballAMDropdown'];
            $footballLW      = $_POST['footballLWDropdown'];
            $footballRW      = $_POST['footballRWDropdown'];
            $footballCF      = $_POST['footballCFDropdown'];
            $footballLF      = $_POST['footballLFDropdown'];
            $footballRF      = $_POST['footballRFDropdown'];
             
             
             //see if positions exsist
$findPositions = $pdo->prepare('SELECT * FROM positions WHERE username=?'); 

//execute query with variables
$findPositions->execute([$username]);
        
if ($findPositions->rowCount() == 0)
            {
             
             
            $insertPositions = $pdo->prepare('INSERT INTO positions (footballGK, footballLCB, footballRCB, footballLB, footballLWB, footballRB, footballRWB, footballLDM, footballRDM, footballLCM, footballRCM, footballLM, footballRM, footballAM, footballLW, footballRW, footballCF, footballLF, footballRF, username) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

//execute query and variables
$insertPositions->execute([$footballGK, $footballLCB, $footballRCB, $footballLB, $footballLWB, $footballRB, $footballRWB, $footballLDM, $footballRDM, $footballLCM, $footballRCM, $footballLM, $footballRM, $footballAM, $footballLW, $footballRW, $footballCF, $footballLF, $footballRF, $username]);   
     }

        else   
        {   
            
            $updatePositions = "UPDATE positions SET footballGK=?, footballLCB=?, footballRCB=?, footballLB=?, footballLWB=?, footballRB=?, footballRWB=?, footballLDM=?, footballRDM=?, footballLCM=?, footballRCM=?, footballLM=?, footballRM=?, footballAM=?, footballLW=?, footballRW=?, footballCF=?, footballLF=?, footballRF=? WHERE username=?";
        
        //execute query and variables
$pdo->prepare($updatePositions)->execute([$footballGK, $footballLCB, $footballRCB, $footballLB, $footballLWB, $footballRB, $footballRWB, $footballLDM, $footballRDM, $footballLCM, $footballRCM, $footballLM, $footballRM, $footballAM, $footballLW, $footballRW, $footballCF, $footballLF, $footballRF, $username]);
            
        }
            
echo <<<_END
<script>
  window.location.href = "profile.php";
</script>
_END;
 
            
        
           break;
} 
        
 }
        
        
    
        
        
        
        
switch ($primarysport) {
        
    case "football":
        
//see if positions exsist
$findPositions = $pdo->prepare('SELECT * FROM positions WHERE username=?'); 

//execute query with variables
$findPositions->execute([$username]);
        
if ($findPositions->rowCount() == 0)
            {
    
            $footballGK      = "0";
            $footballLCB     = "0";
            $footballRCB     = "0";
            $footballLB      = "0";
            $footballLWB     = "0";
            $footballRB      = "0";
            $footballRWB     = "0";
            $footballLDM     = "0";
            $footballRDM     = "0";
            $footballLCM     = "0";
            $footballRCM     = "0";
            $footballLM      = "0";
            $footballRM      = "0";
            $footballAM      = "0";
            $footballLW      = "0";
            $footballRW      = "0";
            $footballCF      = "0";
            $footballLF      = "0";
            $footballRF      = "0";
    
}

        else   
        {
            
$findfootballGK = $pdo->prepare('SELECT footballGK FROM positions WHERE username=?'); 

//execute query with variables
$findfootballGK->execute([$username]);  
            
($footballGK = $findfootballGK->fetchcolumn());
            

$findfootballLCB = $pdo->prepare('SELECT footballLCB FROM positions WHERE username=?'); 

//execute query with variables
$findfootballLCB->execute([$username]);  
            
($footballLCB = $findfootballLCB->fetchcolumn());
            
            
$findfootballRCB = $pdo->prepare('SELECT footballRCB FROM positions WHERE username=?'); 

//execute query with variables
$findfootballRCB->execute([$username]);  
            
($footballRCB = $findfootballRCB->fetchcolumn());
            
            
            
$findfootballLB = $pdo->prepare('SELECT footballLB FROM positions WHERE username=?'); 

//execute query with variables
$findfootballLB->execute([$username]);  
            
($footballLB = $findfootballLB->fetchcolumn());
            
            
            
$findfootballLWB = $pdo->prepare('SELECT footballLWB FROM positions WHERE username=?'); 

//execute query with variables
$findfootballLWB->execute([$username]);  
            
($footballLWB = $findfootballLWB->fetchcolumn());
            
            
            
            
$findfootballRB = $pdo->prepare('SELECT footballRB FROM positions WHERE username=?'); 

//execute query with variables
$findfootballRB->execute([$username]);  
            
($footballRB = $findfootballRB->fetchcolumn());
            
            
            
$findfootballRWB = $pdo->prepare('SELECT footballRWB FROM positions WHERE username=?'); 

//execute query with variables
$findfootballRWB->execute([$username]);  
            
($footballRWB = $findfootballRWB->fetchcolumn());
            
            
    
$findfootballLDM = $pdo->prepare('SELECT footballLDM FROM positions WHERE username=?'); 

//execute query with variables
$findfootballLDM->execute([$username]);  
            
($footballLDM = $findfootballLDM->fetchcolumn());
            
            
            

$findfootballRDM = $pdo->prepare('SELECT footballRDM FROM positions WHERE username=?'); 

//execute query with variables
$findfootballRDM->execute([$username]);  
            
($footballRDM = $findfootballRDM->fetchcolumn());
            
            
            
            
            

$findfootballLCM = $pdo->prepare('SELECT footballLCM FROM positions WHERE username=?'); 

//execute query with variables
$findfootballLCM->execute([$username]);  
            
($footballLCM = $findfootballLCM->fetchcolumn());          
            
            
            
    
            
$findfootballRCM = $pdo->prepare('SELECT footballRCM FROM positions WHERE username=?'); 

//execute query with variables
$findfootballRCM->execute([$username]);  
            
($footballRCM = $findfootballRCM->fetchcolumn());   
            
            
            
            
            
$findfootballLM = $pdo->prepare('SELECT footballLM FROM positions WHERE username=?'); 

//execute query with variables
$findfootballLM->execute([$username]);  
            
($footballLM = $findfootballLM->fetchcolumn()); 

            
            
            
$findfootballRM = $pdo->prepare('SELECT footballRM FROM positions WHERE username=?'); 

//execute query with variables
$findfootballRM->execute([$username]);  
            
($footballRM = $findfootballRM->fetchcolumn()); 
            
            
            
$findfootballAM = $pdo->prepare('SELECT footballAM FROM positions WHERE username=?'); 

//execute query with variables
$findfootballAM->execute([$username]);  
            
($footballAM = $findfootballAM->fetchcolumn());    
            
            
            
$findfootballLW = $pdo->prepare('SELECT footballLW FROM positions WHERE username=?'); 

//execute query with variables
$findfootballLW->execute([$username]);  
            
($footballLW = $findfootballLW->fetchcolumn()); 
            
            
            
$findfootballRW = $pdo->prepare('SELECT footballRW FROM positions WHERE username=?'); 

//execute query with variables
$findfootballRW->execute([$username]);  
            
($footballRW = $findfootballRW->fetchcolumn());  
            
            
            
$findfootballCF = $pdo->prepare('SELECT footballCF FROM positions WHERE username=?'); 

//execute query with variables
$findfootballCF->execute([$username]);  
            
($footballCF = $findfootballCF->fetchcolumn());    
            
            
            
$findfootballLF = $pdo->prepare('SELECT footballLF FROM positions WHERE username=?'); 

//execute query with variables
$findfootballLF->execute([$username]);  
            
($footballLF = $findfootballLF->fetchcolumn()); 
            
            
            
$findfootballRF = $pdo->prepare('SELECT footballRF FROM positions WHERE username=?'); 

//execute query with variables
$findfootballRF->execute([$username]);  
            
($footballRF = $findfootballRF->fetchcolumn()); 
            
        }
            
            ?>
       
<script type="text/javascript"> 
    //Assign php generated json to JavaScript variable
    var footballGK  = <?php echo json_encode($footballGK); ?>;
    var footballLCB = <?php echo json_encode($footballLCB); ?>;
    var footballRCB = <?php echo json_encode($footballRCB); ?>;
    var footballLB  = <?php echo json_encode($footballLB); ?>;
    var footballLWB = <?php echo json_encode($footballLWB); ?>;
    var footballRB  = <?php echo json_encode($footballRB); ?>;
    var footballRWB = <?php echo json_encode($footballRWB); ?>;
    var footballLDM = <?php echo json_encode($footballLDM); ?>;
    var footballRDM = <?php echo json_encode($footballRDM); ?>;
    var footballLCM = <?php echo json_encode($footballLCM); ?>;
    var footballRCM = <?php echo json_encode($footballRCM); ?>;
    var footballLM  = <?php echo json_encode($footballLM); ?>;
    var footballRM  = <?php echo json_encode($footballRM); ?>;
    var footballAM  = <?php echo json_encode($footballAM); ?>;
    var footballLW  = <?php echo json_encode($footballLW); ?>;
    var footballRW  = <?php echo json_encode($footballRW); ?>;
    var footballCF  = <?php echo json_encode($footballCF); ?>;
    var footballLF  = <?php echo json_encode($footballLF); ?>;
    var footballRF  = <?php echo json_encode($footballRF); ?>;
</script>

<?php  
            
        
        
        

echo <<<_END

<div id=positionsText>
<p>positions</p>
</div>

<div id=wholething>
       
<div class="wholePitch">
  <div class="corner">
    <div class="corner1"></div>
    <div class="corner2"></div>
  </div>
  <div class="semi1"></div>
  <div class="semi2"></div>
  <div class="halfWayLine"></div>
  <div class="penaltyBox"></div>
  <div class="penalty"></div>
</div>

<div id=footballGK>
</div>
<div id=footballLCB>
</div>
<div id=footballRCB>
</div>
<div id=footballRB>
</div>
<div id=footballRWB>
</div>
<div id=footballLB>
</div>
<div id=footballLWB>
</div>
<div id=footballLDM>
</div>
<div id=footballRDM>
</div>
<div id=footballLCM>
</div>
<div id=footballRCM>
</div>
<div id=footballRM>
</div>
<div id=footballLM>
</div>
<div id=footballAM>
</div>
<div id=footballLW>
</div>
<div id=footballRW>
</div>
<div id=footballCF>
</div>
<div id=footballLF>
</div>
<div id=footballRF>
</div>

</div>





 <div id=positionsPopup>
    
    <form action="profilePositions.php" id="positionsForm" method="post">
    
    <div id=positionsPopupTitle>
    <p>positions</p>
    </div>
    
    <div id=positionExplanation>
    <p>select a postion ranking from the dropdowns below. each postion has a ranking from 0-4.<br><strong>0 = never play here</strong> 1 = rarely play here <strong>2 = occasionaly play here</strong> 3 = often play here <strong>4 = natural position</strong>
    </div>
    
    <div id=positionLabelAndDropdown>
    
    <div id=positionLabel>
    
    <p>goal keeper<br>left center back<br>right center back<br>left back<br>left wing back<br>right back<br>right wing back<br>left center defensive midfield<br>right center defensive midfield<br>left center midfield<br>right center midfield<br>left midfield<br>right midfield<br>center attacking midfield<br>left wing<br>right wing<br>center forward/striker<br>left forward<br>right forward
    
    </div>
    
    
    <div id=positionDropdown>
    
    <br>
    <br>
  
    <select name="footballGKDropdown" id="footballGKDropdown">
      <option value="$footballGK">$footballGK</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      
      </select>
      
      <br>
      <br>
  
    <select name="footballLCBDropdown" id="footballLCBDropdown">
      <option value="$footballLCB">$footballLCB</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      
      </select>
      
       <br>
       <br>
  
    <select name="footballRCBDropdown" id="footballRCBDropdown">
      <option value="$footballRCB">$footballRCB</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      
      </select>
      
       <br>
       <br>
  
    <select name="footballLBDropdown" id="footballLBDropdown">
      <option value="$footballLB">$footballLB</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      
      </select>
      
       <br>
       <br>
  
    <select name="footballLWBDropdown" id="footballLWBDropdown">
      <option value="$footballLWB">$footballLWB</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      
      </select>
      
       <br>
       <br>
  
    <select name="footballRBDropdown" id="footballRBDropdown">
      <option value="$footballRB">$footballRB</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      
      </select>
      
       <br>
       <br>
  
    <select name="footballRWBDropdown" id="footballRWBDropdown">
      <option value="$footballRWB">$footballRWB</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      
      </select>
      
       <br>
       <br>
  
    <select name="footballLDMDropdown" id="footballLDMDropdown">
      <option value="$footballLDM">$footballLDM</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      
      </select>
      
       <br>
       <br>
  
    <select name="footballRDMDropdown" id="footballRDMDropdown">
      <option value="$footballRDM">$footballRDM</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      
      </select>
      
       <br>
       <br>
  
    <select name="footballLCMDropdown" id="footballLCMDropdown">
      <option value="$footballLCM">$footballLCM</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      
      </select>
      
       <br>
       <br>
  
    <select name="footballRCMDropdown" id="footballRCMDropdown">
      <option value="$footballRCM">$footballRCM</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      
      </select>
      
       <br>
       <br>
  
    <select name="footballLMDropdown" id="footballLMDropdown">
      <option value="$footballLM">$footballLM</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      
      </select>
      
       <br>
       <br>
  
    <select name="footballRMDropdown" id="footballRMDropdown">
      <option value="$footballRM">$footballRM</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      
      </select>
      
       <br>
       <br>
  
    <select name="footballAMDropdown" id="footballAMDropdown">
      <option value="$footballAM">$footballAM</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      
      </select>
      
       <br>
       <br>
  
    <select name="footballLWDropdown" id="footballLWDropdown">
      <option value="$footballLW">$footballLW</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      
      </select>
      
       <br>
       <br>
      
        <select name="footballRWDropdown" id="footballRWDropdown">
      <option value="$footballRW">$footballRW</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      
      </select>
      
       <br>
       <br>
      
        <select name="footballCFDropdown" id="footballCFDropdown">
      <option value="$footballCF">$footballCF</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      
      </select>
      
       <br>
       <br>
      
        <select name="footballLFDropdown" id="footballLFDropdown">
      <option value="$footballLF">$footballLF</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      
      </select>
      
       <br>
       <br>
      
        <select name="footballRFDropdown" id="footballRFDropdown">
      <option value="$footballRF">$footballRF</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      
      </select>
      
      
        </div>
                </div>

    
    
    
       
       <div id=editPositionsButtons>
       <input type='submit' name='savePositions' value='Save'><button type="button" class="cancel">cancel</button>
       </div>
       
       
    </form>
    
    </div>
    

_END;

        break;
}

?>