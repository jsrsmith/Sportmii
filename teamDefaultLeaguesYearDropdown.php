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
    src='teamDefaultLeaguesYearOnChange.js'>
    </script>
        
    
<?php
       
if (isset($_POST['sportDropdown']))
{
    
     $sportDropdown = $_POST['sportDropdown'];

$selectYearDropdown = $pdo->prepare('SELECT DISTINCT year FROM leagues WHERE sport=? ORDER BY year DESC'); 

//execute query with variables
$selectYearDropdown->execute([$sportDropdown]);       
        
$yearDropdown = $selectYearDropdown->fetchAll(); 
    
?>
    
<script type="text/javascript">
    //Assign php generated json to JavaScript variable
    var sportFromYear = <?php echo json_encode($sportDropdown); ?>;
</script>
        
<?php

echo <<<_END

<div id=teamDefaultLeaguesYearDropdownTitle>
<p>select year</p>
</div>

_END;


print '<select name="teamDefaultLeaguesYearDropdownList" id="teamDefaultLeaguesYearDropdownList">';
foreach ($yearDropdown as $row) {
print '<option value="'.$row['year'].'">'.$row['year'].'</option>';
    }
print '</select>';

}
?>
     </head>

</html>