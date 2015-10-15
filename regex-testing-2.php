<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

//how can you get /* to run?

//$regex = $_GET['highlight'];
$string = preg_replace("/phpinfo\(\);/e", '$0', "phpinfo();");
echo $string;
//echo
?>

