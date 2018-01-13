<?php // logout button 
require_once 'defaultsetup.php';      

  if (isset($_SESSION['firstname'], $_SESSION['surname'], $_SESSION['gender'], $_SESSION['dob'], $_SESSION['email'], $_SESSION['username'], $_SESSION['primarysport']))
  {
    destroySession();
echo <<<_END
<script>
  window.location.href = "login.php";
</script>
_END;
  }
        
  else 
      
  {
      echo "<div class='main'><br>" .
            "You cannot log out because you are not logged in";
    }
?>