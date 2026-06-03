<?php
// 1. Deklarasi Indexed Array
$daftar_smartphone = array(
    "Samsung Galaxy S22",
    "Samsung Galaxy S22+",
    "Samsung Galaxy A03",
    "Samsung Galaxy Xcover 5"
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
            /* Menggunakan 'separate' untuk menghasilkan efek border ganda/kotak di dalam kotak */
            border-collapse: separate; 
            border-spacing: 2px;
            border: 1.5px solid black;
        }
        
        th, td {
            border: 1px solid black;
            padding: 4px 8px;
            text-align: left;
            /* Gambar menggunakan font jenis serif (seperti Times New Roman) */
            font-family: "Times New Roman", Times, serif; 
        }

        th {
            font-size: 1.1em;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <table>
        <tr>
            <th>Daftar Smartphone Samsung</th>
        </tr>
        
        <?php
        // Menggunakan foreach untuk mengulang setiap elemen di dalam array
        foreach ($daftar_smartphone as $smartphone) {
            echo "<tr>";
            echo "<td>" . $smartphone . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>