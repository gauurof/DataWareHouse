<?php
$link = mysql_connect ("localhost", "root", "MetalForce81" )
or die ("DB nicht online!");
mysql_select_db ("alcatas_krankendb");


$nebenwirkungen = array();
$wertung = array();
if (($handle = fopen("nebenwirkungen.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        array_push($nebenwirkungen,$data[0]);
	array_push($wertung,$data[1]);
    }
    fclose($handle);
}
//get amount of Nebenwirkungen
$sql = "SELECT MAX(id) FROM `Testergebnis`";
$result = mysql_query($sql);
$ID = mysql_fetch_array($result)[0];

$sql = "SELECT MAX(id) FROM `Person`";
$result = mysql_query($sql);
$ID_P = mysql_fetch_array($result)[0];

for($i = $ID; $i <= $ID+10; $i++){
	 $sql ="INSERT INTO `Testergebnis` (`ID`, `ID_Medikament`, `ID_Wirkung`, `ID_Person`) VALUES($i, rand(1, 5), rand(1, 5), rand(1, $ID_P)";
                $result = mysql_query($sql);
                if ($result != 1){
                        echo "ABORT: SQL Query not or not completely successful\n";
                        echo $sql."\n";
                        break;
                }

}


$sql = "SELECT MAX(id) FROM `Nebenwirkung`";
$result = mysql_query($sql);
$ID_N = mysql_fetch_array($result)[0];

$sql = "SELECT MAX(id) FROM `Testergebnis`";
$result = mysql_query($sql);
$ID_T = mysql_fetch_array($result)[0];


for($i = $ID; $i <= 100; $i++){
         $sql ="INSERT INTO `TestergebnisNebenwirkung` (`ID_Testergebnis`, `ID_Nebenwirkung`) VALUES($i, rand(1, ID_T), rand(1, $ID_N)";
                $result = mysql_query($sql);
                if ($result != 1){
                        echo "ABORT: SQL Query not or not completely successful\n";
                        echo $sql."\n";
                        break;
                }

}




?>
