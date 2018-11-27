<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Assoziatives Array</title>
</head>
<body>
<?php
/*$farben = array(
			"rot"  => "#FF0000",
			"grün" => "#00FF00",
			"blau" => "#0000FF"
	      );*/
$farben = [
			"rot"  => "#FF0000",
			"grün" => "#00FF00",
			"blau" => "#0000FF"
	      ];
$farben["schwarz"] = "#000000";
//print_r($farben);
foreach ($farben as $k => $v) {
	echo "$k: $v<br>";
}


?>
</body>
</html>
