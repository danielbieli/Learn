<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP-Beispiel</title>
</head>
<body>
<?php
echo "<table border=1>\n";
for($i = 1; $i <= 10; $i++) {
	echo "<tr>\n";
	for($j = 1; $j <= 10; $j++) {
		$erg = $i * $j;
		echo "<td>$erg</td>\n";
	}
	echo "</tr>\n";	
}
echo "</table>\n";
?>
	
</body>
</html>