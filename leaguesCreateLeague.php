<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'defaultsetup.php';
?>

<html>

   <head>
       
        <!--link to CSS-->
        <link href="leaguesCreateLeague.css" type="text/css"
              rel="stylesheet">
       
       
        <!--link to call jquery file to bring up datepicker-->
    <script
    src='leaguesCreateLeagueCounts.js'>
    </script> 

    
           </head>
    
<body>     
 

<?php
    
//if go is pressed
if (isset($_POST['createLeagueSubmit']))
{
    
    // declare all variables
    $leagueSport      = $_POST['createLeagueSport'];
    $leagueYear       = $_POST['createLeagueYear'];
    $leagueDistrict   = $_POST['createLeagueDistrict'];
    $leagueAge        = $_POST['createLeagueAge'];
    $leagueDivision   = $_POST['createLeagueDivision'];
 
    
      //if any variables are left empty
    if 
        
        ($leagueDistrict == "" || $leagueDivision == "") 
        
        {

echo <<<_END
<div id=createLeagueNotFilledIn>
<p>oops.. every option must be filled in!</p>
</div>
_END;
        }

    //league already exists
  else 
        
    {
    
    $leagueExists = $pdo->prepare('SELECT * FROM leagues WHERE sport=? and year=? and district=? and age=? and division=?');

//execute query and variables
$leagueExists->execute([$leagueSport, $leagueYear, $leagueDistrict, $leagueAge, $leagueDivision]);  
      

      if ($leagueExists->rowCount() > 0)
      {

echo <<<_END
<div id=leagueAlreadyExists>
<p>it looks like this league is already created. Use the search settings to find it</p>
</div>
_END;

$resultemail = null;
    }
    
//insert into database
    else
    {
        //create league
        $createLeague = $pdo->prepare('INSERT INTO leagues (sport, year, district, age, division) VALUES(?, ?, ?, ?, ?)');
        
        //execute query and variables
$createLeague->execute([$leagueSport, $leagueYear, $leagueDistrict, $leagueAge, $leagueDivision]);
        
        
$leagueChoice  =  "$leagueSport $leagueYear $leagueDistrict $leagueAge $leagueDivision";
     
        //insert user to league control
   $userLeagueControl = $pdo->prepare('INSERT INTO leagueControl (leagueName, username) VALUES(?, ?)');
        
        //execute query and variables
$userLeagueControl->execute([$leagueChoice, $username]);
    
     $_SESSION['leagueChoice'] = $leagueChoice;
        

echo <<<_END
<script>
  window.location.href = "leaguesCreateAddTeams.php";
</script>
_END;

    }
    }  
}
    

    if(isset($_SESSION['username']))
    {

echo <<<_END

<div id=createLeagueTitle>
<p>new league setup</p>
</div>

<div id=createLeagueExplanation>
<p>the sum total of all the below options will become the league name.<br><br>for example, if i selected: football, 2017-18, West Yorkshire Tuesday night sportmii, u18's and division one.<br><br>the league would be named: football 2017-18 West Yorkshire Tuesday night sportmii u18's division 1</p>
</div>

<div id=createLeagueOutsideBox>

<form action="leaguesCreateLeague.php" id="createLeagueForm" method="post">

<div id=createLeagueSportTitle>
<p>select sport</p>
</div>

<select name="createLeagueSport" id="createLeagueSport">
<option value="football">football</option>
</select>

<div id=createLeagueYearTitle>
<p>select year</p>
</div>

<select name="createLeagueYear" id="createLeagueYear">
<option value="2017-18">2017-18</option>
</select>

<div id=createLeagueDistrictTitle>
<p>enter district</p>
</div>

<textarea name="createLeagueDistrict" id="createLeagueDistrict" maxlength="100" placeholder="West Yorkshire Tuesday night sportmii"></textarea>
       <div id=createLeagueDistrictCount>
       </div>
       
<div id=createLeagueAgeTitle>
<p>select age</p>
</div>

<select name="createLeagueAge" id="createLeagueAge">
<option value="u4's">u4's</option>
<option value="u5's">u5's</option>
<option value="u6's">u6's</option>
<option value="u7's">u7's</option>
<option value="u8's">u8's</option>
<option value="u9's">u9's</option>
<option value="u10's">u10's</option>
<option value="u11's">u11's</option>
<option value="u12's">u12's</option>
<option value="u13's">u13's</option>
<option value="u14's">u14's</option>
<option value="u15's">u15's</option>
<option value="u16's">u16's</option>
<option value="u17's">u17's</option>
<option value="u18's">u18's</option>
<option value="u19's">u19's</option>
<option value="u20's">u20's</option>
<option value="u21's">u21's</option>
<option value="u22's">u22's</option>
<option value="u23's">u23's</option>
<option value="u24's">u24's</option>
<option value="u25's">u25's</option>
<option value="mens">mens</option>
<option value="mens">womens</option>
<option value="over 30's">over 30's</option>
<option value="over 35's">over 35's</option>
<option value="over 40's">over 40's</option>
<option value="over 45's">over 45's</option>
<option value="over 50's">over 50's</option>
<option value="over 55's">over 55's</option>
<option value="over 60's">over 60's</option>
<option value="over 65's">over 65's</option>
<option value="over 70's">over 70's</option>
<option value="over 75's">over 75's</option>
</select>

<div id=createLeagueDivisionTitle>
<p>enter division</p>
</div>

<textarea name="createLeagueDivision" id="createLeagueDivision" maxlength="100" placeholder="Division 1"></textarea>
       <div id=createLeagueDivisionCount>
       </div>
       
<input type="submit" name="createLeagueSubmit" value="create league" id="createLeagueSubmit" />


</form>

</div>

_END;

     }
 

?>

    </body>

</html>