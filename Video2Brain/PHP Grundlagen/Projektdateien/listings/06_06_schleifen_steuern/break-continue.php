<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Break und Continue</title>
</head>
<body>
<?php
for ($i = 1; $i <= 10; $i++) {
    if ($i == 2) {
        continue;
    }
    echo "$i. Durchlauf<br >\n";
    if ($i == 5) {
        break;
    }
}
?>
</body>
</html>