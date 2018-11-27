<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formular</title>
	<style>
	label { display: block;}
	</style>
</head>
<body>
<form method="get" 
action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
<p>
<label for="vorname">Vorname</label>
<input type="text" name="vorname" id="vorname">
</p>
<p>
<label for="email">E-Mail</label>
<input type="email" name="email" id="email">
</p>
<input type="submit">

</form>
<?php
if (isset($_GET["vorname"])) {
 echo htmlspecialchars($_GET["vorname"]);
 echo " ";
 echo htmlspecialchars($_GET["email"]);
}
?>
	
</body>
</html>