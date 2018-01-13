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
if (isset($_POST['fixturesResultsSearchAmateurSubmit']))
{
    
    // declare all variables
    $leagueSport      = $_POST['fixturesResultsHiddenSport'];
    $leagueYear       = $_POST['fixturesResultsHiddenYear'];
    $leagueDistrict   = $_POST['fixturesResultsHiddenDistrict'];
    $leagueAge        = $_POST['fixturesResultsHiddenAge'];
    $leagueDivision   = $_POST['fixturesResultsDivisionDropdownList'];
    
    $leagueChoice  =  "$leagueSport $leagueYear $leagueDistrict $leagueAge $leagueDivision";
    
     $_SESSION['leagueChoice'] = $leagueChoice;
    

echo <<<_END
<script>
  window.location.href = "fixturesResults.php";
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

<form method='post' action='fixturesResultsDivisionDropdown.php' id="fixturesResultsSearchAmateurLeagueForm">

<div id=fixturesResultsDivisionDropdownTitle>
<p>select division</p>
</div>

_END;


print '<select name="fixturesResultsDivisionDropdownList" id="fixturesResultsDivisionDropdownList">';
foreach ($divisionDropdown as $row) {
print '<option value="'.$row['division'].'">'.$row['division'].'</option>';
    }
print '</select>';
}

echo <<<_END

<input type="hidden" name="fixturesResultsHiddenSport" value="$sportDropdown">

<input type="hidden" name="fixturesResultsHiddenYear" value="$yearDropdown">

<input type="hidden" name="fixturesResultsHiddenDistrict" value="$districtDropdown">

<input type="hidden" name="fixturesResultsHiddenAge" value="$ageDropdown">

<input type='submit' name='fixturesResultsSearchAmateurSubmit' id='fixturesResultsSearchAmateurSubmit' value='GO!'>


</form>

_END;

?>
     </head>

</html>