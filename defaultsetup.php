<?php //default setup of navigation bar

 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'header.php';

if (!$loggedin) die();
?>

<html>

<head>
 
<?php
    
echo <<<_END


    <title>
    sportmii - $firstname
    </title>
      
_END;

?>
    
      <!-- little image next to sportmii on tab-->
       <link rel="shortcut icon" type="image/png" href="images/sportmii%20logo%20smaller.png">
        
    <!--link to CSS-->
        <link
        rel="stylesheet" type="text/css" href="defaultsetup.css">
    
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    
    <!--link to call jquery file to bring up teams on hover-->
    <script
    src='defaultSetupTeamsList.js'>
    </script>
    
    <!--link to call jquery file to bring up teams on hover-->
    <script
    src='defaultSetupClubsList.js'>
    </script>

 
    
    </head>
    
<body>
<?php
    
    
if (isset($_POST['searchBox']))
{ 
    $unknownProfile = ($_POST['searchBox']);
  
 //see if list choice is a username, if not navigate to teams
$isUnknownAUsername = $pdo->prepare('SELECT username FROM members WHERE username=?'); 

//execute query with variables
$isUnknownAUsername->execute([$unknownProfile]);   
        
    if ($isUnknownAUsername->rowCount() == 0)
    {
     
     //see if list choice is a teamName, if not navigate to teams
$isUnknownATeamName = $pdo->prepare('SELECT teamName FROM teams WHERE teamName=?'); 

//execute query with variables
$isUnknownATeamName->execute([$unknownProfile]);  
     
        if ($isUnknownATeamName->rowCount() == 0)
    {
     
     //see if list choice is a teamName, if not navigate to temas
$isUnknownAClubName = $pdo->prepare('SELECT clubName FROM clubs WHERE clubName=?'); 

//execute query with variables
$isUnknownAClubName->execute([$unknownProfile]);
            
         ($clubName = $isUnknownAClubName->fetchcolumn());
            
    //find clubID from club name
$findClubID = $pdo->prepare('SELECT ID FROM clubs WHERE clubName=?'); 

//execute query with variables
$findClubID->execute([$clubName]);
            
($clubIDNumber = $findClubID->fetchcolumn());
            
$clubCode = "CL-";
$clubID   = "$clubCode$clubIDNumber";
            
        $_SESSION['clubID']   =   $clubID;

echo <<<_END
<script>
  window.location.href = "viewClub.php";
</script>
_END;

            
 } 
      
        else
        {
            ($teamName = $isUnknownATeamName->fetchcolumn());  
            
 //find teamID from team name
$findTeamID = $pdo->prepare('SELECT ID FROM teams WHERE teamName=?'); 

//execute query with variables
$findTeamID->execute([$teamName]);
            
($teamID = $findTeamID->fetchcolumn());

            
        $_SESSION['teamID']   =  $teamID;

echo <<<_END
<script>
  window.location.href = "viewTeam.php";
</script>
_END;

    } 
 }
    
    else
        {
        $_SESSION['userProfile']     =     $unknownProfile;

echo <<<_END
<script>
  window.location.href = "viewProfile.php";
</script>
_END;

   }     
}
    
    
// if teams navigation button is pressed find correct ID
else if (isset($_POST['teamChoice']))
    {
        
     $teamName = ($_POST['teamChoice']);
        
//find teamID from team name
$findTeamID = $pdo->prepare('SELECT ID FROM teams WHERE teamName=?'); 

//execute query with variables
$findTeamID->execute([$teamName]);
            
($teamID = $findTeamID->fetchcolumn());

            
        $_SESSION['teamID']   =  $teamID;

echo <<<_END
<script>
  window.location.href = "viewTeam.php";
</script>
_END;

    }
    
    
// if clubs navigation button is pressed find correct ID
else if (isset($_POST['clubChoice']))
    {
        
     $clubName = ($_POST['clubChoice']);
        
 //find clubID from club name
$findClubID = $pdo->prepare('SELECT ID FROM clubs WHERE clubName=?'); 

//execute query with variables
$findClubID->execute([$clubName]);
            
($clubIDNumber = $findClubID->fetchcolumn());
            
$clubCode = "CL-";
$clubID   = "$clubCode$clubIDNumber";
            
        $_SESSION['clubID']   =   $clubID;


echo <<<_END
<script>
  window.location.href = "viewClub.php";
</script>
_END;

    }
    
    
    
