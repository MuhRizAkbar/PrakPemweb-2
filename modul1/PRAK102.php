<?php
// 1. Deklarasi parameter statis sesuai ketentuan soal
$jari_jari = 4.2;
$tinggi    = 5.4;
$panjang   = 8.9;
$lebar     = 14.7;
$sisi      = 7.9;

// 2. Menentukan variabel yang digunakan untuk Prisma Alas Segitiga
// Asumsi pemetaan parameter:
// - Alas segitiga   = $panjang
// - Tinggi segitiga = $lebar
// - Tinggi prisma   = $tinggi
$alas_segitiga   = $panjang;
$tinggi_segitiga = $lebar;
$tinggi_prisma   = $tinggi;

// 3. Menghitung Luas Alas (Segitiga) dan Volume Prisma
// Rumus Luas Segitiga = 1/2 * alas * tinggi_segitiga
$luas_alas = 0.5 * $alas_segitiga * $tinggi_segitiga;

// Rumus Volume Prisma = Luas Alas * tinggi_prisma
$volume = $luas_alas * $tinggi_prisma;

// 4. Menampilkan hasil dengan 3 desimal di belakang koma
echo "<h3>Kalkulasi Volume Prisma Alas Segitiga</h3>";
echo "Parameter awal:<br>";
echo "- Jari-jari = $jari_jari <br>";
echo "- Tinggi = $tinggi <br>";
echo "- Panjang = $panjang <br>";
echo "- Lebar = $lebar <br>";
echo "- Sisi = $sisi <br><br>";

echo "Nilai yang digunakan untuk kalkulasi:<br>";
echo "- Alas Segitiga (Panjang) = $alas_segitiga <br>";
echo "- Tinggi Segitiga (Lebar) = $tinggi_segitiga <br>";
echo "- Tinggi Prisma (Tinggi) = $tinggi_prisma <br><br>";

// Menggunakan number_format() untuk memaksa 3 angka di belakang koma
echo "Luas Alas Segitiga = 1/2 * $alas_segitiga * $tinggi_segitiga = " . $luas_alas . "<br>";
echo "Volume Prisma = Luas Alas * Tinggi Prisma = " . $luas_alas . " * " . $tinggi_prisma . "<br><br>";
echo "<b>Hasil Volume Prisma (3 desimal): " . number_format($volume, 3, '.', '') . "</b>";
?>