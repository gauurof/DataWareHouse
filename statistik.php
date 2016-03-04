<?php
include_once("/db.php");

#Variablen
#=============================================================
#Int-Array, $alter = [20,50] 
$alter = $_POST["alter"];

#Int, $ID_nebenwirkung = 15
$ID_nebenwirkung = $_POST["nebenwirkung"];

# String, $ID_medikament = "hustensaft"
$ID_medikament = $_POST["medikament"];

# String, $geschlecht = "m"/"f"
if(isset($_POST["geschlecht"])){
	$geschlecht = " AND `geschlecht` ='" . $_POST["geschlecht"] . "'";
}
else
{
	$geschlecht = "";
}
# String, $ID_vorbelastung = "raucher"
if(isset($_POST["vorbelastung"])){
	$ID_vorbelastung = $_POST["vorbelastung"];
	
	$ID_vorbelastung = " AND `ID` = `ID_Person`
					  AND `ID_Vorbelastung` = $ID_vorbelastung"
}
else
{
	$vorbelastung = ""
}
# Ablauf für Erstellung der Statistik
#$ID_pers = getPerson($alter, $geschlecht, $ID_vorbelastung)
#$wirkungen = getWirkung($ID_pers, $ID_medikament);
#$nebenWirkungen = getNebenwirkung($ID_pers, $ID_medikament, $ID_nebenwirkung);
?>