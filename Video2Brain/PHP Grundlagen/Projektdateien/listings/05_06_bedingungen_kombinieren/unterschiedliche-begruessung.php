<?php
date_default_timezone_set("Europe/Berlin");
$uhrzeit = date("H");
//$uhrzeit = 13;

if ($uhrzeit < 5 || $uhrzeit > 21) {
	$farbe = "blue";
    $gruss = "Gute Nacht";
} elseif ($uhrzeit < 11) {
	$farbe = "orange";
    $gruss = "Guten Morgen";
} elseif ($uhrzeit < 15) {
	$farbe = "red";
    $gruss = "Guten Mittag";
} elseif ($uhrzeit < 18) {
	$farbe = "green";
    $gruss = "Guten Nachmittag";
} else {
	$farbe = "pink";
    $gruss = "Guten Abend";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Unterschiedliche Begrüßung </title>
    <style>
	body {
		background-color: <?php echo $farbe; ?>;
		
	}
	</style>
	</head>
<body>
<?php
echo $gruss;
?>
</body>
</html>