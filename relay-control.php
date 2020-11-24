



<?php
$page = $_SERVER['PHP_SELF'];
$sec = "5";
?>
<html>
    <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    </head>
    <body>
    <?php
        echo "Deze pagina vervest zichzelf elke 5 seconden";
    ?>
    </body>
</html>


<?php

//relais 1
$currentStatus1 = "0";
$filename1 = "relay-status1.txt";
if(!file_exists($filename1)){
   file_put_contents($filename1, "0");
}
else{
   $contents1 = file_get_contents($filename1);
   $contents1 = trim($contents1);
   if($contents1 == "1") $currentStatus1 = "1";
   elseif($contents1 == "0") $currentStatus1 = "0";
   else{
      $currentStatus1 = "0";
      file_put_contents($filename1, "0");
   }
}


if(isset($_GET['status1'])){
   $submittedStatus1 = trim($_GET['status1']);
   if($submittedStatus1 == "1"){
      if($currentStatus1 == "0"){
      $currentStatus1 = "1";
         file_put_contents($filename1, "1");
      }
   }
   elseif($submittedStatus1 == "0"){
      if($currentStatus1 == "1"){
         $currentStatus1 = "0";
         file_put_contents($filename1, "0");
      }
   }
}


// relais 2
$currentStatus2 = "0";
$filename = "relay-status2.txt";
if(!file_exists($filename)){
   file_put_contents($filename, "0");
}
else{
   $contents = file_get_contents($filename);
   $contents = trim($contents);
   if($contents == "1") $currentStatus2 = "1";
   elseif($contents == "0") $currentStatus2 = "0";
   else{
      $currentStatus2 = "0";
      file_put_contents($filename, "0");
   }
}


if(isset($_GET['status2'])){
   $submittedStatus = trim($_GET['status2']);
   if($submittedStatus == "1"){
      if($currentStatus2 == "0"){
      $currentStatus2 = "1";
         file_put_contents($filename, "1");
      }
   }
   elseif($submittedStatus == "0"){
      if($currentStatus2 == "1"){
         $currentStatus2 = "0";
         file_put_contents($filename, "0");
      }
   }
}


// relais 3
$currentStatus3 = "0";
$filename = "relay-status3.txt";
if(!file_exists($filename)){
   file_put_contents($filename, "0");
}
else{
   $contents = file_get_contents($filename);
   $contents = trim($contents);
   if($contents == "1") $currentStatus3 = "1";
   elseif($contents == "0") $currentStatus3 = "0";
   else{
      $currentStatus3 = "0";
      file_put_contents($filename, "0");
   }
}


if(isset($_GET['status3'])){
   $submittedStatus = trim($_GET['status3']);
   if($submittedStatus == "1"){
      if($currentStatus3 == "0"){
      $currentStatus3 = "1";
         file_put_contents($filename, "1");
      }
   }
   elseif($submittedStatus == "0"){
      if($currentStatus3 == "1"){
         $currentStatus3 = "0";
         file_put_contents($filename, "0");
      }
   }
}


//relais 1 en 4
print "<br><br>";

	
print "</b><font size = 8 color = black><b>Oscar 100 transverter en eindtrap : </font>  ";
if($currentStatus1 == "1") print "<font size = 8 color = red><b>uitgeschakeld</b></font>";
else print "<font size = 8 color = green><b>ingeschakeld</b></font>";


print "<br> <font size = 8 color = black><b>Klik hier om te schakelen : </font>";
if($currentStatus1 == "1") print "<a href ='relay-control.php?status1=0'><font size = 8 color = green><b>inschakelen</b></font></a>";
else print "<a href = 'relay-control.php?status1=1'><font size = 8 color = red><b>uitschakelen</b></font></a>";


//relais 2

print "<br><br><br><br>";

	
print "</b><font size = 8 color = black><b>LNB orientatie : </font>  ";
if($currentStatus2 == "1") print "<font size = 8 color = red><b>Horizontaal</b></font>";
else print "<font size = 8 color = green><b>Vertikaal</b></font>";


print "<br> <font size = 8 color = black><b>Klik hier Narrow band / Wide Band : </font>";
if($currentStatus2 == "1") print "<a href ='relay-control.php?status2=0'><font size = 8 color = green><b>Vertikaal</b></font></a>";
else print "<a href = 'relay-control.php?status2=1'><font size = 8 color = red><b>Horizontaal</b></font></a>";

//relais 3

print "<br><br><br><br>";

	
print "</b><font size = 8 color = black><b>Relais 3, power : </font>  ";
if($currentStatus3 == "1") print "<font size = 8 color = red><b>Relais 3 OFF</b></font>";
else print "<font size = 8 color = green><b>Relais 3 ON</b></font>";


print "<br> <font size = 8 color = black><b>Klik hier om te schakelen : </font>";
if($currentStatus3 == "1") print "<a href ='relay-control.php?status3=0'><font size = 8 color = green><b>Relais 3 ON</b></font></a>";
else print "<a href = 'relay-control.php?status3=1'><font size = 8 color = red><b>Relais 3 OFF</b></font></a>";

print "<br><br><br><br>";

// display de tijd en de gemeten teperatuur per sensor


 echo file_get_contents( "/home/pi/temp-data.txt" );



?>

