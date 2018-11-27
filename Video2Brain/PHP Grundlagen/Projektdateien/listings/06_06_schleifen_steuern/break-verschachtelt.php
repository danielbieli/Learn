<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Break verschachtelt</title>
</head>
<body>
<?php
for ($i = 1; $i <= 3; $i++) {
    echo "<br>außen: $i: ";
    for ($j = 1; $j <= 3; $j++) {
        echo "innen $j ";
        if ($j == 2) {
            break 2;
        }
    }
}
?>
</body>
</html>