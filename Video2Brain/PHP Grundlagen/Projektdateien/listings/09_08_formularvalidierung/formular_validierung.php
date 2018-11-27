<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulareingaben validieren</title>
    <style>
        .fehler {
            color: red;
            font-weight: bold;
        }
    </style>

</head>
<body>
<?php
$themen = array("...", "HTML", "CSS", "JavaScript", "PHP");
if (isset($_POST["gesendet"])) {
    formverarbeiten();
} else {
    formausgeben();
}
function formausgeben($vorname = "", $nachname = "", $thema = "", $fehler = "") {
    global $themen;
    if (!empty($fehler)) {
        echo "<p class='fehler'>$fehler</p>";
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Vorname <br>
        <input type="text" name="vorname" size="20" maxlength="30" value="<?php echo htmlspecialchars($vorname); ?>">
        <br>
        Nachname* <br>
        <input type="text" name="nachname" size="20" maxlength="30"
               value="<?php echo htmlspecialchars($nachname); ?>">
        <br>
        Themenwunsch* <br>
        <select name="thema">
            <?php
            foreach ($themen as $el) {
                if ($el == $thema) {
                    $gew = " selected";
                } else {
                    $gew = "";
                }
                echo "<option value='$el' $gew>$el</option>\n";
            }
            ?>
        </select>
        <br>
        <input type="submit" name="gesendet">
    </form>
    <?php
}

function formverarbeiten() {
    global $themen;
    isset($_POST["nachname"]) && is_string($_POST["nachname"]) ? $nachname = trim($_POST["nachname"]) : $nachname = "";
	
    isset($_POST["vorname"]) && is_string($_POST["vorname"]) ? $vorname = trim($_POST["vorname"]) : $vorname = "";
	
    isset($_POST["thema"]) && is_string($_POST["thema"]) ? 
	$thema = $_POST["thema"] : $thema = "";
	
    $fehler = "";
    if (empty($nachname)) {
        $fehler = "Bitte geben Sie Ihren Nachnamen an. ";
    }
    if (!in_array($thema, $themen) || $thema == "...") {
        $fehler .= "Bitte wählen Sie ein Thema";
    }
    if (strlen($fehler) > 0) {
        formausgeben($vorname, $nachname, $thema, $fehler);
    } else {
        echo "Vielen Dank für Ihre Eingaben";
        //mail versenden;
    }
}

?>
</body>
</html>

