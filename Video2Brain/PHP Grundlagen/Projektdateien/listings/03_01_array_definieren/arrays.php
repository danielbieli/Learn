<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP-Beispiel</title>
</head>
<body>
<?php
//$obst = array("Banane", "Birne", "Apfel");
$obst = ["Banane", "Birne", "Apfel"];
echo $obst[0];
$obst[] = "Orange";
echo "<br>";
echo $obst[3];
echo "<pre>";
print_r($obst);
echo "</pre>";
?>
	
</body>
</html>