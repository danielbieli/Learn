<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP-Beispiel</title>
</head>
<body>
<?php
$i = 3;
$j = 2;
//echo $i ** $j; //PHP 5.6
echo pow($i, $j); //vor PHP 5.6

echo "<br>\n";

//$i = $i + 4;
$i += 4;
echo $i;

echo "<br>\n";
//$i += 1;
$i++;
echo $i;
echo "<br>\n";
$i--;
echo $i;	 
	 
?>
	
</body>
</html>