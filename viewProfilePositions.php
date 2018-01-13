<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="viewProfilePositions.css" rel="stylesheet" type="text/css"/>
        
          <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
        
    <!--link to call jquery file to change football position colours-->
    <script
    src='viewProfileFootballPositionColours.js'>
    </script> 

        
    </head>
    
    <body>
        
<?php
        
if (isset($_SESSION['userProfile']))
    
    {
       $userProfile   = $_SESSION['userProfile'];
  
    
 //find sport of user
$findSport = $pdo->prepare('SELECT primarySport FROM members WHERE username=?'); 

//execute query with variables
$findSport->execute([$userProfile]);  
    
($userSport = $findSport->fetchcolumn());
    

    
    
switch ($userSport) {
        
    case "football":
        
//see if positions exsist
$findPositions = $pdo->prepare('SELECT * FROM positions WHERE username=?'); 

//execute query with variables
$findPositions->execute([$userProfile]);
        
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
$findfootballGK->execute([$userProfile]);  
            
($footballGK = $findfootballGK->fetchcolumn());
            

$findfootballLCB = $pdo->prepare('SELECT footballLCB FROM positions WHERE username=?'); 

//execute query with variables
$findfootballLCB->execute([$userProfile]);  
            
($footballLCB = $findfootballLCB->fetchcolumn());
            
            
$findfootballRCB = $pdo->prepare('SELECT footballRCB FROM positions WHERE username=?'); 

//execute query with variables
$findfootballRCB->execute([$userProfile]);  
            
($footballRCB = $findfootballRCB->fetchcolumn());
            
            
            
$findfootballLB = $pdo->prepare('SELECT footballLB FROM positions WHERE username=?'); 

//execute query with variables
$findfootballLB->execute([$userProfile]);  
            
($footballLB = $findfootballLB->fetchcolumn());
            
            
            
$findfootballLWB = $pdo->prepare('SELECT footballLWB FROM positions WHERE username=?'); 

//execute query with variables
$findfootballLWB->execute([$userProfile]);  
            
($footballLWB = $findfootballLWB->fetchcolumn());
            
            
            
            
$findfootballRB = $pdo->prepare('SELECT footballRB FROM positions WHERE username=?'); 

//execute query with variables
$findfootballRB->execute([$userProfile]);  
            
($footballRB = $findfootballRB->fetchcolumn());
            
            
            
$findfootballRWB = $pdo->prepare('SELECT footballRWB FROM positions WHERE username=?'); 

//execute query with variables
$findfootballRWB->execute([$userProfile]);  
            
($footballRWB = $findfootballRWB->fetchcolumn());
            
            
    
$findfootballLDM = $pdo->prepare('SELECT footballLDM FROM positions WHERE username=?'); 

//execute query with variables
$findfootballLDM->execute([$userProfile]);  
            
($footballLDM = $findfootballLDM->fetchcolumn());
            
            
            

$findfootballRDM = $pdo->prepare('SELECT footballRDM FROM positions WHERE username=?'); 

//execute query with variables
$findfootballRDM->execute([$userProfile]);  
            
($footballRDM = $findfootballRDM->fetchcolumn());
            
            
            
            
            

$findfootballLCM = $pdo->prepare('SELECT footballLCM FROM positions WHERE username=?'); 

//execute query with variables
$findfootballLCM->execute([$userProfile]);  
            
($footballLCM = $findfootballLCM->fetchcolumn());          
            
            
            
    
            
$findfootballRCM = $pdo->prepare('SELECT footballRCM FROM positions WHERE username=?'); 

//execute query with variables
$findfootballRCM->execute([$userProfile]);  
            
($footballRCM = $findfootballRCM->fetchcolumn());   
            
            
            
            
            
$findfootballLM = $pdo->prepare('SELECT footballLM FROM positions WHERE username=?'); 

//execute query with variables
$findfootballLM->execute([$userProfile]);  
            
($footballLM = $findfootballLM->fetchcolumn()); 

            
            
            
$findfootballRM = $pdo->prepare('SELECT footballRM FROM positions WHERE username=?'); 

//execute query with variables
$findfootballRM->execute([$userProfile]);  
            
($footballRM = $findfootballRM->fetchcolumn()); 
            
            
            
$findfootballAM = $pdo->prepare('SELECT footballAM FROM positions WHERE username=?'); 

//execute query with variables
$findfootballAM->execute([$userProfile]);  
            
($footballAM = $findfootballAM->fetchcolumn());    
            
            
            
$findfootballLW = $pdo->prepare('SELECT footballLW FROM positions WHERE username=?'); 

//execute query with variables
$findfootballLW->execute([$userProfile]);  
            
($footballLW = $findfootballLW->fetchcolumn()); 
            
            
            
$findfootballRW = $pdo->prepare('SELECT footballRW FROM positions WHERE username=?'); 

//execute query with variables
$findfootballRW->execute([$userProfile]);  
            
($footballRW = $findfootballRW->fetchcolumn());  
            
            
            
$findfootballCF = $pdo->prepare('SELECT footballCF FROM positions WHERE username=?'); 

//execute query with variables
$findfootballCF->execute([$userProfile]);  
            
($footballCF = $findfootballCF->fetchcolumn());    
            
            
            
$findfootballLF = $pdo->prepare('SELECT footballLF FROM positions WHERE username=?'); 

//execute query with variables
$findfootballLF->execute([$userProfile]);  
            
($footballLF = $findfootballLF->fetchcolumn()); 
            
            
            
$findfootballRF = $pdo->prepare('SELECT footballRF FROM positions WHERE username=?'); 

//execute query with variables
$findfootballRF->execute([$userProfile]);  
            
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

<div id=viewProfilePositionsText>
<p>positions</p>
</div>

<div id=viewProfileWholething>
       
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

<div id=viewProfileFootballGK>
</div>
<div id=viewProfileFootballLCB>
</div>
<div id=viewProfileFootballRCB>
</div>
<div id=viewProfileFootballRB>
</div>
<div id=viewProfileFootballRWB>
</div>
<div id=viewProfileFootballLB>
</div>
<div id=viewProfileFootballLWB>
</div>
<div id=viewProfileFootballLDM>
</div>
<div id=viewProfileFootballRDM>
</div>
<div id=viewProfileFootballLCM>
</div>
<div id=viewProfileFootballRCM>
</div>
<div id=viewProfileFootballRM>
</div>
<div id=viewProfileFootballLM>
</div>
<div id=viewProfileFootballAM>
</div>
<div id=viewProfileFootballLW>
</div>
<div id=viewProfileFootballRW>
</div>
<div id=viewProfileFootballCF>
</div>
<div id=viewProfileFootballLF>
</div>
<div id=viewProfileFootballRF>
</div>

</div>


_END;

        break;
}
}

?>
        
         </body>
</html>