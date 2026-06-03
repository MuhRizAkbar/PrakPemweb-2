<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Segitiga Gambar</title>
    <style>
        /* Mengatur ukuran standar gambar agar pola terlihat rapi */
        .gambar-pola {
            width: 40px;
            height: 40px;
            object-fit: cover;
            margin: 2px;
            vertical-align: middle;
        }
        /* Mengatur blok spasi untuk mendorong gambar ke kanan */
        .spasi-kosong {
            display: inline-block;
            width: 44px; /* Menyesuaikan lebar gambar + margin kiri & kanan */
            height: 40px;
        }
        /* Kontainer untuk menjaga baris agar tidak berantakan */
        .kontainer-pola {
            white-space: nowrap;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <form method="POST" action="">
        <div style="margin-bottom: 10px;">
            <label for="tinggi">Tinggi : </label>
            <input type="number" id="tinggi" name="tinggi" min="1" required>
        </div>
        <div style="margin-bottom: 10px;">
            <label for="gambar">Alamat gambar : </label>
            <input type="url" id="gambar" name="gambar" required placeholder="https://contoh.com/gambar.png">
        </div>
        <button type="submit" name="cetak">Cetak</button>
    </form>

    <hr>

    <?php
    // Mengecek apakah tombol 'Cetak' sudah ditekan
    if (isset($_POST['cetak'])) {
        // Mengambil input tinggi dan URL gambar
        $tinggi = (int)$_POST['tinggi'];
        $gambar = htmlspecialchars($_POST['gambar']); // Mengamankan input URL

        echo "<div class='kontainer-pola'>";
        
        // Inisialisasi variabel baris (i)
        $i = 1;

        // Perulangan while utama untuk mengatur baris
        while ($i <= $tinggi) {
            
            // 1. Perulangan while untuk mencetak SPASI KOSONG (mendorong ke kanan)
            $j = 1;
            // Jumlah spasi di setiap baris adalah ($i - 1)
            while ($j < $i) {
                echo "<span class='spasi-kosong'></span>";
                $j++;
            }

            // 2. Perulangan while untuk mencetak GAMBAR
            $k = 1;
            // Jumlah gambar yang dicetak menurun setiap barisnya: ($tinggi - $i + 1)
            $jumlah_gambar = $tinggi - $i + 1;
            while ($k <= $jumlah_gambar) {
                echo "<img src='{$gambar}' class='gambar-pola' alt='O'>";
                $k++;
            }

            // Pindah ke baris baru setelah satu baris selesai dicetak
            echo "<br>";
            
            // Increment baris
            $i++;
        }
        
        echo "</div>";
    }
    ?>

</body>
</html>