<!DOCTYPE html>
<html lang="de" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<body>


<?php
include_once("/config.php");

#Variablen
#=============================================================
#Int-Array, $alter = [20,50] 
#$alter = $_POST["alter"];
$alter = [10,20];

# String, $medikament = "hustensaft"
#$medikament = $_POST["medikament"];
$medikament = "12";

# String, $geschlecht = "m"/"f"
#if(isset($_POST["geschlecht"])){
#	$geschlecht = " AND `geschlecht` ='" . $_POST["geschlecht"] . "'";
#}
#else
#{
#	$geschlecht = "";
#}
$geschlecht = " AND geschlecht ='f'";



# String, $vorbelastung = "raucher"
#if(isset($_POST["vorbelastung"])){
#	$vorbelastung = $_POST["vorbelastung"];
#	
#	$vorbelastung = " AND `ID` = `ID_Person`
#					  AND `ID_Vorbelastung` = $vorbelastung"
#}
#else
#{
#	$vorbelastung = ""
#}
$vorbelastung = " AND `ID` = `ID_Person`
			      AND `ID_Vorbelastung` = 45";

#=============================================================
function buildCharts($alter, $medikament, $geschlecht, $vorbelastung){
		
#	$tmp = mysql_query("SELECT `ID` FROM `Person`, `PersonVorbelastung` 
#						WHERE `Geburtsdatum` < '$alter[1]' 
#						AND `Geburtsdatum` > '$alter[0]' 
#						AND" . $geschlecht . $vorbelastung .";");
#	while($row = mysql_fetch_object($tmp)){
#		$ID_pers[] = $row;
#	}
	
	$tmp = "SELECT `ID` FROM `Person`, `PersonVorbelastung` 
						WHERE `Geburtsdatum` < $alter[1] 
						AND `Geburtsdatum` > $alter[0]" . $geschlecht . $vorbelastung .";";
	
	return $tmp;
#	$wirkung = getWirkung($ID_pers, $medikament);
#	$nebenW = getNebenwirkung($ID_pers, $medikament);
}

function getWirkung($ID_pers){
#	for ($i = 0; $i < count($ID_pers); $i++) {
#		$tmp = mysql_query("SELECT `Wertung` FROM `Wirkung`,`Testergebnis` 
#							WHERE  `Wirkung.ID` = `ID_Wirkung` 
#							AND `ID_Person` = $ID_pers[$i];");
#		while($row = mysql_fetch_object($tmp)){
#			$wirkung[$tmp] += 1;
#		}
	for ($i = 0; $i < count($ID_pers); $i++) {
		$tmp = "SELECT `Wertung` FROM `Wirkung`,`Testergebnis` 
							WHERE  `Wirkung.ID` = `ID_Wirkung` 
							AND `ID_Person` = $ID_pers[$i];\n";
	}
#	}		
#	return $wirkung;
	return $tmp;
}

function getNebenwirkung($ID_pers, $nebenwirkung){
#	for ($i = 0; $i < count($ID_pers); $i++) {
#		$tmp = mysql_query("SELECT `Nebenwirkung.Wertung` FROM `Nebenwirkung`,`Testergebnis`, `TestergebnisNebenwirkung`
#							WHERE  `Test_ID` = `Testergebnis.ID` 
#							AND `ID_Person` = $ID_pers[$i]
#							AND `Nebenwirkung.ID` = `Nebenwirkung_ID`
#							AND `Nebenwirkung.ID` = $nebenwirkung;");
#		while($row = mysql_fetch_object($tmp)){
#			$nebenwirkungen[$tmp] += 1;
#		}
#	}		
#	return $nebenwirkungen;
	for ($i = 0; $i < count($ID_pers); $i++) {
		$tmp = "SELECT `Nebenwirkung.Wertung` FROM `Nebenwirkung`,`Testergebnis`, `TestergebnisNebenwirkung`
							WHERE  `Test_ID` = `Testergebnis.ID` 
							AND `ID_Person` = $ID_pers[$i]
							AND `Nebenwirkung.ID` = `Nebenwirkung_ID`
							AND `Nebenwirkung.ID` = $nebenwirkung;";
	}
	return $tmp;
}

$ID_pers = [7,14];
$nebenwirkung = 25;

$ausgabe = buildCharts($alter, $medikament, $geschlecht, $vorbelastung);
$ausgabe2 = getWirkung($ID_pers);
$ausgabe3 = getNebenwirkung($ID_pers, $nebenwirkung);

echo "<p> SQL-Befehl buildCharts(\$alter, \$medikament, \$geschlecht, \$vorbelastung):<br>----";
echo $ausgabe;
echo "</p>";
echo "<p> SQL-Befehl getWirkung(\$ID_pers):<br>----";
echo $ausgabe2;
echo "</p>";
echo "<p> SQL-Befehl getNebenwirkung(\$ID_pers, \$nebenwirkung):<br>----";
echo $ausgabe3;
echo "</p>";


?>
</body>
</html>

