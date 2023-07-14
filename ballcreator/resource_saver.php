
<?php
  include "json_saver.php";
  include "csv_saver.php";

  $csv = new CSV_SAVER();
  $json = new JSON_SAVER();

  $csv->save();
  $json->save(); 

  include "controler.php";

?>
