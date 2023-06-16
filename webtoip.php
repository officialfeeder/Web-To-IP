<?php
// Menerima input nama file dan nama file output melalui CLI
$inputFile = readline('List : ');
$outputFile = readline('Save Result : ');

// Membaca konten file input sebagai array berdasarkan baris
$websites = file($inputFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Array untuk menyimpan hasil IP
$results = array();

// Looping melalui setiap alamat website dan memeriksa IP-nya
foreach ($websites as $line => $website) {
    // Memeriksa apakah website tidak kosong
    if (!empty($website)) {
        $ip = gethostbyname($website);
        $results[] = "$ip";
        echo "[ $line ]: IP dari $website adalah: $ip" . PHP_EOL;
    } else {
        $results[] = "[ $line ] : Website tidak valid atau tidak ditemukan.";
        echo "[ $line ] : Website tidak valid atau tidak ditemukan." . PHP_EOL;
    }
}

// Menyimpan hasil IP ke file baru dengan nama yang ditentukan melalui CLI
$outputContent = implode(PHP_EOL, $results);
file_put_contents($outputFile, $outputContent);

echo "Pengecekan selesai. Hasil IP disimpan di $outputFile" . PHP_EOL;
?>
