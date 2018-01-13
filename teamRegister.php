<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="teamRegister.css" rel="stylesheet" type="text/css"/>
        
          <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
        
    <!--link to call jquery file to bring up positions popup-->
    <script
    src='teamRegisterPopup.js'>
    </script>     
        
    <!--link to call jquery file to cancel editing positions-->
    <script
    src='teamCancelRegisterPopup.js'>
    </script> 
        
    <!--link to call jquery file to bring up datepicker-->
    <script
    src='teamRegisterSubmitButton.js'>
    </script> 
        
    </head>
    
    <body>
        
<?php
        
 // if 'createNewTeam' is pressed submit all info to mysql database
if (isset($_POST['teamSubmitRegister']))
{ 
     if (isset($_SESSION['teamID']))
    
    {
       $teamID   = $_SESSION['teamID'];

        
 //declare variables
 $teamName                  = ($_POST['teamRegisterTeam']);
 $firstname                 = ($_POST['teamRegisterFirstname']);
 $surname                   = ($_POST['teamRegisterSurname']);
 $addressLine1              = ($_POST['teamRegisterAddressLine1']);
 $addressLine2              = ($_POST['teamRegisterAddressLine2']);
 $addressLine3              = ($_POST['teamRegisterAddressLine3']);
 $postCode                  = ($_POST['teamRegisterPostCode']);
 $ethnicity                 = ($_POST['teamEthnicity']);
 
     // declaring dob variables
    $day=$_POST['day'];
    $month=$_POST['month'];
    $year=$_POST['year'];
    
    $dob = $year.'-'.$month.'-'.$day;     
    
        
        
        $firstname              = strtolower($firstname);
        $surname                = strtolower($surname); 
        
        
        $registerPlayer = $pdo->prepare('INSERT INTO register (teamName, username, teamID, firstname, surname, dob, addressLine1, addressLine2, addressLine3, postCode, ethnicity) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        
        //execute query and variables
$registerPlayer->execute([$teamName, $username, $teamID, $firstname, $surname, $dob, $addressLine1, $addressLine2, $addressLine3, $postCode, $ethnicity]);

echo <<<_END
<script>
  window.location.href = "viewTeam.php";
</script>
_END;
    
}
}
        
        


 if (isset($_SESSION['teamID']))
    
    {
     
$addressLine1              = "";
$addressLine2              = "";
$addressLine3              = "";
$postCode                  = "";
     
     
     
     
     
       $teamID   = $_SESSION['teamID'];
    
//Code for finding team name from teamID  
$findTeamName = $pdo->prepare('SELECT teamName FROM teams WHERE id=?'); 

//execute query with variables
$findTeamName->execute([$teamID]);

              
($teamName = $findTeamName->fetchcolumn());    
     
//explode dob into three different dropdowns
list($dobYear, $dobMonth, $dobDay) = explode('-', $dob);

switch ($dobMonth) {
        
    case "01":
        
        $dobRegisterMonth = 'january';
            
             break;
    
    case "02":
        
        $dobRegisterMonth = 'february';
            
             break;
        
     case "03":
        
        $dobRegisterMonth = 'march';
            
             break; 
        
    case "04":
        
        $dobRegisterMonth = 'april';
            
             break;
        
    case "05":
        
        $dobRegisterMonth = 'may';
            
             break;
        
    case "06":
        
        $dobRegisterMonth = 'june';
            
             break;
        
    case "07":
        
        $dobRegisterMonth = 'july';
            
             break;
        
    case "08":
        
        $dobRegisterMonth = 'august';
            
             break;
        
    case "09":
        
        $dobRegisterMonth = 'september';
            
             break;
        
    case "10":
        
        $dobRegisterMonth = 'october';
            
             break;
        
    case "11":
        
        $dobRegisterMonth = 'november';
            
             break;
        
    case "12":
        
        $dobRegisterMonth = 'december';
            
             break;       
    
 }
     
 //see if profile is registered already
$registeredAlready = $pdo->prepare('SELECT * FROM register WHERE username=? and teamID=?'); 

//execute query with variables
$registeredAlready->execute([$username, $teamID]);
        
if ($registeredAlready->rowCount() == 0)
            {

echo <<<_END

<div id="teamRegisterPlayerButton">       
<button type="button" class="registerPlayer">register</button>
</div>

_END;
 
     }

        else   
        {   

echo <<<_END

<div id="teamRegisteredAlreadyButton">       
<button type="button" class="registeredAlready">registered</button>
</div>

_END;

    }  
 }
        


echo <<<_END

 <div id=teamRegisterPopup>
    
     <form action="teamRegister.php" method="post" id="teamRegisterForm">
     
<input type="hidden" name="teamRegisterTeam" id="teamRegisterTeam" value='$teamName'>     
     
     <div id=teamRegisterTitle>
     <p>$teamName registration form</p>
     </div>
     
     <div id=teamRegisterExplanation>
<p>just before we can register you, theres a few details we need to take.<br><br>anything with an astrix must be filled in.</p>
</div>

<div id=teamRegisterOutsideBox>

<div id=teamRegisterUsernameExplanation>
<p>please note - your username is saved into the database.<br>if you are registering on behalf of someone else, please make them an account first.</p>
</div>

<div id=teamRegisterFirstnameTitle>
<p>firstname*</p>
</div>

<input type="text" name="teamRegisterFirstname" id="teamRegisterFirstname" value='$firstname'>

<div id=teamRegisterSurnameTitle>
<p>surname*</p>
</div>

<input type="text" name="teamRegisterSurname" id="teamRegisterSurname" value='$surname'>

<div id="teamRegisterDob">
  <label for="teamRegisterDobDropdown" class="teamRegisterDobDropdown">date of birth*</label>
  <div class="teamDob">
    <select name="day" id="day">
      <option value="$dobDay">$dobDay</option>
      <option value="01">01</option>
      <option value="02">02</option>
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07">07</option>
      <option value="08">08</option>
      <option value="09">09</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
      <option value="24">24</option>
      <option value="25">25</option>
      <option value="26">26</option>
      <option value="27">27</option>
      <option value="28">28</option>
      <option value="29">29</option>
      <option value="30">30</option>
      <option value="31">31</option>
    </select>
    <select name="month" id="month">
      <option value="$dobMonth">$dobRegisterMonth</option>
      <option value="01">january</option>
      <option value="02">february</option>
      <option value="03">march</option>
      <option value="04">april</option>
      <option value="05">may</option>
      <option value="06">june</option>
      <option value="07">july</option>
      <option value="08">august</option>
      <option value="09">september</option>
      <option value="10">october</option>
      <option value="11">november</option>
      <option value="12">december</option>
    </select>
    <select name="year" id="year">
      <option value="$dobYear">$dobYear</option>
      <option value="2012">2012</option>
      <option value="2011">2011</option>
      <option value="2010">2010</option>
      <option value="2009">2009</option>
      <option value="2008">2008</option>
      <option value="2007">2007</option>
      <option value="2006">2006</option>
      <option value="2005">2005</option>
      <option value="2004">2004</option>
      <option value="2003">2003</option>
      <option value="2002">2002</option>
      <option value="2001">2001</option>
      <option value="2000">2000</option>
      <option value="1999">1999</option>
      <option value="1998">1998</option>
      <option value="1997">1997</option>
      <option value="1996">1996</option>
      <option value="1995">1995</option>
      <option value="1994">1994</option>
      <option value="1993">1993</option>
      <option value="1992">1992</option>
      <option value="1991">1991</option>
      <option value="1990">1990</option>
      <option value="1989">1989</option>
      <option value="1988">1988</option>
      <option value="1987">1987</option>
      <option value="1986">1986</option>
      <option value="1985">1985</option>
      <option value="1984">1984</option>
      <option value="1983">1983</option>
      <option value="1982">1982</option>
      <option value="1981">1981</option>
      <option value="1980">1980</option>
      <option value="1979">1979</option>
      <option value="1978">1978</option>
      <option value="1977">1977</option>
      <option value="1976">1976</option>
      <option value="1975">1975</option>
      <option value="1974">1974</option>
      <option value="1973">1973</option>
      <option value="1972">1972</option>
      <option value="1971">1971</option>
      <option value="1970">1970</option>
      <option value="1969">1969</option>
      <option value="1968">1968</option>
      <option value="1967">1967</option>
      <option value="1966">1966</option>
      <option value="1965">1965</option>
      <option value="1964">1964</option>
      <option value="1963">1963</option>
      <option value="1962">1962</option>
      <option value="1961">1961</option>
      <option value="1960">1960</option>
      <option value="1959">1959</option>
      <option value="1958">1958</option>
      <option value="1957">1957</option>
      <option value="1956">1956</option>
      <option value="1955">1955</option>
      <option value="1954">1954</option>
      <option value="1953">1953</option>
      <option value="1952">1952</option>
      <option value="1951">1951</option>
      <option value="1950">1950</option>
      <option value="1949">1949</option>
      <option value="1948">1948</option>
      <option value="1947">1947</option>
      <option value="1946">1946</option>
      <option value="1945">1945</option>
      <option value="1944">1944</option>
      <option value="1943">1943</option>
      <option value="1942">1942</option>
      <option value="1941">1941</option>
      <option value="1940">1940</option>
      <option value="1939">1939</option>
      <option value="1938">1938</option>
      <option value="1937">1937</option>
      <option value="1936">1936</option>
      <option value="1935">1935</option>
      <option value="1934">1934</option>
      <option value="1933">1933</option>
      <option value="1932">1932</option>
      <option value="1931">1931</option>
      <option value="1930">1930</option>
      <option value="1929">1929</option>
      <option value="1928">1928</option>
      <option value="1927">1927</option>
      <option value="1926">1926</option>
      <option value="1925">1925</option>
      <option value="1924">1924</option>
      <option value="1923">1923</option>
      <option value="1922">1922</option>
      <option value="1921">1921</option>
      <option value="1920">1920</option>
      <option value="1919">1919</option>
      <option value="1918">1918</option>
      <option value="1917">1917</option>
    </select>
  </div>
</div>
     
<div id=teamRegisterAddressTitle>
<p>address*</p>
</div>

<input type="text" name="teamRegisterAddressLine1" id="teamRegisterAddressLine1" placeholder="address line 1" value='$addressLine1'>

<input type="text" name="teamRegisterAddressLine2" id="teamRegisterAddressLine2" placeholder="address line 2"  value='$addressLine2'>

<input type="text" name="teamRegisterAddressLine3" id="teamRegisterAddressLine3" placeholder="address line 3"  value='$addressLine3'>

<input type="text" name="teamRegisterPostCode" id="teamRegisterPostCode" placeholder="post code"  value='$postCode'>
     
<div id="teamRegisterEthnicity">
  <label for="teamRegisterEthnicityDropdown" class="teamRegisterEthnicityDropdown">ethnicity*</label>
  <div class="teamEthnicity">
    <select name="teamEthnicity" id="teamEthnicity">
      <option value="white">white</option>
      <option value="irish">irish</option>
      <option value="black african">black african</option>
      <option value="caribbean">caribbean</option>
      <option value="black other">black other</option>
      <option value="indian">indian</option>
      <option value="pakistani">pakistani</option>
      <option value="bangladeshi">bangladeshi</option>
      <option value="chinese">chinese</option>
      <option value="other">other</option>
    </select>
    </div>
</div>
    
    <div id=teamRegisterPlayerSubmitButtons>
    <div id=teamCancelRegister>
     <button type="button" class="cancelRegister">cancel</button>
    </div>
    <div id=teamSubmitRegister>
     <input type="submit" name="teamSubmitRegister" value="register" id="teamSubmitRegister" />
     </div>
    </div>
      
<div id=teamRegisterPlayerNotFilledIn>
<p>everything with an astrix must be filled in!</p>
</div>
        
    </div>    
    </form>

    </div> 


_END;

?>

    </body>
</html>

