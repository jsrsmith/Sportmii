<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="clubControl.css" rel="stylesheet" type="text/css"/>
        
          <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
        
    <!--link to call jquery file to bring up positions popup-->
    <script
    src='clubControlPopup.js'>
    </script>     
        
    <!--link to call jquery file to cancel editing positions-->
    <script
    src='clubCancelControlPopup.js'>
    </script> 
        
    </head>
    
    <body>
        
<?php
    
if (isset($_POST['clubControlAddSubmit'], $_SESSION['clubID']))
    
{
    
    $addControl  = $_POST['clubControlAdd'];
    $clubID      = $_SESSION['clubID'];
    $clubIDNoCode   = substr($clubID, 3);
    
//see if user already has control
 $userAlreadInControl = $pdo->prepare('SELECT * FROM clubControl WHERE clubID=? and username=?');

//execute query and variables
$userAlreadInControl->execute([$clubID, $addControl]);  
      

      if ($userAlreadInControl->rowCount() > 0)
      {

echo <<<_END
<script>
  window.location.href = "club.php";
</script>
_END;

      }
    
    else
        
    //see if user created team
    {
        

 $userCreatedTeam = $pdo->prepare('SELECT username FROM clubs WHERE id=? and username=?');

//execute query and variables
$userCreatedTeam->execute([$clubIDNoCode, $addControl]);  
      

      if ($userCreatedTeam->rowCount() > 0)
      {

echo <<<_END
<script>
  window.location.href = "club.php";
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
  window.location.href = "club.php";
</script>
_END;

      }
    
    else
        
    //add user to control
    {
        
//Code for finding club name from clubID  
$findclubNameAddControl = $pdo->prepare('SELECT clubName FROM clubs WHERE id=?'); 

//execute query with variables
$findclubNameAddControl->execute([$clubIDNoCode]);

              
($clubNameAddControl = $findclubNameAddControl->fetchcolumn());  
        
        
        
$insertControl = $pdo->prepare('INSERT INTO clubControl (clubID, clubName, username) VALUES(?, ?, ?)');
        
        //execute query and variables
$insertControl->execute([$clubID, $clubNameAddControl, $addControl]); 

echo <<<_END
<script>
  window.location.href = "club.php";
</script>
_END;

    }
}
}
}
        
        
        
        
if (isset($_POST['clubControlRemove'], $_SESSION['clubID']))
    
{    
    
    $removeControl  = $_POST['clubControlDropdownList'];
    $clubID      = $_SESSION['clubID'];
    
     $deleteUserControl = $pdo->prepare("DELETE FROM clubControl WHERE clubid=? and username=?");

//execute query and variables
$deleteUserControl->execute([$clubID, $removeControl]);  

echo <<<_END
<script>
  window.location.href = "club.php";
</script>
_END;

}

        
        


 if (isset($_SESSION['clubID']))
    
    {
        $clubID   = $_SESSION['clubID'];
        $addControl = "";
        $clubIDNoCode   = substr($clubID, 3);
    
//Code for finding club name from clubID  
$findclubName = $pdo->prepare('SELECT clubName FROM clubs WHERE id=?'); 

//execute query with variables
$findclubName->execute([$clubIDNoCode]);

              
($clubName = $findclubName->fetchcolumn());  
     

//Code for finding club creator  
$findclubCreator = $pdo->prepare('SELECT username FROM clubs WHERE id=?'); 

//execute query with variables
$findclubCreator->execute([$clubIDNoCode]);

              
($clubCreator = $findclubCreator->fetchcolumn());  
     
 
     //find users in control of page
$findUserInControlDropdown = $pdo->prepare('SELECT username FROM clubControl WHERE clubID=?'); 

//execute query with variables
$findUserInControlDropdown->execute([$clubID]);       
        
$clubControlDropdown = $findUserInControlDropdown->fetchAll(); 


echo <<<_END

<div id="clubControlButton">       
<button type="button" class="clubControl">control</button>
</div>

_END;

 }
        


echo <<<_END

 <div id=clubControlPopup>
    
     
     <div id=clubControlTitle>
     <p>control of $clubName</p>
     </div>

<div id=clubControlOutsideBox>

<div id=clubControlCreatorTitle>
<p>club creator</p>
</div>

<div id=clubControlCreator>
<p>$clubCreator</p>
</div>

<div id=clubControlCreatorExplanation>
<p>*the clubs creator cannot be removed from team control</p>
</div>


 <form action="clubControl.php" method="post" id="clubControlRemoveForm">

<div id=clubControlRemoveExplanation>
<p>Select a user from the dropdown below and click remove<br>user to take away thier control of this clubs page.</p>
</div>

<div id=clubControlRemoveWarning>
<p>*WARNING: clicking remove on your own name WILL<br>remove you from the clubs controls*</p>
</div>

_END;


print '<select name="clubControlDropdownList" id="clubControlDropdownList">';
foreach ($clubControlDropdown as $row) {
print '<option value="'.$row['username'].'">'.$row['username'].'</option>';
    }
print '</select>';

        

echo <<<_END

<input type="submit" name="clubControlRemove" value="remove user" id="clubControlRemove" />

</form>


<form action="clubControl.php" method="post" id="clubControlAddForm">

<div id=clubControlAddExplanation>
<p>type a username into the following field to give that<br>user controls over the page</p>
</div>

<input type="text" name="clubControlAdd" id="clubControlAdd" value='$addControl'>

<input type="submit" name="clubControlAddSubmit" value="add user" id="clubControlAddSubmit" />

</form>

    
    <div id=clubCancelControl>
     <button type="button" class="cancelControl">cancel</button>
    </div>
        
    </div>    

    </div> 


_END;

?>

    </body>
</html>

