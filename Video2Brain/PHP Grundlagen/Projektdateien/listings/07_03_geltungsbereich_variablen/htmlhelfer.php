<?php
function htmlanfang($titel = "PHP") {
  echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <title>$titel</title>
</head>
<body>"	;
}
function htmlende() {
	echo "</body>
</html>";
}
?>