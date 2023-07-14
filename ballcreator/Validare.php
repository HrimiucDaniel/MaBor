<?php 
date_default_timezone_set('Europe/Bucharest');

class Validare{
	public function ValidareDataBall($ball){
		$currentDate = date("d.m.Y");
    	$Date = $ball[2];  

		$dateTimestamp1 = strtotime($Date);
		$dateTimestamp2 = strtotime($currentDate);

		if ($dateTimestamp1 <= $dateTimestamp2 && $dateTimestamp1 >= $dateTimestamp2)  return "Astazi!!!";
	}
	public function ValidareInceputBall($ball) {
		$hourMin = date('H:i');
		$x =  $ball[3] - $hourMin;
		if ($x <= 2 && $x>=0) return "In 2 ore";
	}
	public function ValidareBallDesfasurare($ball) {
		$hourMin = date('H:i');
		if ($hourMin >= $ball[3] && $hourMin <= $ball[4]) return "Ball in Desfasurare";
	}

	public function ValidareBalIncheiat($ball) {
		$date = new DateTime($ball[2]." ".$ball[4]);
		$date = $date->format('d-m-Y H:i');
		$currentDate = date("d-m-Y H:i");

		$currentHour = date("H:i");
		$currentDay = date("d.m.Y");

		$timestampx1 = strtotime($currentHour);
		$timestampx2 = strtotime($ball[4]);

		$timestampy1 = strtotime($currentDay);
		$timestampy2 = strtotime($ball[2]);



		$timestamp1 = strtotime($date);
		$timestamp2 = strtotime($currentDate);
		

		$hour = (int) (($timestamp2 - $timestamp1)/(60*60));

		
		if ($timestamp1 > $timestamp2) return "no";
		if ($hour <= 48) return "yes";
		else return "delete";

	}
}
?>