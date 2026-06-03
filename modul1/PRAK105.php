<?php
// 1. Deklarasi Associative Array
$daftar_smartphone = array(
    "hp1" => "Samsung Galaxy S22",
    "hp2" => "Samsung Galaxy S22+",
    "hp3" => "Samsung Galaxy A03",
    "hp4" => "Samsung Galaxy Xcover 5"
);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Smartphone Samsung</title>
    <style>
        /* Styling CSS untuk meniru tampilan gambar */
        table {
            border-collapse: separate; 
            border-spacing: 2px;
            border: 1.5px solid black;
        }
        
        th, td {
            border: 1px solid black;
            padding: 4px 8px;
            text-align: left;
            font-family: "Times New Roman", Times, serif; 
        }

        th {
            background-color: red; /* Menambahkan warna latar merah */
            font-size: 1.8em; /* Memperbesar ukuran font agar menyerupai gambar */
            font-weight: bold;
            padding: 20px 10px; /* Menambah ruang (padding) agar kotak merah terlihat tebal */
        }
    </style>
</head>
<body>

    <table>
        <tr>
            <th>Daftar Smartphone Samsung</th>
        </tr>
        
        <?php
        // Menggunakan foreach untuk mengambil nilai (value) dari associative array
        foreach ($daftar_smartphone as $kode => $smartphone) {
            echo "<tr>";
            echo "<td>" . $smartphone . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>