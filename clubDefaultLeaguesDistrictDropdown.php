<?php
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
    src='clubDefaultLeaguesDistrictOnChange.js'>
    </script>
        
    
<?php
     
if (isset($_POST['yearDropdown'], $_POST['sportFromYear']))
{
    
     $yearDropdown  = $_POST['yearDropdown'];
     $sportDropdown = $_POST['sportFromYear'];

$selectDistrictDropdown = $pdo->prepare('SELECT DISTINCT district FROM leagues WHERE sport=? and year=? ORDER BY district'); 

//execute query with variables
$selectDistrictDropdown->execute([$sportDropdown, $yearDropdown]);       
        
$districtDropdown = $selectDistrictDropdown->fetchAll(); 
   
?>

<script type="text/javascript">
    //Assign php generated json to JavaScript variable
    var sportFromDistrict = <?php echo json_encode($sportDropdown); ?>;
    var yearFromDistrict = <?php echo json_encode($yearDropdown); ?>;
</script>
        
<?php

echo <<<_END

<div id=clubDefaultLeaguesDistrictDropdownTitle>
<p>select district</p>
</div>

_END;


print '<select name="clubDefaultLeaguesDistrictDropdownList" id="clubDefaultLeaguesDistrictDropdownList">';
foreach ($districtDropdown as $row) {
print '<option value="'.$row['district'].'">'.$row['district'].'</option>';
    }
print '</select>';

}

?>
     </head>

</html>