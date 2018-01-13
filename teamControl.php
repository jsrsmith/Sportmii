<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="teamControl.css" rel="stylesheet" type="text/css"/>
        
          <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
        
    <!--link to call jquery file to bring up positions popup-->
    <script
    src='teamControlPopup.js'>
    </script>     
        
    <!--link to call jquery file to cancel editing positions-->
    <script
    src='teamCancelControlPopup.js'>
    </script> 
        
    </head>
    
    <body>
        
<?php
    
if (isset($_POST['teamControlAddSubmit'], $_SESSION['teamID']))
    
{
    
    $addControl  = $_POST['teamControlAdd'];
    $teamID      = $_SESSION['teamID'];
    
//see if user already has control
 $userAlreadInControl = $pdo->prepare('SELECT * FROM teamControl WHERE teamID=? and username=?');

//execute query and variables
$userAlreadInControl->execute([$teamID, $addControl]);  
      

      if ($userAlreadInControl->rowCount() > 0)
      {

echo <<<_END
<script>
  window.location.href = "team.php";
</script>
_END;

      }
    
    else
        
    //see if user created team
    {
        

 $userCreatedTeam = $pdo->prepare('SELECT username FROM teams WHERE id=? and username=?');

//execute query and variables
$userCreatedTeam->execute([$teamID, $addControl]);  
      

      if ($userCreatedTeam->rowCount() > 0)
      {

echo <<<_END
<script>
  window.location.href = "team.php";
</script>
_END;

      }
    
    else
        
    {  
//see if user exists
 $userExsists = $pdo->prepare('SELECT username FROM members WHERE username=?');

//execute query and variables
$userExsists->execute([$addControl]);  
      

      if ($userExsists->rowCount() == 0)
      {

echo <<<_END
<script>
  window.location.href = "team.php";
</script>
_END;

      }
    
    else
        
    //add user to control
    {
        
//Code for finding team name from teamID  
$findTeamNameAddControl = $pdo->prepare('SELECT teamName FROM teams WHERE id=?'); 

//execute query with variables
$findTeamNameAddControl->execute([$teamID]);

              
($teamNameAddControl = $findTeamNameAddControl->fetchcolumn());  
        
        
        
$insertControl = $pdo->prepare('INSERT INTO teamControl (teamID, teamName, username) VALUES(?, ?, ?)');
        
        //execute query and variables
$insertControl->execute([$teamID, $teamNameAddControl, $addControl]); 

echo <<<_END
<script>
  window.location.href = "team.php";
</script>
_END;

    }
}
}
}
        
        
        
        
if (isset($_POST['teamControlRemove'], $_SESSION['teamID']))
    
{    
    
    $removeControl  = $_POST['teamControlDropdownList'];
    $teamID      = $_SESSION['teamID'];
    
     $deleteUserControl = $pdo->prepare("DELETE FROM teamControl WHERE teamid=? and username=?");

//execute query and variables
$deleteUserControl->execute([$teamID, $removeControl]);  

echo <<<_END
<script>
  window.location.href = "team.php";
</script>
_END;

}

        
        


 if (isset($_SESSION['teamID']))
    
    {
        $teamID   = $_SESSION['teamID'];
        $addControl = "";
    
//Code for finding team name from teamID  
$findTeamName = $pdo->prepare('SELECT teamName FROM teams WHERE id=?'); 

//execute query with variables
$findTeamName->execute([$teamID]);

              
($teamName = $findTeamName->fetchcolumn());  
     

//Code for finding team creator  
$findTeamCreator = $pdo->prepare('SELECT username FROM teams WHERE id=?'); 

//execute query with variables
$findTeamCreator->execute([$teamID]);

              
($teamCreator = $findTeamCreator->fetchcolumn());  
     
 
     //find users in control of page
$findUserInControlDropdown = $pdo->prepare('SELECT username FROM teamControl WHERE teamID=?'); 

//execute query with variables
$findUserInControlDropdown->execute([$teamID]);       
        
$teamControlDropdown = $findUserInControlDropdown->fetchAll(); 


echo <<<_END

<div id="teamControlButton">       
<button type="button" class="teamControl">control</button>
</div>

_END;

 }
        


echo <<<_END

 <div id=teamControlPopup>
    
     
     <div id=teamControlTitle>
     <p>control of $teamName</p>
     </div>
     


<div id=teamControlOutsideBox>

<div id=teamControlCreatorTitle>
<p>team creator</p>
</div>

<div id=teamControlCreator>
<p>$teamCreator</p>
</div>

<div id=teamControlCreatorExplanation>
<p>*the teams creator cannot be removed from team control</p>
</div>


 <form action="teamControl.php" method="post" id="teamControlRemoveForm">

<div id=teamControlRemoveExplanation>
<p>Select a user from the dropdown below and click remove<br>user to take away thier control of this teams page.</p>
</div>

<div id=teamControlRemoveWarning>
<p>*WARNING: clicking remove on your own name WILL<br>remove you from the teams controls*</p>
</div>

_END;


print '<select name="teamControlDropdownList" id="teamControlDropdownList">';
foreach ($teamControlDropdown as $row) {
print '<option value="'.$row['username'].'">'.$row['username'].'</option>';
    }
print '</select>';

        

echo <<<_END

<input type="submit" name="teamControlRemove" value="remove user" id="teamControlRemove" />

</form>


<form action="teamControl.php" method="post" id="teamControlAddForm">

<div id=teamControlAddExplanation>
<p>type a username into the following field to give that<br>user controls over the page</p>
</div>

<input type="text" name="teamControlAdd" id="teamControlAdd" value='$addControl'>

<input type="submit" name="teamControlAddSubmit" value="add user" id="teamControlAddSubmit" />

</form>

    
    <div id=teamCancelControl>
     <button type="button" class="cancelControl">cancel</button>
    </div>
        
    </div>    

    </div> 


_END;

?>

    </body>
</html>

