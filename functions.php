<?php //sportmiifunctions.php
$host = 'localhost'; //server im testing on
$db = 'sportmii'; // main database name
$user = 'josh'; //database username
$pass = 'Shijit11'; //database password
$appname = 'sportmii'; //website and app name
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);



/*$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $connection->connect_error);
}*/

  function createTable($name, $query)
  {
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br>";
  }

  function queryMysql($query)
  {
    global $pdo;
    $result = $pdo->query($query);
    if (!$result) die($pdo->error);
    return $result;
  }

  function destroySession()
  {
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
      setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
  }


//sanitize strings are not needed with pdo prepared statments
 /* function sanitizeString($var)
  {
    global $pdo;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $pdo->real_escape_string($var);
  }*/

  function showProfile($user)
  {
    if (file_exists("$user.jpg"))
      echo "<img src='$user.jpg' style='float:left;'>";

    $result = $mysqli->query("SELECT * FROM profiles WHERE user='$user'");

    if ($result->num_rows)
    {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
    }
  }


function timeElapsed($datetime, $level = 7) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    $string = array_slice($string, 0, $level);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>


