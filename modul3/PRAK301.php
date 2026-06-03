<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Daftar Peserta</title>
    <style>
        /* Mengatur styling untuk Semi-Besar dan Bold */
        .peserta {
            font-size: 24px; /* Ukuran Semi-Besar */
            font-weight: bold; /* Teks Bold */
            margin-bottom: 8px;
        }
        /* Mengatur warna */
        .merah { color: red; }
        .hijau { color: green; }
    </style>
</head>
<body>

    <form method="POST" action="">
        <label for="jumlah">Jumlah Peserta : </label>
        <input type="number" id="jumlah" name="jumlah" min="1" required>
        <button type="submit" name="cetak">Cetak</button>
    </form>

    <hr>

    <?php
    // Mengecek apakah tombol 'Cetak' sudah ditekan
    if (isset($_POST['cetak'])) {
        // Mengambil jumlah dari input dan memastikan nilainya integer
        $jumlah = (int)$_POST['jumlah'];
        
        // Inisialisasi variabel penghitung untuk perulangan while
        $i = 1;

        // Wajib menggunakan perulangan while
        while ($i <= $jumlah) {
            
            // Menentukan warna: Jika angka ganjil (sisa bagi 2 tidak sama dengan 0) maka Merah, jika genap Hijau
            if ($i % 2 != 0) {
                $kelasWarna = "merah";
            } else {
                $kelasWarna = "hijau";
            }
            
            // Mencetak baris peserta
            echo "<div class='peserta {$kelasWarna}'>Peserta ke {$i}</div>";
            
            // Increment agar perulangan tidak berjalan terus menerus (infinite loop)
            $i++;
        }
    }
    ?>

</body>
</html>