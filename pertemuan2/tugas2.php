<?php
function curl($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Optional for local
    $output = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
        curl_close($ch);
        exit;
    }
    curl_close($ch);
    return $output;
}

$send = curl("http://localhost/rekayasaweb/pertemuan2/getWisata.php");
$data = json_decode($send, TRUE);
if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
    echo "JSON Decode Error: " . json_last_error_msg();
    exit;
}

// Start HTML table
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>KOTA</th><th>LANDMARK</th><th>TARIF</th></tr>";

foreach($data as $row){
    echo "<tr>";
    echo "<td>".$row["kota"]."</td>";
    echo "<td>".$row["landmark"]."</td>";
    echo "<td>".$row["tarif"]."</td>";
    echo "</tr>";
}

echo "</table>";
?>
