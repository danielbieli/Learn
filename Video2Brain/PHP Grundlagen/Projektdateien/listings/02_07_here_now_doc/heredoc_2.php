<!DOCTYPE html>
<html>
<head>
    <title>Heredoc</title>
    <meta charset="UTF-8">
</head>
<body>
<?php
$vorname = "Vincent";
$alter = 23;
$ausgabe = <<<DOC
<table border="1">
 <tr>
    <td>Name</td>
    <td>Alter</td>
   </tr>
  <tr>
    <td>$vorname</td>
    <td>$alter</td>
   </tr>
</table>
DOC;
echo $ausgabe;
?>

</body>
</html>
