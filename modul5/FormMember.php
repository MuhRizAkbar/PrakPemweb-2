<?php
require 'Model.php';

$id = $_GET['id'] ?? null;
$member = null;

if ($id) {
    $member = getMemberById($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_member'];
    $nomor = $_POST['nomor_member'];
    $alamat = $_POST['alamat'];
    $tgl_mendaftar = $_POST['tgl_mendaftar'];
    $tgl_terakhir_bayar = $_POST['tgl_terakhir_bayar'];

    if ($id) {
        updateMember($id, $nama, $nomor, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar);
    } else {
        insertMember($nama, $nomor, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar);
    }
    header("Location: Member.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Form Member</title></head>
<body>
    <h2><?= $id ? 'Edit' : 'Tambah' ?> Member</h2>
    <form method="POST">
        <label>Nama Member:</label><br>
        <input type="text" name="nama_member" value="<?= $member['nama_member'] ?? '' ?>" required><br>
        
        <label>Nomor Member:</label><br>
        <input type="text" name="nomor_member" value="<?= $member['nomor_member'] ?? '' ?>" required><br>
        
        <label>Alamat:</label><br>
        <textarea name="alamat" required><?= $member['alamat'] ?? '' ?></textarea><br>
        
        <label>Tgl Mendaftar:</label><br>
        <input type="datetime-local" name="tgl_mendaftar" value="<?= isset($member['tgl_mendaftar']) ? date('Y-m-d\TH:i', strtotime($member['tgl_mendaftar'])) : '' ?>" required><br>
        
        <label>Tgl Terakhir Bayar:</label><br>
        <input type="date" name="tgl_terakhir_bayar" value="<?= $member['tgl_terakhir_bayar'] ?? '' ?>" required><br><br>
        
        <button type="submit">Simpan</button>
        <a href="Member.php">Batal</a>
    </form>
</body>
</html>