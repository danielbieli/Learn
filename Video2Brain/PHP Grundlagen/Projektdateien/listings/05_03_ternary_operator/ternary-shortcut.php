<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ternary Shortcut</title>
</head>
<body>
<?php
echo "<pre>";
var_dump(false ?: "Eins");
var_dump(true ?: "Zwei");
$erg = (0 ?: 4);
echo $erg;
echo "</pre>";
?>
</body>
</html>