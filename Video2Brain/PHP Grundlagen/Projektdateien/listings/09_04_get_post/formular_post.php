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
<?php
if (!isset($_POST["vorname"])) {
?>
<form method="post" 
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
} else  {
 echo "Vielen Dank ";
 echo htmlspecialchars($_POST["vorname"]);
 echo " ";
 echo htmlspecialchars($_POST["email"]);
}
?>
	
</body>
</html>