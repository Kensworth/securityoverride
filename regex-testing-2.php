<?php

$string = "bluechill";
if(strlen($_GET['highlight']) > 2) {
	$string = preg_replace("/". $_GET['highlight'] . "/", $_GET['highlight'] . ' * $1', $string);
	echo $string;
}
else {
	echo $string;
}

?>

