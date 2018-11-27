<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>HTML behandeln</title>
</head>
<body>
<?php
$text = "<h1>Das ist Text</h1>";
echo htmlspecialchars($text);
echo "<br >\n";
echo strip_tags($text);
?>
</body>
</html>