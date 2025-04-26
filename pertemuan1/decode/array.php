<?php
$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';
$arr = json_decode($jsonobj, true);
// mengakses nilai array
echo $arr["Peter"] . "<br>";
echo $arr["Ben"] . "<br>";
echo $arr["Joe"] . "<br>";
?>
