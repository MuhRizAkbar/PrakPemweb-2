<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengurutan Nama</title>
    <style>
        body {
            font-family: serif;
        }
        form {
            margin-bottom: 15px;
        }
        input[type="text"] {
            margin-bottom: 5px;
        }
        .output-container {
            border: 1px solid black;
            width: 300px;
        }
        .output-header {
            font-weight: bold;
            font-size: 18px;
            border-bottom: 1px solid black;
            padding: 5px;
        }
        .output-body {
            padding: 10px 5px;
            line-height: 1.5;
        }
    </style>
</head>
<body>

    <form action="" method="POST">
        Nama: 1 <input type="text" name="nama1" required><br>
        Nama: 2 <input type="text" name="nama2" required><br>
        Nama: 3 <input type="text" name="nama3" required><br>
        <input type="submit" name="submit" value="Urutkan">
    </form>

    <?php
    // Memeriksa apakah tombol Urutkan sudah ditekan
    if (isset($_POST['submit'])) {
        // Mengambil nilai dari form input
        $nama1 = $_POST['nama1'];
        $nama2 = $_POST['nama2'];
        $nama3 = $_POST['nama3'];

        // Metode Kondisional untuk mengurutkan string (abjad terkecil ke terbesar)
        // Kita bandingkan dan tukar posisinya jika urutannya salah (metode mirip Bubble Sort manual)
        
        // Bandingkan nama 1 dan nama 2
        if ($nama1 > $nama2) {
            $temp = $nama1;
            $nama1 = $nama2;
            $nama2 = $temp;
        }
        
        // Bandingkan nama 2 dan nama 3
        if ($nama2 > $nama3) {
            $temp = $nama2;
            $nama2 = $nama3;
            $nama3 = $temp;
        }
        
        // Bandingkan kembali nama 1 dan nama 2 (setelah nama 2 mungkin berubah)
        if ($nama1 > $nama2) {
            $temp = $nama1;
            $nama1 = $nama2;
            $nama2 = $temp;
        }

        // Menampilkan Output
        echo "<div class='output-container'>";
        echo "  <div class='output-header'>Output</div>";
        echo "  <div class='output-body'>";
        echo "      $nama1 <br>";
        echo "      $nama2 <br>";
        echo "      $nama3 <br>";
        echo "  </div>";
        echo "</div>";
    }
    ?>

</body>
</html>