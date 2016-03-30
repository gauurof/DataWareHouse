<?php
$link = mysql_connect ("localhost", "root", "ms" )
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

for($i = 0; $i < count($nebenwirkungen); $i++){
	 $j = $i+1;
	 $sql ="INSERT INTO `Nebenwirkung` (`ID`, `Name`, `Wertung`) VALUES('$j', '$nebenwirkungen[$i]', $wertung[$i])";
                $result = mysql_query($sql);
                if ($result != 1){
                        echo "ABORT: SQL Query not or not completely successful\n";
                        echo $sql."\n";
                        break;
                }

}
?>
