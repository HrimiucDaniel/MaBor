
<?php

   include "json_reader.php";

   $jsonr = new JSON_READER();
   $date = $jsonr->read();

   include "view.php";

?>