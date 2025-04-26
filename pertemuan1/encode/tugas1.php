<?php
// nomor1.php
// 1. Buat sebuah variabel array, lalu encode ke format JSON

$person = array(
    "name" => "Alice",
    "age" => 25,
    "city" => "Jakarta"
);

$jsonData = json_encode($person);

echo "Hasil JSON Encode: " . $jsonData;
?>
