<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP-Beispiel</title>
</head>
<body>
<?php
$alter = 18;
if ($alter < 18) {
	echo "nicht volljährig";
}
elseif (18 == $alter){
	echo "exakt 18";
}
else {
	echo "volljährig";
}

?>
	
</body>
</html>