<?php
 require_once('saver.php');
 include('Exception.php');
 class JSON_SAVER extends Saver{

   	 	function save() {
		
		$i = 0;
		$strJsonFileContents = file_get_contents("data.json");

    	$array = json_decode($strJsonFileContents, true);	
    	foreach ($array as $key => $value) {
    		foreach($value as $val) {
        		$data[$i] = $val;
        		$i++;
    		}
    	}



    	try{

    		$e = new Exceptions();
    		$e->InvalidDateException();
    		$e->InvalidTimePeriod();
    		$e->InvalidParticipantsNumber();
    		$e->ImpossibleTimePeriod();

			$data[$i] = [$_REQUEST['name'],$_REQUEST['events'],$_REQUEST['date'],$_REQUEST['hour1'],$_REQUEST['hour2']];

			$j = 4;

			if ( $_REQUEST['number'] != null ) {
				$j = $j + 1;
				$data[$i][$j] = $_REQUEST['number'];
			}

			if ($_REQUEST['stile'] != null) {
				$j = $j + 1;
				$data[$i][$j] = $_REQUEST['stile'];
			}

			if (isset($_REQUEST['interdict'])) {
				if($_REQUEST['interdict'] != null) {
					$j = $j + 1;
					$data[$i][$j] = "Interzis consumul de carne";
				}else{

				}
		    }

		    if (isset($_REQUEST['adult'])) {
				if ($_REQUEST['adult'] != null) {
					$j = $j + 1;
					$data[$i][$j] = "Interzis minorilor";
				}else{

				}
			}

		}catch(Exception $e) {
        	echo "Error ".$e->getMessage();
        	exit();
        } 
	

		$json = json_encode(array('data' => $data));

		if (!file_put_contents("data.json", $json))
    	echo "Oops! Error creating json file...";
   	}

   }
	
?>