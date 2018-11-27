<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP-Beispiel</title>
</head>
<body>
<?php
$i = "Apfel";
switch ($i) {
    case "Apfel":
        echo "i ist Apfel. ";
        break;
    case "Balken":
        echo "i ist Balken. ";
        break;
    case "Kuchen":
        echo "i ist Kuchen. ";
        break;
	default:
	     echo "Kenne ich nicht. ";
}

?>
	
</body>
</html>