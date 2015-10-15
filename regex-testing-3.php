<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

//$regex = $_GET['highlight'];
$string = preg_replace("/exit\(phpinfo\(\)\);/e", '$0', "exit(phpinfo());");
echo $string;
//echo "<br />";
//echo $regex;
?>

