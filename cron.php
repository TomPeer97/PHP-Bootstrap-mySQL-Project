<?php
$myfile = fopen("newfile.txt", "a") or die("Unable to open file!");

$time = date('Y-m-d H:i:s') . "\n";
fwrite($myfile, $time);
fclose($myfile);