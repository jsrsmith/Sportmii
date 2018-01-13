<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="viewTeamDetails.css" rel="stylesheet" type="text/css"/>
        
          <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

        
    </head>
    
    <body>
        
<?php
        
$teamID   = $_SESSION['teamID'];

//find team name from database
$findTeamName = $pdo->prepare('SELECT teamName FROM teams WHERE id=?'); 

//execute query with variables
$findTeamName->execute([$teamID]);
        
if ($findTeamName->rowCount() == 0)
            {
    
                $teamName =  "";
}
        else   
        {
($teamName = $findTeamName->fetchcolumn());        
        }
        
        
//find stadium from database
$findStadium = $pdo->prepare('SELECT stadium FROM teams WHERE id=?'); 

//execute query with variables
$findStadium->execute([$teamID]);
        
if ($findStadium->rowCount() == 0)
            {
    
                $stadium =  "";
}
        else   
        {
($stadium = $findStadium->fetchcolumn());        
        }
        

//find sponsor from database
$findSponsor = $pdo->prepare('SELECT sponsor FROM teams WHERE id=?'); 

//execute query with variables
$findSponsor->execute([$teamID]);
        
if ($findSponsor->rowCount() == 0)
            {
    
                $sponsor =  "";
}
        else   
        {
($sponsor = $findSponsor->fetchcolumn());        
        }
        
        
//find founded from database
$findFounded = $pdo->prepare('SELECT founded FROM teams WHERE id=?'); 

//execute query with variables
$findFounded->execute([$teamID]);
        
if ($findFounded->rowCount() == 0)
            {
    
                $founded =  "";
}
        else   
        {
($founded = $findFounded->fetchcolumn());        
        }
        
        
        


echo <<<_END

<div id=viewTeamDetailsTitle>
<p>team details</p>
</div>

<div id=allviewTeamDetails>

<div id=viewTeamDetailsTeamNameTitle>
<p>team name:</p>
</div>

<div id=viewTeamDetailsTeamName>
<p>$teamName</p>
</div>

<div id=viewTeamDetailsStadiumTitle>
<p>stadium:</p>
</div>

<div id=viewTeamDetailsStadium>
<p>$stadium</p>
</div>

<div id=viewTeamDetailsSponsorTitle>
<p>sponsor:</p>
</div>

<div id=viewTeamDetailsSponsor>
<p>$sponsor</p>
</div>

<div id=viewTeamDetailsFoundedTitle>
<p>founded:</p>
</div>

<div id=viewTeamDetailsFounded>
<p>$founded</p>
</div>

</div>


_END;

?>
        
    </body>
</html>

