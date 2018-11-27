<?php
include "htmlhelfer.php";
htmlanfang();

$stadt = "Graz";
function gruss() {
	//global $stadt;
	
    echo "Hallo $GLOBALS[stadt]<br >\n";
}

gruss();

htmlende();
?>	
