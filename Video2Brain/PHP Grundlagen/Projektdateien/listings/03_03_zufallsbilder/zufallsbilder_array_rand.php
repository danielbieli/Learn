<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Zufallsbilder</title>
</head>
<body>
<?php
$bilder = ["blumen.jpg", 
           "boot.jpg",
           "landschaft.jpg", 
		   "stadt_am_meer.jpg",
           "strand.jpg"];
$zufallszahl = array_rand($bilder);
echo "<img src='bilder/$bilder[$zufallszahl]'>\n";
?>
</body>
</html>
