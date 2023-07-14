<?php
	include "csv_comments_saver.php";
	
	$csv_saver = new Comments_Saver_Csv();
	$csv_saver->save();

	 include "controler.php";
?>