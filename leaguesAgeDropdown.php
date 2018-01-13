<?php
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
        
    <!--link to call jquery file to cancel editing an event-->
    <script
    src='leaguesAgeOnChange.js'>
    </script>
        
    
<?php

if (isset($_POST['districtDropdown'], $_POST['sportFromDistrict'], $_POST['yearFromDistrict']))
{

     $districtDropdown  = $_POST['districtDropdown'];
     $sportDropdown     = $_POST['sportFromDistrict'];
     $yearDropdown      = $_POST['yearFromDistrict'];
    
    
$selectAgeDropdown = $pdo->prepare('SELECT DISTINCT age FROM leagues WHERE sport=? and year=? and district=? ORDER BY age'); 

//execute query with variables
$selectAgeDropdown->execute([$sportDropdown, $yearDropdown, $districtDropdown]);       
        
$ageDropdown = $selectAgeDropdown->fetchAll(); 
   
?>

<script type="text/javascript">
    //Assign php generated json to JavaScript variable
    var sportFromAge = <?php echo json_encode($sportDropdown); ?>;
    var yearFromAge = <?php echo json_encode($yearDropdown); ?>;
    var districtFromAge = <?php echo json_encode($districtDropdown); ?>;
</script>
        
<?php

echo <<<_END

<div id=leaguesAgeDropdownTitle>
<p>select age group</p>
</div>

_END;


print '<select name="leaguesAgeDropdownList" id="leaguesAgeDropdownList">';
foreach ($ageDropdown as $row) {
print '<option value="'.$row['age'].'">'.$row['age'].'</option>';
    }
print '</select>';
}

?>
     </head>

</html>