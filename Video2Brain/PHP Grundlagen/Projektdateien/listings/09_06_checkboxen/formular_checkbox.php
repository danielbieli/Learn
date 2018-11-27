<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Beispielformular</title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
    Ihr Nachname: <br>
    <input type="text" name="nachname" size="20" maxlength="30">
    <br>
    Themen: <br>
    <input type="checkbox" name="thema[]" value="HTML">HTML
    <input type="checkbox" name="thema[]" value="CSS">CSS
    <input type="checkbox" name="thema[]" value="JavaScript">JavaScript
    <input type="checkbox" name="thema[]" value="PHP">PHP<br>
    <input type="submit" value="Abschicken">
</form>
<?php
if (!empty($_GET["nachname"])) {
    echo "Ihre Eingaben<br>\n"
        . "Name: " 
		. htmlspecialchars($_GET["nachname"]) 
		. "<br >\n";
	if (isset($_GET["thema"])) {
		//print_r($_GET["thema"]);
       //echo htmlspecialchars($_GET["thema"]);
	   foreach($_GET["thema"] as $th) {
		   echo htmlspecialchars($th) . "<br>\n";
	   }
	}
}

?>
</body>
</html>

