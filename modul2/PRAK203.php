<?php
// Inisialisasi variabel
$nilai = $dari = $ke = $hasil_konversi = "";

if (isset($_POST["submit"])) {
    // Menangkap data dari form
    $nilai = $_POST["nilai"];
    $dari = $_POST["dari"] ?? "";
    $ke = $_POST["ke"] ?? "";

    if ($nilai != "" && $dari != "" && $ke != "") {
        // Pivot/Jadikan suhu ke satuan Celcius terlebih dahulu agar lebih mudah
        $suhu_celcius = 0;
        
        switch ($dari) {
            case "Celcius":
                $suhu_celcius = $nilai;
                break;
            case "Fahrenheit":
                $suhu_celcius = ($nilai - 32) * 5 / 9;
                break;
            case "Rheamur":
                $suhu_celcius = $nilai * 5 / 4;
                break;
            case "Kelvin":
                $suhu_celcius = $nilai - 273.15;
                break;
        }

        // Konversi dari Celcius ke satuan tujuan (Ke)
        $hasil_kalkulasi = 0;
        $simbol = "";
        
        switch ($ke) {
            case "Celcius":
                $hasil_kalkulasi = $suhu_celcius;
                $simbol = "&deg;C";
                break;
            case "Fahrenheit":
                $hasil_kalkulasi = ($suhu_celcius * 9 / 5) + 32;
                $simbol = "&deg;F";
                break;
            case "Rheamur":
                $hasil_kalkulasi = $suhu_celcius * 4 / 5;
                $simbol = "&deg;R";
                break;
            case "Kelvin":
                $hasil_kalkulasi = $suhu_celcius + 273.15;
                $simbol = "&deg;K";
                break;
        }
        
        // Format hasil konversi dengan 1 angka di belakang koma
        $hasil_konversi = number_format($hasil_kalkulasi, 1, '.', '') . " " . $simbol;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konversi Suhu</title>
    <style>
        body {
            font-family: serif;
        }
        .hasil {
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <p>Output yang diinginkan:</p>

    <form action="" method="POST">
        Nilai : <input type="number" step="any" name="nilai" value="<?php echo $nilai; ?>" required><br>
        
        Dari :<br>
        <input type="radio" name="dari" value="Celcius" <?php if ($dari == "Celcius") echo "checked"; ?>> Celcius<br>
        <input type="radio" name="dari" value="Fahrenheit" <?php if ($dari == "Fahrenheit") echo "checked"; ?>> Fahrenheit<br>
        <input type="radio" name="dari" value="Rheamur" <?php if ($dari == "Rheamur") echo "checked"; ?>> Rheamur<br>
        <input type="radio" name="dari" value="Kelvin" <?php if ($dari == "Kelvin") echo "checked"; ?>> Kelvin<br>
        
        Ke :<br>
        <input type="radio" name="ke" value="Celcius" <?php if ($ke == "Celcius") echo "checked"; ?>> Celcius<br>
        <input type="radio" name="ke" value="Fahrenheit" <?php if ($ke == "Fahrenheit") echo "checked"; ?>> Fahrenheit<br>
        <input type="radio" name="ke" value="Rheamur" <?php if ($ke == "Rheamur") echo "checked"; ?>> Rheamur<br>
        <input type="radio" name="ke" value="Kelvin" <?php if ($ke == "Kelvin") echo "checked"; ?>> Kelvin<br>
        
        <input type="submit" name="submit" value="Konversi">
    </form>

    <?php
    // Menampilkan Output jika konversi berhasil
    if ($hasil_konversi != "") {
        echo "<div class='hasil'>";
        echo "Hasil Konversi: " . $hasil_konversi;
        echo "</div>";
    }
    ?>

</body>
</html>