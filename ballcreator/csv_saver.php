<?php

require_once('saver.php');

 class CSV_SAVER extends Saver{

    function save() {

	$i = 0;	
	$csvFile = file('info.csv');
    $data = [];
    foreach ($csvFile as $key => $line) {
        $data = str_getcsv($line);
        $data2[$i]  = $data;
        $i = $i + 1;
    }


	$data2[$i] = [$_REQUEST['name'],$_REQUEST['events'],$_REQUEST['date'],$_REQUEST['hour1'],$_REQUEST['hour2']];

	$j = 4;

	if ( $_REQUEST['number'] != null ) {
		$j = $j + 1;
		$data2[$i][$j] = $_REQUEST['number'];
	}

	if ($_REQUEST['stile'] != null) {
		$j = $j + 1;
		$data2[$i][$j] = $_REQUEST['stile'];
	}

	if (isset($_REQUEST['interdict'])) {
		if($_REQUEST['interdict'] != null) {
			$j = $j + 1;
			$data2[$i][$j] = "Interzis consumul de carne";
		}else{

		}
	}

	if (isset($_REQUEST['adult'])) {
		if ($_REQUEST['adult'] != null) {
			$j = $j + 1;
			$data2[$i][$j] = "Interzis minorilor";
		}else{

		}
	}
	

	$filename = 'info.csv';

	$f = fopen($filename, 'w');

	foreach($data2 as $data1)
	fputcsv($f, $data1);

	fclose($f);

    }
 }
	 
?>
