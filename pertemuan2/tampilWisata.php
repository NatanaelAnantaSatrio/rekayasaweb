<?php
function curl($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // Optional: Disable SSL verification for local development (use with caution)
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $output = curl_exec($ch);

    // Check for cURL error
    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
        curl_close($ch);
        exit; // Exit to prevent further errors
    }

    curl_close($ch);
    return $output;
}

// Fetch data from localhost
$send = curl("http://localhost/rekayasaweb/pertemuan2/getWisata.php");

// Check if JSON is valid
$data = json_decode($send, TRUE);
if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
    echo "JSON Decode Error: " . json_last_error_msg();
    exit;
}

// Loop through the data
foreach($data as $row){
    echo $row["id_wisata"]."<br/>";
    echo $row["kota"]."<br/>";
    echo $row["landmark"]."<br/>";
    echo $row["tarif"]."<br/><hr/>";
}
?>
