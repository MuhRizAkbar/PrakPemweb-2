<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinamis Tambah Kurang Bintang</title>
    <style>
        /* Mengatur ukuran gambar bintang */
        .bintang {
            width: 30px;
            height: 30px;
            vertical-align: middle;
            margin: 4px;
        }
        /* Tata letak hasil */
        .hasil-container {
            margin-top: 20px;
        }
        .bintang-baris {
            margin: 10px 0;
            min-height: 40px; /* Menjaga spasi tetap ada meski bintang 0 atau negatif */
        }
        form {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <?php
    // Inisialisasi variabel
    $jumlah_bintang = null;

    // 1. Logika untuk menangkap input pertama kali
    if (isset($_POST['submit_awal'])) {
        $jumlah_bintang = (int)$_POST['jumlah_input'];
    } 
    // 2. Logika ketika tombol 'Tambah' ditekan
    elseif (isset($_POST['tambah'])) {
        $jumlah_bintang = (int)$_POST['jumlah_saat_ini'] + 1;
    } 
    // 3. Logika ketika tombol 'Kurang' ditekan
    elseif (isset($_POST['kurang'])) {
        $jumlah_bintang = (int)$_POST['jumlah_saat_ini'] - 1;
    }

    // Jika variabel $jumlah_bintang masih null (artinya halaman baru dibuka)
    if ($jumlah_bintang === null) {
        // Tampilkan Form Input Awal
    ?>
        <form method="POST" action="">
            <label for="jumlah_input">Jumlah Bintang : </label>
            <input type="number" id="jumlah_input" name="jumlah_input" required>
            <button type="submit" name="submit_awal">Submit</button>
        </form>

    <?php
    } else {
        // Jika sudah di-submit, tampilkan Hasil dan tombol Tambah/Kurang
    ?>
        <div class="hasil-container">
            <h3>Jumlah Bintang <?php echo $jumlah_bintang; ?></h3>
            
            <div class="bintang-baris">
                <?php
                // Mencetak gambar bintang sesuai jumlah
                // Jika $jumlah_bintang <= 0, perulangan ini otomatis tidak akan tereksekusi
                for ($i = 1; $i <= $jumlah_bintang; $i++) {
                    echo "<img src='bintang.png' class='bintang' alt='O'>";
                }
                ?>
            </div>

            <form method="POST" action="">
                <input type="hidden" name="jumlah_saat_ini" value="<?php echo $jumlah_bintang; ?>">
                
                <button type="submit" name="tambah">Tambah</button>
                <button type="submit" name="kurang">Kurang</button>
            </form>
        </div>
    <?php
    }
    ?>

</body>
</html>