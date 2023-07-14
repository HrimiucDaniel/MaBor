<?php
	include "saver.php";
	class Comments_Saver_Csv extends Saver{
		public function save() {

			$i = 0;	
			$csvFile = file('info2.csv');
  	 		$data = [];
  	 		foreach ($csvFile as $key => $line) {
        		$data = str_getcsv($line);
     	   	$data2[$i]  = $data;
        	$i = $i + 1;
        }
        	$data2[$i] =  $_REQUEST['comment'];
        	echo $_REQUEST['comment'];

			$filename = 'info2.csv';

			$f = fopen($filename, 'w');

			foreach($data2 as $data1)
				fputcsv($f, $data2);

			fclose($f);
    

		}
	}
?>