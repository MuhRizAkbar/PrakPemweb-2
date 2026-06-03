<?php
require 'Model.php';

if (isset($_GET['delete_id'])) {
    deleteBuku($_GET['delete_id']);
    header("Location: Buku.php");
    exit;
}

$buku = getBuku();
?>
<!DOCTYPE html>
<html>
<head><title>Data Buku</title></head>
<body>
    <h2>Data Buku</h2>
    <a href="FormBuku.php">Tambah Buku</a> | <a href="Member.php">Data Member</a> | <a href="Peminjaman.php">Data Peminjaman</a>
    <br><br>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th><th>Judul</th><th>Penulis</th><th>Penerbit</th><th>Tahun Terbit</th><th>Aksi</th>
        </tr>s
        <?php foreach ($buku as $row): ?>
        <tr>
            <td><?= $row['id_buku'] ?></td>
            <td><?= htmlspecialchars($row['judul_buku']) ?></td>
            <td><?= htmlspecialchars($row['penulis']) ?></td>
            <td><?= htmlspecialchars($row['penerbit']) ?></td>
            <td><?= $row['tahun_terbit'] ?></td>
            <td>
                <a href="FormBuku.php?id=<?= $row['id_buku'] ?>">Edit</a> | 
                <a href="Buku.php?delete_id=<?= $row['id_buku'] ?>" onclick="return confirm('Hapus data?');">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>