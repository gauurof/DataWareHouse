<!DOCTYPE html>
<html lang="de" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
</head>
<body>

<?php
include_once("db.php");

#Variablen
#=============================================================
#Int-Array, $alter = [20,50] 
$alter = [20,50]; #$_POST["alter"];

#Int, $ID_nebenwirkung = 15
$ID_nebenwirkung = 1;#$_POST["nebenwirkung"];

# String, $ID_medikament = 1
$ID_medikament = 1; #$_POST["medikament"];

# String, $geschlecht = "m"/"f"
if(isset($_POST["geschlecht"])){
	$geschlecht = " AND Person.Geschlecht ='" . $_POST["geschlecht"] . "'";
}
else{
	$geschlecht = "";
}
# String, $ID_vorbelastung = 1
if(isset($_POST["vorbelastung"])){
	$ID_vorbelastung = $_POST["vorbelastung"];
	$ID_vorbelastung = " AND Person.ID = PersonVorbelastung.ID_Person AND PersonVorbelastung.ID_Vorbelastung = $ID_vorbelastung";
}
else{
	$ID_vorbelastung = "none";
}

# Ablauf für Erstellung der Statistik
$ID_pers = getPerson($alter, $geschlecht, $ID_vorbelastung);
$wirkungen = getWirkung($ID_pers, $ID_medikament);
$nebenWirkungen = getNebenwirkung($ID_pers, $ID_medikament, $ID_nebenwirkung);

echo "ID_Pers:\n";
print_r($ID_pers);
echo "wirkung:\n";
print_r($wirkungen);
echo "nebenWirkung:\n";
print_r($nebenWirkungen);
#echo "medikamente:\n";
#print_r(getMedikamente());
?>
</body>
</html>
