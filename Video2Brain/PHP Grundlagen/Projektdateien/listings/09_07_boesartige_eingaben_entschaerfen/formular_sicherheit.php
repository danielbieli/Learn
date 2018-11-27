<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sicherheit und Formulare</title>
</head>
<body>
<form method="get" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    Ihre Meinung? <br>
    <input type="text" name="kommentar" size="80">
    <br>
    <input type="submit"><br>
</form>
<?php
if (isset($_GET["kommentar"])) {
    echo "Ihr Kommentar <hr >" 
	. htmlspecialchars($_GET["kommentar"])
	. " <hr > ";
}
?>
<p>Weitere Kommentare</p>
<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
    magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
    gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>

<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
    magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
    gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>

<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
    magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
    gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>

<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
    magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
    gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>

</body>
</html>
