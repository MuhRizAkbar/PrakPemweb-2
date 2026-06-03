<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Karakter Sesuai Panjang String</title>
    <style>
        /* Tata letak dasar untuk merapikan tampilan */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .hasil {
            margin-top: 20px;
            font-size: 18px;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 4px;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <form method="POST" action="">
        <input type="text" name="input_string" required placeholder="Masukkan kata...">
        <button type="submit" name="submit">Submit</button>
    </form>

    <hr>

    <?php
    // Mengecek apakah tombol 'Submit' sudah ditekan
    if (isset($_POST['submit'])) {
        // Mengambil string dari inputan pengguna
        $input_string = $_POST['input_string'];
        
        // Menghitung panjang dari string tersebut
        $panjang_string = strlen($input_string);

        echo "<div class='hasil'>";
        
        // Menampilkan Input (Label Bold, Teks Tidak Bold)
        echo "<p><strong>Input :</strong><br>" . htmlspecialchars($input_string) . "</p>";
        
        // Menampilkan Output (Label Bold, Teks Tidak Bold)
        echo "<p><strong>Output:</strong><br>";
        
        // Perulangan pertama (Luar): Berjalan menyusuri setiap karakter pada string
        for ($i = 0; $i < $panjang_string; $i++) {
            
            // Mencetak 1 karakter pertama menjadi huruf KAPITAL
            echo strtoupper($input_string[$i]);
            
            // Perulangan kedua (Dalam): Mencetak sisa karakter menjadi huruf KECIL
            // Dimulai dari 1 karena karakter ke-0 (kapital) sudah dicetak di atas
            for ($j = 1; $j < $panjang_string; $j++) {
                echo strtolower($input_string[$i]);
            }
        }
        
        echo "</p>";
        echo "</div>";
    }
    ?>

</body>
</html>