// start of default setup without form submit
    
// query to find usernames for the search bar
  $userSearch = $pdo->prepare("SELECT username FROM members");


  $userSearch->execute([]);
    
    
    $userSearchResult = [];
while ($row = $userSearch->fetch(PDO::FETCH_ASSOC)) {
    $userSearchResult[] = [
        'value' =>  $row['username'],
        'category' =>  "username"
    ];
}
    
// query to find teams for the search bar
  $teamSearch = $pdo->prepare("SELECT teamName FROM teams");


  $teamSearch->execute([]);
    
    
      $teamSearchResult = [];
while ($row = $teamSearch->fetch(PDO::FETCH_ASSOC)) {
    $teamSearchResult[] = [
        'value' =>  $row['teamName'],
        'category' =>  "teams"
    ];
}
    
// query to find clubs for the search bar
  $clubSearch = $pdo->prepare("SELECT clubName FROM clubs");


  $clubSearch->execute([]);
    
    
      $clubSearchResult = [];
while ($row = $clubSearch->fetch(PDO::FETCH_ASSOC)) {
    $clubSearchResult[] = [
        'value' =>  $row['clubName'],
        'category' =>  "clubs"
    ];
}
    
    $result = array_merge(
    $userSearchResult,
    $teamSearchResult,
    $clubSearchResult
);
    
?>
       
<script type="text/javascript">
    //Assign php generated json to JavaScript variable  
    var searches = <?php echo json_encode($result)?>
    
    $( function() {
    $.widget( "custom.catcomplete", $.ui.autocomplete, {
      _create: function() {
        this._super();
        this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
      },
      _renderMenu: function( ul, items ) {
        var that = this,
          currentCategory = "";
        $.each( items, function( index, item ) {
          var li;
          if ( item.category != currentCategory ) {
            ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
            currentCategory = item.category;
          }
          li = that._renderItemData( ul, item );
          if ( item.category ) {
            li.attr( "aria-label", item.category + " : " + item.label );
          }
        });
      }
    });

    $("#searchBox").catcomplete({
        source: searches
     });
    });


</script>

<?php  
    

// query to find myteams for each user
  $findMyTeams = $pdo->prepare("SELECT teamName FROM teams WHERE username=?"); 

  $findMyTeams->execute([$username]);      
        
        if ($findMyTeams->rowCount() > 0)
            
            {
           ($createdTeams = $findMyTeams->fetchAll()); 
            }
        else
        {
          $createdTeams=array(0);  
        }
        

        
 //see if profile is registered already
$registeredAlready = $pdo->prepare('SELECT teamName FROM register WHERE username=?'); 

//execute query with variables
$registeredAlready->execute([$username]);
        
      if ($registeredAlready->rowCount() > 0)
            
            {
           ($registeredTeam = $registeredAlready->fetchAll()); 
            }
        else
        {
            $registeredTeam=array(0);
        }
        
        
        
 //see if user is in control of any teams
$userInControl = $pdo->prepare('SELECT teamName FROM teamControl WHERE username=?'); 

//execute query with variables
$userInControl->execute([$username]);
        
      if ($userInControl->rowCount() > 0)
            
            {   
          
           ($controlTeams = $userInControl->fetchAll());
          
            }
        
        else
        {
            $controlTeams=array(0);
        }     
        
 $teamsDropdownWithDuplicates = array_merge(
            $createdTeams,
            $registeredTeam,
            $controlTeams
        );
        
$teamsDropdown = array_unique( $teamsDropdownWithDuplicates, SORT_REGULAR);        
        
foreach ($teamsDropdown as $key => $value) {
    if (empty($value)) {
       unset($teamsDropdown[$key]);
    }
}
if (empty($teamsDropdown)) {
   //empty array
}

        else
        {
print '<div id=myTeamsList>';
print '<form action="defaultSetup.php" id="findMyTeamsForm" method="post">';
    foreach ($teamsDropdown as $row) 
    {
print '<button class="differentTeam" type="submit" name="teamChoice" value="'.$row['teamName'].'">'.$row['teamName'].'</button>';
    }
print '</form>';
print '</div>';  
        }
        
        
        
        
        
        
