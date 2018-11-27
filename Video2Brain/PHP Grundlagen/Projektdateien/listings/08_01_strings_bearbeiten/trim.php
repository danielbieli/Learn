<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>trim()</title>
</head>
<body>
<?php
$nn = "   Maier     ";
$vn = "\tBerenice\n ";
echo "<pre>";
echo "Vor trim: 
  Name: '$nn',
  Vorname '$vn'";
$nn = trim($nn);
$vn = trim($vn);
echo "\nNach trim: 
  Name: '$nn'
  Vorname: '$vn'";
echo "</pre>";

$str = "'O'Brien'...";
echo trim($str, "'.");

?>
</body>
</html>
