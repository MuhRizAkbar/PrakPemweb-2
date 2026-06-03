<?php
require 'Model.php';

if (isset($_GET['delete_id'])) {
    deletePeminjaman($_GET['delete_id']);
    header("Location: Peminjaman.php");
    exit;
}

$peminjaman = getPeminjaman();
?>
<!DOCTYPE html>
<html>
<head><title>Data Peminjaman</title></head>
<body>
    <h2>Data Peminjaman</h2>
    <a href="FormPeminjaman.php">Tambah Peminjaman</a> | <a href="Member.php">Data Member</a> | <a href="Buku.php">Data Buku</a>
    <br><br>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th><th>Tgl Pinjam</th><th>Tgl Kembali</th><th>Nama Member</th><th>Judul Buku</th><th>Aksi</th>
        </tr>
        <?php foreach ($peminjaman as $row): ?>
        <tr>
            <td><?= $row['id_peminjaman'] ?></td>
            <td><?= $row['tgl_pinjam'] ?></td>
            <td><?= $row['tgl_kembali'] ?></td>
            <td><?= htmlspecialchars($row['nama_member']) ?></td>
            <td><?= htmlspecialchars($row['judul_buku']) ?></td>
            <td>
                <a href="FormPeminjaman.php?id=<?= $row['id_peminjaman'] ?>">Edit</a> | 
                <a href="Peminjaman.php?delete_id=<?= $row['id_peminjaman'] ?>" onclick="return confirm('Hapus data?');">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>