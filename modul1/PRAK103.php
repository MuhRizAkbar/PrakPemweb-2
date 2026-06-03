<?php
// 1. Deklarasi parameter statis sesuai ketentuan
$celcius = 37.841;

// 2. Kalkulasi Konversi Suhu
// Rumus Fahrenheit: (C * 9/5) + 32
$fahrenheit = ($celcius * 9/5) + 32;

// Rumus Reamur: C * 4/5
$reamur = $celcius * 4/5;

// Rumus Kelvin: C + 273.15
$kelvin = $celcius + 273.15;

// 3. Menampilkan hasil dengan 4 desimal di belakang koma
// Menggunakan number_format($variabel, jumlah_desimal, 'pemisah_desimal', 'pemisah_ribuan')
echo "Fahrenheit (F) = " . number_format($fahrenheit, 4, ',', '') . "<br>";
echo "Reamur (R) = " . number_format($reamur, 4, ',', '') . "<br>";

// Catatan: Di expected output tertulis 310,991 (3 desimal), 
// namun karena instruksi meminta 4 desimal, output akan menjadi 310,9910
echo "Kelvin (K) = " . number_format($kelvin, 4, ',', '') . "<br>";
?>