// query to find my clubs for each user
  $findMyClubs = $pdo->prepare("SELECT clubName FROM clubs WHERE username=?"); 

  $findMyClubs->execute([$username]);      
        
        if ($findMyClubs->rowCount() > 0)
            
            {
           ($createdClubs = $findMyClubs->fetchAll()); 
            }
        else
        {
          $createdClubs=array(0);  
        }
        

       
 //see if profile is registered already
$registeredClubsAlready = $pdo->prepare('SELECT teamID FROM register WHERE username=?'); 

//execute query with variables
$registeredClubsAlready->execute([$username]);
        
      if ($registeredClubsAlready->rowCount() > 0)
            
            {

//get the rows
while($row = $registeredClubsAlready->fetch(PDO::FETCH_ASSOC)){
    
$teamID[]  = $row["teamID"];
 }
$teamCount = count($teamID);
              
      
for($team=0; $team < $teamCount; $team++) {
  
    
//find club id from registered teams
$findClubNamesFromTeams = $pdo->prepare('SELECT clubID FROM clubTeamList WHERE teamID=?'); 

//execute query with variables
$findClubNamesFromTeams->execute([$teamID[$team]]); 
    
    
//get the rows
while($list = $findClubNamesFromTeams->fetch(PDO::FETCH_ASSOC)){
    
$clubID[]  = $list["clubID"];
 }
$clubCount = count($clubID);
              
      
for($club=0; $club < $clubCount; $club++) {

 $clubIDNoCode   = substr($clubID[$club], 3);    

//find club name from clubTeamList
$findClubNamesFromList = $pdo->prepare('SELECT clubName FROM clubs WHERE id=?'); 

//execute query with variables
$findClubNamesFromList->execute([$clubIDNoCode]);    
    
 ($registeredClubs = $findClubNamesFromList->fetchAll());
    
}

            }
      }
        else
        {
            $registeredClubs=array(0);
        }
        
        
        
 //see if user is in control of any clubs
$userInClubsControl = $pdo->prepare('SELECT clubName FROM clubControl WHERE username=?'); 

//execute query with variables
$userInClubsControl->execute([$username]);
        
      if ($userInClubsControl->rowCount() > 0)
            
            {   
          
           ($controlClubs = $userInClubsControl->fetchAll());
          
            }
        
        else
        {
            $controlClubs=array(0);
        }     
        
 $clubsDropdownWithDuplicates = array_merge(
            $createdClubs,
            $controlClubs,
            $registeredClubs
        );
        
$clubsDropdown = array_unique( $clubsDropdownWithDuplicates, SORT_REGULAR);        
        
foreach ($clubsDropdown as $lock => $result) {
    if (empty($result)) {
       unset($clubsDropdown[$lock]);
    }
}
if (empty($clubsDropdown)) {
   //empty array
}

        else
        {
print '<div id=myClubsList>';
print '<form action="defaultSetup.php" id="findMyClubsForm" method="post">';
    foreach ($clubsDropdown as $list) 
    {
print '<button class="differentClub" type="submit" name="clubChoice" value="'.$list['clubName'].'">'.$list['clubName'].'</button>';
    }
print '</form>';
print '</div>';  
        }


echo <<<_END


<!-- navigation bar setup-->    

    <ul id="navigationbar">
        <li><a href="profile.php">$firstname</a></li>
        <li><a href="feed.php">feed</a></li>
        <li><a href="leagues.php">leagues</a></li>
        <li><a href="fixturesResults.php">fixtures/results</a></li>
        <li id="teams"><a href="#">teams</a></li>
        <li id="clubs"><a href="#">clubs</a></li>
        <li style="float:right"><a href="logout.php">logout</a></li>
        <li style="float:right"><a href="create.php">create</a></li>
        
        
        <form action="defaultsetup.php" id="searchForm" method="POST">
        
        <li style="float:right"><input type="text" id="searchBox" placeholder="Search..." name="searchBox" /></li>
        
        <input type='submit' name='searchSubmit' value='searchSubmit' id='searchSubmit'>
        
        </form>
        
    </ul>

<div id=centerimage>
<div id=imagebackground>
<div id=sportmiiimage>
<a href="profile.php">
<img src="images/sportmii%20logo.png" alt="sportmii" title="sportmii" width="40" height="50"/>
</a>
    </div>
    </div>
    </div>
    
    <div id="searchResults">
</div>


_END;


?>
    </body>

</html>