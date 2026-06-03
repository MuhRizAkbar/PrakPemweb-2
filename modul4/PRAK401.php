<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Matriks</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .form-group { margin-bottom: 10px; }
        .output-matrix { margin-top: 20px; }
    </style>
</head>
<body>

    <form method="POST" action="">
        <div class="form-group">
            <label for="panjang">Panjang : </label>
            <input type="number" id="panjang" name="panjang" required>
        </div>
        <div class="form-group">
            <label for="lebar">Lebar &nbsp;&nbsp;: </label>
            <input type="number" id="lebar" name="lebar" required>
        </div>
        <div class="form-group">
            <label for="nilai">Nilai &nbsp;&nbsp;: </label>
            <input type="text" id="nilai" name="nilai" required>
        </div>
        <button type="submit" name="cetak">Cetak</button>
    </form>

    <div class="output-matrix">
        <?php
        if (isset($_POST['cetak'])) {
            $panjang = (int)$_POST['panjang'];
            $lebar = (int)$_POST['lebar'];
            $nilaiString = trim($_POST['nilai']);

            // Memecah input nilai menjadi array berdasarkan spasi
            // array_filter memastikan spasi ganda tidak terhitung sebagai elemen kosong
            $nilaiArray = array_values(array_filter(explode(" ", $nilaiString), 'strlen'));

            // Menghitung total elemen yang dibutuhkan
            $ukuranMatriks = $panjang * $lebar;

            // Validasi apakah jumlah input nilai sesuai dengan ukuran matriks
            if (count($nilaiArray) === $ukuranMatriks) {
                $index = 0;
                // Cetak matriks sesuai panjang (baris) dan lebar (kolom)
                for ($i = 0; $i < $panjang; $i++) {
                    for ($j = 0; $j < $lebar; $j++) {
                        echo "[" . htmlspecialchars($nilaiArray[$index]) . "] ";
                        $index++;
                    }
                    echo "<br>";
                }
            } else {
                // Cetak pesan error jika tidak sesuai
                echo "Panjang tidak sesuai dengan ukuran matriks";
            }
        }
        ?>
    </div>

</body>
</html>