<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Typ prüfen</title>
</head>
<body>
<?php
$array = ["2", 3];
if (is_string($array)) {
    echo " String ";
}
if (is_array($array)) {
    echo " Array ";
}
if (is_int($array[0])) {
    echo " int ";
}
if (is_numeric($array[0])) {
    echo " numerisch ";
}
?>
</body>
</html>
