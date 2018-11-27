<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>null coalescing-Operator</title>
</head>
<body>
<?php
$user = $_POST['user'] ?? 'Unbekannter';
echo "Hallo $user";
?>
</body>
</html>