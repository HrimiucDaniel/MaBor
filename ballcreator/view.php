<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="articles.css">
   <title>Logare</title>
</head>
<body>
<?php
   foreach ($date as $dat) {      
      if ($dat != null) {
       if (strcmp($dat[1],"cabaret") == 0) $string = "cabaret";
        else if (strcmp($dat[1],"futurism") == 0) $string = "futurism";
        else if (strcmp($dat[1],"Mitologie") == 0) $string = "mitologie";
        else if (strcmp($dat[1],"Medieval") == 0) $string = "medieval";
         else if (strcmp($dat[1],"Victorian") == 0) $string = "victorian";
?>
<article class = <?php echo $string; ?> >
<h2><?php echo $dat[0]; ?></h2>
<p class="event"><?php echo "Tematica:".$dat[1];?></p>
<p><?php 

$orgDate = $dat[2];  
$newDate = date("d-M-Y", strtotime($orgDate));  
echo $newDate;



?></p>
<p><?php echo "Interval orar:".$dat[3]."-".$dat[4];?></p>
<p><?php if (isset($dat[5])) echo "Maxim persoane:".$dat[5];?></p>
<p><?php if (isset($dat[6])) echo "Restrictii de stil:".$dat[6];?></p>
<p><?php if (isset($dat[7])) echo $dat[7];?></p>
<p><?php if (isset($dat[8])) echo $dat[8];?></p>
<p class="sp"><?php if (isset($dat[9])) echo $dat[9];?></p>
<p>
   <?php 
   if (isset($dat[10])) $string2 = "hidden";
   else $string2 = "shown";
   ?>
   
</p>
<p><?php if (isset($dat[11]) && $dat[11] !=null) {echo $dat[11];$string2="hidden";}?></p>
<p class="sp"><?php if (isset($dat[12])) {echo $dat[12];$string2 = "hidden";}?></p>
<?php
      
?>
<form  action="" method="post">
<input class=<?php echo $string2; ?>   type="submit" id="generate" name="generate" value="Generare Invitatii">
</form>
<form action="coments_saver.php" method="post">
<label for="comment" class="label">Posteaza un comentariu</label><br>
<input type = "text" name="comment" id = "comment" class="textfield">
</form>
</article>
<br><br><br>
<?php
      }
   }
   

?>

</body>
</html>

