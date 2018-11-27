<?php
class Nachspeise {
  public $name;
  public $zutaten = array();
  public function hatzutat($zutat) {
     return in_array($zutat, $this->zutaten);
  }
}

$kuchen = new Nachspeise;
$kuchen->name = "Kuchen";
$kuchen->zutaten = array("Eier", "Mehl", "Butter");
echo $kuchen->name;
if ($kuchen->hatzutat("Eier")) { 
   echo " ist nicht vegan<br>\n";
}
else {
   echo " ist vegan<br>\n";
}

$bananenmilch = new Nachspeise;
$bananenmilch->name = "Bananenmilch";
$bananenmilch->zutaten = array("Bananen", "Reismilch");
echo $bananenmilch->name;
if ($bananenmilch->hatzutat("Milch")) { 
   echo " ist nicht vegan<br>\n";
}
else {
   echo " ist vegan<br>\n";
}