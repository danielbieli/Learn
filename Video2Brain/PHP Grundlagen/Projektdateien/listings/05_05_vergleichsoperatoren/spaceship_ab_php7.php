<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>spaceship-Operator</title>
</head>
<body>
<?php
$a = 4;
$b = 22;
echo "$a <=> $b: " . ($a <=> $b) . "<br>";
echo "$a <=> $a: " . ($a <=> $a) . "<br>";
echo "$b <=> $a: " . ($b <=> $a) . "<br>";
?>
</body>
</html>