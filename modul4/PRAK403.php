<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data KRS Mahasiswa</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #cccccc;
        }
        .bg-green {
            background-color: #00b050;
        }
        .bg-red {
            background-color: #ff0000;
        }
    </style>
</head>
<body>

<?php
// 1. Mendefinisikan Data Awal dalam Multi-Dimensional Associative Array
$dataKRS = [
    [
        "No" => 1,
        "Nama" => "Ridho",
        "Mata Kuliah" => [
            ["Nama MK" => "Pemrograman I", "SKS" => 2],
            ["Nama MK" => "Praktikum Pemrograman I", "SKS" => 1],
            ["Nama MK" => "Pengantar Lingkungan Lahan Basah", "SKS" => 2],
            ["Nama MK" => "Arsitektur Komputer", "SKS" => 3]
        ]
    ],
    [
        "No" => 2,
        "Nama" => "Ratna",
        "Mata Kuliah" => [
            ["Nama MK" => "Basis Data I", "SKS" => 2],
            ["Nama MK" => "Praktikum Basis Data I", "SKS" => 1],
            ["Nama MK" => "Kalkulus", "SKS" => 3]
        ]
    ],
    [
        "No" => 3,
        "Nama" => "Tono",
        "Mata Kuliah" => [
            ["Nama MK" => "Rekayasa Perangkat Lunak", "SKS" => 3],
            ["Nama MK" => "Analisis dan Perancangan Sistem", "SKS" => 3],
            ["Nama MK" => "Komputasi Awan", "SKS" => 3],
            ["Nama MK" => "Kecerdasan Bisnis", "SKS" => 3]
        ]
    ]
];

// 2. Baris Kode Logika untuk Menghitung Total SKS dan Menentukan Keterangan
foreach ($dataKRS as &$mhs) {
    $totalSKS = 0;
    
    // Menghitung total SKS dari array Mata Kuliah yang diambil
    foreach ($mhs["Mata Kuliah"] as $mk) {
        $totalSKS += $mk["SKS"];
    }
    
    // Menambahkan kolom/kunci baru ke dalam array
    $mhs["Total SKS"] = $totalSKS;
    
    // Menentukan keterangan berdasarkan logika yang diminta
    if ($totalSKS < 7) {
        $mhs["Keterangan"] = "Revisi KRS";
    } else {
        $mhs["Keterangan"] = "Tidak Revisi";
    }
}
unset($mhs); // Memutuskan referensi elemen untuk keamanan memory
?>

<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Mata Kuliah diambil</th>
        <th>SKS</th>
        <th>Total SKS</th>
        <th>Keterangan</th>
    </tr>
    
    <?php foreach ($dataKRS as $mhs) : ?>
        <?php 
        // Menghitung jumlah mata kuliah untuk menentukan nilai rowspan
        $jumlahMK = count($mhs["Mata Kuliah"]); 
        ?>
        
        <?php for ($i = 0; $i < $jumlahMK; $i++) : ?>
            <tr>
                <?php 
                // Kolom No, Nama, Total SKS, dan Keterangan hanya dicetak di baris pertama tiap mahasiswa
                // dengan rowspan sebesar jumlah mata kuliah yang diambil
                if ($i == 0) : 
                ?>
                    <td rowspan="<?= $jumlahMK ?>"><?= $mhs["No"] ?></td>
                    <td rowspan="<?= $jumlahMK ?>"><?= $mhs["Nama"] ?></td>
                <?php endif; ?>
                
                <td><?= $mhs["Mata Kuliah"][$i]["Nama MK"] ?></td>
                <td><?= $mhs["Mata Kuliah"][$i]["SKS"] ?></td>
                
                <?php if ($i == 0) : ?>
                    <td rowspan="<?= $jumlahMK ?>"><?= $mhs["Total SKS"] ?></td>
                    <?php 
                        // Menentukan warna background untuk kolom Keterangan
                        $kelasWarna = ($mhs["Keterangan"] == "Revisi KRS") ? "bg-red" : "bg-green";
                    ?>
                    <td class="<?= $kelasWarna ?>" rowspan="<?= $jumlahMK ?>">
                        <?= $mhs["Keterangan"] ?>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endfor; ?>
    <?php endforeach; ?>
</table>

</body>
</html>