<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="leaguesCreateAddTeams.css" rel="stylesheet" type="text/css"/>
        
        <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
        

<?php
if(isset($_SESSION['username'], $_POST['leaguesCreateTeamID']))
{

    $teamID    =     $_POST['leaguesCreateTeamID'];
    
     //see if teamID exists
    $doesTeamIDExist = $pdo->prepare('SELECT teamName FROM teams WHERE id=?'); 

//execute query with variables
$doesTeamIDExist->execute([$teamID]);
    
    // if rows=0 add defualt league to table
    if ($doesTeamIDExist->rowCount() > 0)
    {
        
        ($teamNameFound = $doesTeamIDExist->fetchcolumn());

echo <<<_END
<div id=createLeagueFoundTeamName>
<p>$teamNameFound</p>
</div>
_END;

    }
    
    else
        
    {

echo <<<_END
<div id=createLeagueNotFoundTeamName>
<p>this team ID does not exist</p>
</div>
_END;

    }
    
}

   

?>

     </head>

</html>