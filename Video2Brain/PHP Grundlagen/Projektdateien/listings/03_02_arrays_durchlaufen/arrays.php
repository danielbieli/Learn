<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP-Beispiel</title>
</head>
<body>
<?php
$obst = ["Banane", "Birne", "Apfel"];

$obst[] = "Orange";
echo "<br>";
echo "<ul>";
foreach ($obst as $o) {
	echo "<li>$o</li>\n";
}
echo "</ul>";

?>
	
</body>
</html>