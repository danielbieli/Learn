<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Zufallsbilder</title>
</head>
<body>
<?php
$bilder = array(
			array("pfad" => "blumen.jpg",
				  "alt" => "rote Blumen",
				  "titel" => "Strauß aus roten Blumen"),
			array("pfad" => "landschaft.jpg",
                  "alt" => "Landschaft",
                  "titel" => "Landschaft im Nebel"),
            array("pfad" => "stadt_am_meer.jpg",
                  "alt" => "Häuser",
                  "titel" => "Griechische Häuser am Abend"),
            array("pfad" => "strand.jpg",
                  "alt" => "Strand",
                  "titel" => "Strand mit Bergen"),
            array("pfad" => "boot.jpg",
                  "alt" => "Boot",
                  "titel" => "Boot auf einem Felsen")
);
//echo $bilder[2]['pfad'];


$zufallszahl = array_rand($bilder);
echo "<img src='bilder/{$bilder[$zufallszahl]['pfad']}' 
      height='200' width='150' 
      alt='{$bilder[$zufallszahl]['alt']}'
      title='{$bilder[$zufallszahl]['titel']}' >\n";
//Alternative Schreibweise
echo "<img src='bilder/" . $bilder[$zufallszahl]["pfad"] .
      "' height='200' width='150' alt='" . 
      $bilder[$zufallszahl]["alt"] . 
      "' title='" .
      $bilder[$zufallszahl]["titel"] .
      "' >\n";

?>
</body>
</html>
