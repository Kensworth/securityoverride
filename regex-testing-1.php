<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

$string = "bluechill";
$regex = $_GET['highlight'];
$string = preg_replace("/". $regex . "/", $_GET['highlight'] . ' * $1', $string);
echo $string;
echo "<br />";
echo $regex;

//blue|%20echo%20phpinfo();/e%00
//blue/e%00&highlight=echo phpinfo();
//blue/e%00&highlight=echo phpinfo();
//||/e%00&highlight=echo%20phpinfo()
//|||phpinfo()/e%00
?>

