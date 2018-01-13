<?php // logout button
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

  if $loggedin         = TRUE;
  {
    destroySession();

echo <<<_END
<p>successfully logged out</p>
_END;

  }
        
  else 
      
  {
      echo "<div class='main'><br>" .
            "You cannot log out because you are not logged in";
    }
?>