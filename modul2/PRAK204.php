<?php
// Inisialisasi variabel
$nilai = "";
$hasil = "";

// Memeriksa apakah tombol konversi telah ditekan
if (isset($_POST["konversi"])) {
    $nilai = $_POST["nilai"];

    // Memastikan input tidak kosong
    if ($nilai !== "") {
        // Konversi nilai menjadi integer untuk akurasi perbandingan
        $num = (int)$nilai;

        // Logika penentuan kategori ejaan berdasarkan batas limit (0 - 999)
        if ($num < 0 || $num >= 1000) {
            $hasil = "Anda Menginput Melebihi Limit Bilangan";
        } elseif ($num == 0) {
            $hasil = "Nol";
        } elseif ($num >= 1 && $num <= 9) {
            $hasil = "Satuan";
        } elseif ($num >= 11 && $num <= 19) {
            $hasil = "Belasan";
        } elseif ($num == 10 || ($num >= 20 && $num <= 99)) {
            $hasil = "Puluhan";
        } elseif ($num >= 100 && $num <= 999) {
            $hasil = "Ratusan";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konversi Bilangan Cacah</title>
    <style>
        body {
            font-family: serif;
        }
        form {
            margin-bottom: 20px;
        }
        .hasil-box {
            font-size: 24px; /* Membuat teks besar */
            font-weight: bold; /* Membuat teks bold */
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <form action="" method="POST">
        Nilai : <input type="number" name="nilai" value="<?php echo htmlspecialchars($nilai); ?>" required><br>
        <input type="submit" name="konversi" value="Konversi">
    </form>

    <?php
    // Menampilkan hasil hanya jika proses konversi telah dilakukan
    if ($hasil !== "") {
        echo "<div class='hasil-box'>";
        echo "Hasil : " . $hasil;
        echo "</div>";
    }
    ?>

</body>
</html>