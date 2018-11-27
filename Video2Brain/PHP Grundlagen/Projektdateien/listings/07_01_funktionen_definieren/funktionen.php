<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP-Beispiel</title>
</head>
<body>
<?php

$ergebnis = berechnen(55, 22);
echo "Das Ergebnis: $ergebnis";
function berechnen ($z1, $z2) {
	$erg = $z1 + $z2;	
	return $erg; 
}
function berechnen2 ($z1, $z2) {
	$erg = $z1 + $z2;	
	return $erg; 
}
?>
	
</body>
</html>