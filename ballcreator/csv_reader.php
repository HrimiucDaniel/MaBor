 <?php
   $csvFile = file('info.csv');
    $data = [];
    foreach ($csvFile as $line) {
        $data = str_getcsv($line);
        echo $data[0];
    }
 ?>