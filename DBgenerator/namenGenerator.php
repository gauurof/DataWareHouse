<?php
//Database Info
$DB = "alcatas_krankendb";
$TABELLE = "Person";

//name tables
$lastnameTab = "lastname.csv";
$firstnameTab = "firstname.csv";

//Amount of males and females to create
$amountMales = 500;
$amountFemales = 500;

//connect to database
$link = mysql_connect ("localhost", "root", "ms" ) 
or die ("DB nicht online!");
mysql_select_db ("$DB");

//get amount of Persons already in databse
$sql = "SELECT MAX(id) FROM $TABELLE";
$result = mysql_query($sql);
$ID = mysql_fetch_array($result)[0];

//get names
$resource = $lastnameTab;

$lastNames = array();
$femaleNames = array();
$maleNames = array();
if (($handle = fopen($lastnameTab, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
         array_push($lastNames,$data[0]);
    }
    fclose($handle);
}

if (($handle = fopen($firstnameTab, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        array_push($femaleNames,$data[0]);
	array_push($maleNames,$data[1]);
    }
    fclose($handle);
}

$i = $ID + 1;
$gender = "f";
$amount = $amountFemales;
$firstNames= $femaleNames;

for ( $g = 0; $g <= 1; $g++){
	for ($i; $i <= $ID + $amount; $i++){
	//generate name
	$name = $lastNames[rand(1, count($lastNames)-1)];

	$firstname = $firstNames[rand(1, count($firstNames)-1)];	

/*****************GEBURTSJAHRGENERATOR******************************************/
// Ein zufälliges Jahr zwischen 1 und 5000. Natürlich auch änderbar
$jahr = rand(date("Y")-100,date("Y")-1);
// Ein Zufallsmonat
$monat = rand(1,12);
 
// Die Abfrage, welcher Monat nun 31,30,29 oder 28 Tage hat
if ( $monat == 1 || $monat == 3 || $monat == 5 || $monat == 7 || $monat == 8 || $monat == 10 || $monat == 12 )
{
        // Hier wird ein Tag erstellt für einen Monat mit 31 Tage
    $tag = rand(1,31);
}
else
{
    if ( $monat != 2)
    {
                // Hier wird ein Tag erstellt für einen Monat mit 30 Tage, aber nur, wenn der Monat nicht Februar ist.
        $tag = rand(1,30);
    }
    else
    {
                // Hier wird nach dem Schaltjahr gefragt. % teilt das Jahr durch 4 und gibt dir den Rest wieder.
                // Wenn der Wert = 0 ist, ist ein Schaltjahr vorhanden. Ansonsten nicht.
        $schaltjahr = $jahr % 4;
        if ( $schaltjahr == 0)
        {
            $tag = rand (1,29);
        }
        else
        {
            $tag = rand (1,28);
        }
    }
}
/*******************************************************************************/ 
		//Nun die ganzen Werte in einen String umwandeln...
		$birthdate = $jahr . "-" . $monat . "-" . $tag;


		$sql ="INSERT INTO $TABELLE (`ID`, `Name`, `Vorname`, `Geschlecht`, `Geburtsdatum`) VALUES('$i', '$name', '$firstname', '$gender', '$birthdate')";
		$result = mysql_query($sql);
		if ($result != 1){
			echo "ABORT: SQL Query not or not completely successful\n";
			echo $sql."\n";
			break;
		}
	}
$gender = "m";
$amount = $amountFemales + $amountMales;
$firstNames = $maleNames;
}

?>
