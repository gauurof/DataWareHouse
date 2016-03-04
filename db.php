<?php
include_once("/config.php");

function getNebenwirkungen(){
	$tmp = mysql_query("SELECT `Name` FROM `Nebenwirkung`;");
	while($row = mysql_fetch_object($tmp)){
		$Name[] = $row;
	}
	return $Name;
}

function getMedikamente(){
	$tmp = mysql_query("SELECT `Name` FROM `Medikamente`;");
	while($row = mysql_fetch_object($tmp)){
		$Name[] = $row;
	}
	return $Name;
}

function getPerson($alter, $geschlecht, $ID_vorbelastung){
	$tmp = mysql_query("SELECT `ID` FROM `Person`, `PersonVorbelastung` 
						WHERE `Geburtsdatum` < '$alter[1]' 
						AND `Geburtsdatum` > '$alter[0]' 
						AND" . $geschlecht . $ID_vorbelastung .";");
	while($row = mysql_fetch_object($tmp)){
		$ID_pers[] = $row;
	}
	return $ID_pers;
}

function getWirkung($ID_pers, $ID_medikament){
	for ($i = 0; $i < count($ID_pers); $i++) {
		$tmp = mysql_query("SELECT `Wertung` FROM `Wirkung`,`Testergebnis` 
							WHERE  `Wirkung.ID` = `ID_Wirkung` 
							AND `ID_Person` = $ID_pers[$i]
							AND `ID_Medikament` = $ID_medikament;");
		while($row = mysql_fetch_object($tmp)){
			$wirkung[$tmp] += 1;
		}
	}		
	return $wirkung;

}

function getNebenwirkung($ID_pers, $ID_medikament, $ID_nebenwirkung){
	for ($i = 0; $i < count($ID_pers); $i++) {
		$tmp = mysql_query("SELECT `Nebenwirkung.Wertung` FROM `Nebenwirkung`,`Testergebnis`, `TestergebnisNebenwirkung`
							WHERE  `Test_ID` = `Testergebnis.ID` 
							AND `ID_Person` = $ID_pers[$i]
							AND `Nebenwirkung.ID` = `Nebenwirkung_ID`
							AND `Nebenwirkung.ID` = $ID_nebenwirkung
							AND `ID_Medikament` = $ID_medikament;");
		while($row = mysql_fetch_object($tmp)){
			$nebenwirkungen[$tmp] += 1;
		}
	}		
	return $nebenwirkungen;
}
?>