<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

$string = "bluechill";
$string = preg_replace("/". $_GET['highlight'] . "/", $_GET['highlight'] . ' * $1', $string);
echo $string;
echo "<br />";
echo $_GET['highlight'];

eval("${phpinfo()}|blue");

//${phpinfo()}|blue/e%00
?>

