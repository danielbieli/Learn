<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ternary Operator</title>
</head>
<body>
<?php
$i = 7;
if ($i % 2 == 0) {
    $fazit = "gerade";
} else {
    $fazit = "nicht gerade";
}
echo "Das Ergebnis: $fazit";

echo "<br >\n";

$fazit = ($i % 2 == 0) ? "gerade" : "ungerade";
echo "Das Ergebnis: $fazit";

?>
</body>
</html>