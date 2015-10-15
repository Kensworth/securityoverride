<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

$string = "bluechill";
$regex = $_GET['highlight'];
$string = preg_replace("/". $regex . "/", '$0 * $1', $string);
echo $string;
echo "<br />";
echo $regex;
?>

