<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai Mahasiswa</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #d3d3d3; /* Memberikan warna abu-abu pada header */
        }
    </style>
</head>
<body>

<?php
// 1. Deklarasi multi-dimensional associative array berdasarkan data awal
$dataMahasiswa = [
    [
        "Nama" => "Andi",
        "NIM" => "2101001",
        "Nilai UTS" => 87,
        "Nilai UAS" => 65
    ],
    [
        "Nama" => "Budi",
        "NIM" => "2101002",
        "Nilai UTS" => 76,
        "Nilai UAS" => 79
    ],
    [
        "Nama" => "Tono",
        "NIM" => "2101003",
        "Nilai UTS" => 50,
        "Nilai UAS" => 41
    ],
    [
        "Nama" => "Jessica",
        "NIM" => "2101004",
        "Nilai UTS" => 60,
        "Nilai UAS" => 75
    ]
];

// 2. Logika untuk menghitung Nilai Akhir dan menentukan Huruf
foreach ($dataMahasiswa as &$mhs) {
    // Menghitung Nilai Akhir: 40% UTS + 60% UAS
    $nilaiAkhir = ($mhs["Nilai UTS"] * 0.4) + ($mhs["Nilai UAS"] * 0.6);
    $mhs["Nilai Akhir"] = $nilaiAkhir;

    // Menentukan Huruf berdasarkan ketentuan
    if ($nilaiAkhir >= 80) {
        $mhs["Huruf"] = "A";
    } elseif ($nilaiAkhir >= 70 && $nilaiAkhir <= 79.9) {
        $mhs["Huruf"] = "B";
    } elseif ($nilaiAkhir >= 60 && $nilaiAkhir <= 69.9) {
        $mhs["Huruf"] = "C";
    } elseif ($nilaiAkhir >= 50 && $nilaiAkhir <= 59.9) {
        $mhs["Huruf"] = "D";
    } else {
        $mhs["Huruf"] = "E";
    }
}
unset($mhs); // Memutuskan referensi elemen terakhir untuk keamanan
?>

<table>
    <tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Nilai UTS</th>
        <th>Nilai UAS</th>
        <th>Nilai Akhir</th>
        <th>Huruf</th>
    </tr>
    <?php foreach ($dataMahasiswa as $mhs) : ?>
        <tr>
            <td><?= htmlspecialchars($mhs["Nama"]) ?></td>
            <td><?= htmlspecialchars($mhs["NIM"]) ?></td>
            <td><?= htmlspecialchars($mhs["Nilai UTS"]) ?></td>
            <td><?= htmlspecialchars($mhs["Nilai UAS"]) ?></td>
            <td><?= htmlspecialchars($mhs["Nilai Akhir"]) ?></td>
            <td><?= htmlspecialchars($mhs["Huruf"]) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>