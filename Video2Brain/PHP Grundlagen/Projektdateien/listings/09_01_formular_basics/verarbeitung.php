<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP-Beispiel</title>
</head>
<body>
Vielen Dank
<?php
 echo htmlspecialchars($_GET["vorname"]);
 echo " ";
 echo htmlspecialchars($_GET["email"]);

?>
	
</body>
</html>