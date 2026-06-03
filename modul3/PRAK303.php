<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deret Kelipatan dengan Bintang</title>
    <style>
        /* Mengatur ukuran gambar bintang agar sejajar dengan teks */
        .bintang {
            width: 20px;
            height: 20px;
            vertical-align: middle;
            margin: 0 4px;
        }
        /* Mengatur jarak antar teks angka */
        .angka {
            margin: 0 4px;
            font-size: 18px;
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <form method="POST" action="">
        <div style="margin-bottom: 10px;">
            <label for="bawah">Batas Bawah : </label>
            <input type="number" id="bawah" name="bawah" required>
        </div>
        <div style="margin-bottom: 10px;">
            <label for="atas">Batas Atas : </label>
            <input type="number" id="atas" name="atas" required>
        </div>
        <button type="submit" name="cetak">Cetak</button>
    </form>

    <hr>

    <div class="container">
    <?php
    // Mengecek apakah tombol 'Cetak' sudah ditekan
    if (isset($_POST['cetak'])) {
        $bawah = (int)$_POST['bawah'];
        $atas = (int)$_POST['atas'];
        
        // Memastikan batas bawah tidak lebih besar dari batas atas
        if ($bawah <= $atas) {
            
            // Inisialisasi nilai awal sebelum masuk ke blok do-while
            $i = $bawah;

            // Wajib menggunakan perulangan do-while
            do {
                // Mengecek apakah angka jika ditambah 7 merupakan kelipatan 5
                // Suatu bilangan kelipatan 5 jika di-modulus (%) 5 hasilnya 0
                if (($i + 7) % 5 == 0) {
                    // Pastikan file gambar Anda bernama 'bintang.png' dan berada di folder yang sama
                    echo "<img src='bintang.png' class='bintang' alt='O'>";
                } else {
                    echo "<span class='angka'>{$i}</span>";
                }
                
                // Increment agar nilai $i bertambah
                $i++;
                
            // Kondisi pengecekan berada di akhir (do-while)
            } while ($i <= $atas);

        } else {
            echo "Batas Bawah harus lebih kecil atau sama dengan Batas Atas.";
        }
    }
    ?>
    </div>

</body>
</html>