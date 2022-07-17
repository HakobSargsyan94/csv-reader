<?php
require_once "Models/JsonInserter.php";

$insert = new JsonInserter('http://csv.rdr/Media/input.csv', 'r');
$insert->execute();
//$handle = fopen("http://csv.rdr/Media/input.csv", "r");
//echo "<pre>";
//for ($i = 0; $row = fgetcsv($handle); ++$i) {
//    var_dump(explode(';', current($row)));
//}
//
//fclose($handle);