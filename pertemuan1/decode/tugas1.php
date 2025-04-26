<?php
// nomor2.php
// 2. Buat variabel JSON, decode ke PHP Object dan PHP Array

$jsonString = '{"name":"Bob","age":30,"city":"Bandung"}';

// Decode ke dalam bentuk PHP Object
$objectResult = json_decode($jsonString);

echo "Akses data dari PHP Object:<br>";
echo "Nama: " . $objectResult->name . "<br>";
echo "Umur: " . $objectResult->age . "<br>";
echo "Kota: " . $objectResult->city . "<br><br>";

// Decode ke dalam bentuk PHP Array
$arrayResult = json_decode($jsonString, true);

echo "Akses data dari PHP Array:<br>";
echo "Nama: " . $arrayResult["name"] . "<br>";
echo "Umur: " . $arrayResult["age"] . "<br>";
echo "Kota: " . $arrayResult["city"] . "<br>";
?>
