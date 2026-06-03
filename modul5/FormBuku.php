<?php
require 'Model.php';

$id = $_GET['id'] ?? null;
$buku = null;

if ($id) {
    $buku = getBukuById($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];

    if ($id) {
        updateBuku($id, $judul, $penulis, $penerbit, $tahun);
    } else {
        insertBuku($judul, $penulis, $penerbit, $tahun);
    }
    header("Location: Buku.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Form Buku</title></head>
<body>
    <h2><?= $id ? 'Edit' : 'Tambah' ?> Buku</h2>
    <form method="POST">
        <label>Judul Buku:</label><br>
        <input type="text" name="judul_buku" value="<?= $buku['judul_buku'] ?? '' ?>" required><br>
        
        <label>Penulis:</label><br>
        <input type="text" name="penulis" value="<?= $buku['penulis'] ?? '' ?>" required><br>
        
        <label>Penerbit:</label><br>
        <input type="text" name="penerbit" value="<?= $buku['penerbit'] ?? '' ?>" required><br>
        
        <label>Tahun Terbit:</label><br>
        <input type="number" name="tahun_terbit" value="<?= $buku['tahun_terbit'] ?? '' ?>" required><br><br>
        
        <button type="submit">Simpan</button>
        <a href="Buku.php">Batal</a>
    </form>
</body>
</html>