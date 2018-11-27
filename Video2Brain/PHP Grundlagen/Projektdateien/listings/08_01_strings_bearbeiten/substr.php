<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>substr()</title>
</head>
<body>
<?php
$satz = "Morgenstund hat Gold im Mund und der frühe Vogel fängt den Wurm und wer nicht wagt, der auch nicht gewinnt";
$ausschnitt = substr($satz, 0, 28);
echo $ausschnitt;
echo "<br >\n";

?>

</body>
</html>