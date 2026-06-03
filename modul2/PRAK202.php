<?php
// Inisialisasi variabel untuk menyimpan nilai input dan pesan error
$nama = $nim = $jk = "";
$error_nama = $error_nim = $error_jk = "";

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi Nama
    if (empty($_POST["nama"])) {
        $error_nama = "nama tidak boleh kosong";
    } else {
        $nama = $_POST["nama"];
    }

    // Validasi NIM
    if (empty($_POST["nim"])) {
        $error_nim = "nim tidak boleh kosong";
    } else {
        $nim = $_POST["nim"];
    }

    // Validasi Jenis Kelamin
    if (empty($_POST["jk"])) {
        $error_jk = "jenis kelamin tidak boleh kosong";
    } else {
        $jk = $_POST["jk"];
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Validasi Input</title>
    <style>
        body {
            font-family: serif;
        }
        .error {
            color: red;
        }
        form {
            line-height: 1.5;
        }
        .output-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <form action="" method="POST">
        Nama: <input type="text" name="nama" value="<?php echo $nama; ?>"> 
        <span class="error">* <?php echo $error_nama; ?></span><br>
        
        Nim: <input type="text" name="nim" value="<?php echo $nim; ?>"> 
        <span class="error">* <?php echo $error_nim; ?></span><br>
        
        Jenis Kelamin :<span class="error">* <?php echo $error_jk; ?></span><br>
        <input type="radio" name="jk" value="Laki-Laki" <?php if (isset($jk) && $jk == "Laki-Laki") echo "checked"; ?>> Laki-Laki<br>
        <input type="radio" name="jk" value="Perempuan" <?php if (isset($jk) && $jk == "Perempuan") echo "checked"; ?>> Perempuan<br>
        
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    // Menampilkan Output jika form disubmit dan tidak ada field yang kosong
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($nama) && !empty($nim) && !empty($jk)) {
        echo "<div class='output-container'>";
        echo "  <h2>Output:</h2>";
        echo "  $nama <br>";
        echo "  $nim <br>";
        echo "  $jk <br>";
        echo "</div>";
    }
    ?>

</body>
</html>