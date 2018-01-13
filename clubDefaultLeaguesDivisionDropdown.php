<?php
  if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'header.php';
?>

<html>
    <head>
        
        
        <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
    
<?php
        
$leagueChoice = "";
    
//if go is pressed
if (isset($_POST['clubDefaultLeaguesSearchAmateurSubmit'], $_SESSION['clubID']))
{
    
    $clubID = $_SESSION['clubID'];
    $clubIDNoCode   = substr($clubID, 3);
    
    // declare all variables
    $leagueSport      = $_POST['clubDefaultLeaguesHiddenSport'];
    $leagueYear       = $_POST['clubDefaultLeaguesHiddenYear'];
    $leagueDistrict   = $_POST['clubDefaultLeaguesHiddenDistrict'];
    $leagueAge        = $_POST['clubDefaultLeaguesHiddenAge'];
    $leagueDivision   = $_POST['clubDefaultLeaguesDivisionDropdownList'];
    
    $leagueChoice  =  "$leagueSport $leagueYear $leagueDistrict $leagueAge $leagueDivision";


//see if username already has a default league
    $defaultAlready = $pdo->prepare('SELECT username FROM defaultLeagues WHERE username=?'); 

//execute query with variables
$defaultAlready->execute([$clubID]);
    
    // if rows=0 add defualt league to table
    if ($defaultAlready->rowCount() == 0)
    {
    
    $userDefault = $pdo->prepare('INSERT INTO defaultLeagues (league, username) VALUES(?, ?)');
        
        //execute query and variables
$userDefault->execute([$leagueChoice, $clubID]);
    }
    
    //update table to new defualt
    else
    {
       
        $updateDefaultLeague = "UPDATE defaultLeagues SET league=? WHERE username=?";
        
        //execute query and variables
$pdo->prepare($updateDefaultLeague)->execute([$leagueChoice, $clubID]);
        
    }
 
//delete from defaultTeam as league has changed
$deletedefaultTeam = $pdo->prepare("DELETE FROM defaultTeams WHERE username=?");

//execute query and variables
$deletedefaultTeam->execute([$clubID]); 
    


echo <<<_END
<script>
  window.location.href = "club.php";
</script>
_END;


}    
        


if (isset($_POST['ageDropdown'], $_POST['sportFromAge'], $_POST['yearFromAge'], $_POST['districtFromAge']))
{

     $ageDropdown        = $_POST['ageDropdown'];
     $sportDropdown      = $_POST['sportFromAge'];
     $yearDropdown       = $_POST['yearFromAge'];
     $districtDropdown   = $_POST['districtFromAge'];
    
    
$selectDivisionDropdown = $pdo->prepare('SELECT DISTINCT division FROM leagues WHERE sport=? and year=? and district=? and age=? ORDER BY division'); 

//execute query with variables
$selectDivisionDropdown->execute([$sportDropdown, $yearDropdown, $districtDropdown, $ageDropdown]);       
        
$divisionDropdown = $selectDivisionDropdown->fetchAll(); 


echo <<<_END

<form method='post' action='clubDefaultLeaguesDivisionDropdown.php' id="clubDefaultLeaguessearchAmateurLeagueForm">

<div id=clubDefaultLeaguesDivisionDropdownTitle>
<p>select division</p>
</div>

_END;


print '<select name="clubDefaultLeaguesDivisionDropdownList" id="clubDefaultLeaguesDivisionDropdownList">';
foreach ($divisionDropdown as $row) {
print '<option value="'.$row['division'].'">'.$row['division'].'</option>';
    }
print '</select>';


echo <<<_END

<input type="hidden" name="clubDefaultLeaguesHiddenSport" value="$sportDropdown">

<input type="hidden" name="clubDefaultLeaguesHiddenYear" value="$yearDropdown">

<input type="hidden" name="clubDefaultLeaguesHiddenDistrict" value="$districtDropdown">

<input type="hidden" name="clubDefaultLeaguesHiddenAge" value="$ageDropdown">

<input type='submit' name='clubDefaultLeaguesSearchAmateurSubmit' id='clubDefaultLeaguesSearchAmateurSubmit' value='accept'>


</form>

_END;
}

?>
     </head>

</html>