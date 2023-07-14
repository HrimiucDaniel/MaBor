<?php

class Exceptions{
	public function InvalidDateException(){
		$currentDate = date("d.m.y");
    	$orgDate = $_REQUEST['date'];  
		$newDate = date("d-M-Y", strtotime($orgDate));  

		$dateTimestamp1 = strtotime($_REQUEST['date']);
		$dateTimestamp2 = strtotime($currentDate);

		if ($dateTimestamp1 < $dateTimestamp2) {

    		throw new Exception("Date Invalid. The event must take place at least one day after the annoucement is generated.");
    		
		}
   
	}
	public function InvalidTimePeriod(){
		$time1 = strtotime($_REQUEST['hour1']);
		$time2 = strtotime($_REQUEST['hour2']);
		$difference = round(abs($time2 - $time1) / 3600,2);
		if ($difference < 1.00 && $difference > 5.00) throw new Exception("Invalid Time. The event must last at least one hour and maximum five hours.");
	}

	public function ImpossibleTimePeriod(){
		$time1 = strtotime($_REQUEST['hour1']);
		$time2 = strtotime($_REQUEST['hour2']);
		if ($time1>$time2) throw new Exception("Impossible Time. Please check time period knowing that start time is always lower than end time.");
	}

	public function InvalidParticipantsNumber(){
		if ( $_REQUEST['number'] != null ) {
			$number = $_REQUEST['number'];
			if ($number <= 10 or $number >= 500) throw new Exception("Invalid Participants Number. The event must have between 10 and 500 participants."); 
		}
	}
}

?>