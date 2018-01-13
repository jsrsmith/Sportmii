<?php
require_once 'header.php';
?>

<html>
    <head>
    
        <link href="viewProfileAboutMe.css" rel="stylesheet" type="text/css"/>
        
          <!--link to call Google CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
    </head>
    
    <body>
        
<?php
        
if (isset($_SESSION['userProfile']))
    
    {
       $userProfile   = $_SESSION['userProfile']; 


//find intro from database
$findIntro = $pdo->prepare('SELECT intro FROM aboutMe WHERE username=?'); 

//execute query with variables
$findIntro->execute([$userProfile]);
        
if ($findIntro->rowCount() == 0)
            {
    
                $intro =                    "";
    
}

        else   
        {
         

($intro = $findIntro->fetchcolumn());  
        
        
        }

echo <<<_END

<div id=viewProfileAboutMeTitle>
<p>about me</p>
</div>

<div id=viewProfileAboutMeIntro>
<p>$intro</p>
</div>


_END;
    
}

?>
        
    </body>
</html>

