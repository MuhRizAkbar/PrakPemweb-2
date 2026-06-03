<?php
require 'Model.php';

$id = $_GET['id'] ?? null;
$peminjaman = null;

if ($id) {
    $peminjaman = getPeminjamanById($id);
}

$members = getMembers();
$bukus = getBuku();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $id_member = $_POST['id_member'];
    $id_buku = $_POST['id_buku'];

    if ($id) {
        updatePeminjaman($id, $tgl_pinjam, $tgl_kembali, $id_member, $id_buku);
    } else {
        insertPeminjaman($tgl_pinjam, $tgl_kembali, $id_member, $id_buku);
    }
    header("Location: Peminjaman.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Form Peminjaman</title></head>
<body>
    <h2><?= $id ? 'Edit' : 'Tambah' ?> Peminjaman</h2>
    <form method="POST">
        <label>Tanggal Pinjam:</label><br>
        <input type="date" name="tgl_pinjam" value="<?= $peminjaman['tgl_pinjam'] ?? '' ?>" required><br>
        
        <label>Tanggal Kembali:</label><br>
        <input type="date" name="tgl_kembali" value="<?= $peminjaman['tgl_kembali'] ?? '' ?>" required><br>
        
        <label>Member:</label><br>
        <select name="id_member" required>
            <option value="">-- Pilih Member --</option>
            <?php foreach ($members as $m): ?>
                <option value="<?= $m['id_member'] ?>" <?= ($peminjaman['id_member'] ?? '') == $m['id_member'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($m['nama_member']) ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label>Buku:</label><br>
        <select name="id_buku" required>
            <option value="">-- Pilih Buku --</option>
            <?php foreach ($bukus as $b): ?>
                <option value="<?= $b['id_buku'] ?>" <?= ($peminjaman['id_buku'] ?? '') == $b['id_buku'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($b['judul_buku']) ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>
        
        <button type="submit">Simpan</button>
        <a href="Peminjaman.php">Batal</a>
    </form>
</body>
</html>