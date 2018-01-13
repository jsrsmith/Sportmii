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
    src='teamDefaultLeaguesSportOnChange.js'>
    </script>
        

<?php

$selectSportDropdown = $pdo->prepare('SELECT sport FROM leagues'); 

//execute query with variables
$selectSportDropdown->execute([]);       
        
$sportDropdown = $selectSportDropdown->fetchAll(); 
        

echo <<<_END

<div id=teamDefaultLeaguesSportDropdownTitle>
<p>select sport</p>
</div>

<select name="teamDefaultLeaguesSportDropdownList" id="teamDefaultLeaguesSportDropdownList">
<option value="football">football</option>
</select>

_END;


?>
     </head>

</html>