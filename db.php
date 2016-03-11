<?php
include_once("config.php");

function getNebenwirkungen(){
	$tmp = mysql_query("SELECT Nebenwirkung.Name, Nebenwirkung.ID FROM Nebenwirkung;");
	while($row = mysql_fetch_array($tmp)){
		$Name[] = $row;
	}
	return $Name;
}

function getMedikamente(){
	$tmp = mysql_query("SELECT Medikament.Name, Medikament.ID FROM Medikament;");
	while($row = mysql_fetch_array($tmp)){
		$Name[] = $row;
	}
	return $Name;
}

function getVorbelastungen(){
	$tmp = mysql_query("SELECT Vorbelastung.Name, Vorbelastung.ID FROM Vorbelastung;");
	while($row = mysql_fetch_array($tmp)){
		$Name[] = $row;
	}
	return $Name;
}

function getPerson($alter, $geschlecht, $ID_vorbelastung){
	if($ID_vorbelastung = "none"){
		$query = "SELECT Person.ID FROM Person WHERE TIMESTAMPDIFF(YEAR, Person.Geburtsdatum ,CURDATE()) BETWEEN " . $alter[0] .
                           " AND " . $alter[1] . $geschlecht . ";";
	}
	else{
		$query = "SELECT Person.ID FROM Person, PersonVorbelastung WHERE TIMESTAMPDIFF(YEAR, Person.Geburtsdatum ,CURDATE()) BETWEEN " . $alter[0] .
                 	 " AND " . $alter[1] . $geschlecht . $ID_vorbelastung . ";";
	
#		$query = "SELECT Person.ID FROM Person, PersonVorbelastung WHERE TIMESTAMPDIFF(YEAR, Person.Geburtsdatum ,CURDATE()) BETWEEN " . $alter[0] .
#                        " AND " . $alter[1] . " AND Person.Geschlecht ='" . "f" . "'" . " AND Person.ID = PersonVorbelastung.ID_Person AND PersonVorbelastung.ID_Vorbelastung = 1" . ";";
	}

	$tmp = mysql_query($query);
	while($row = mysql_fetch_array($tmp)){
		$ID_pers[] = $row['ID'];
	}
	return $ID_pers;
}

function getWirkung($ID_pers, $ID_medikament){
	$wirkung = [0,0,0,0,0];
	for ($i = 0; $i < count($ID_pers); $i++) {
		$query = "SELECT Wirkung.Wertung FROM Wirkung, Testergebnis
                                                        WHERE Wirkung.ID = Testergebnis.ID_Wirkung
                                                        AND Testergebnis.ID_Person = " . $ID_pers[$i] .
                                                        " AND Testergebnis.ID_Medikament = " . $ID_medikament . ";";
		$tmp = mysql_query($query);
		while($row = mysql_fetch_object($tmp)){
			$wirkung[$row['Wertung']] += 1;
		}
	}
	return $wirkung;
}

function getNebenwirkung($ID_pers, $ID_medikament, $ID_nebenwirkung){
	$nebenwirkungen= [0,0,0,0,0];
	for ($i = 0; $i < count($ID_pers); $i++) {
		$query = "SELECT Nebenwirkung.Wertung FROM Nebenwirkung, TestergebnisNebenwirkung, Testergebnis  
                                                        WHERE  TestergebnisNebenwirkung.ID_Testergebnis = Testergebnis.ID
                                                        AND Testergebnis.ID_Person = ".$ID_pers[$i].
                                                        " AND Nebenwirkung.ID = TestergebnisNebenwirkung.ID_Nebenwirkung
                                                        AND Nebenwirkung.ID = ".$ID_nebenwirkung.
                                                        " AND Testergebnis.ID_Medikament = ".$ID_medikament.";";
		$tmp = mysql_query($query);
		while($row = mysql_fetch_array($tmp)){
			$nebenwirkungen[$row['Wertung']] += 1;
		}
	}
	return $nebenwirkungen;
}
?>
