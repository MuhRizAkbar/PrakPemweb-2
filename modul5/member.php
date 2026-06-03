<?php
require 'Model.php';

if (isset($_GET['delete_id'])) {
    deleteMember($_GET['delete_id']);
    header("Location: Member.php");
    exit;
}

$members = getMembers();
?>
<!DOCTYPE html>
<html>
<head><title>Data Member</title></head>
<body>
    <h2>Data Member</h2>
    <a href="FormMember.php">Tambah Member</a> | <a href="Buku.php">Data Buku</a> | <a href="Peminjaman.php">Data Peminjaman</a>
    <br><br>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th><th>Nama</th><th>Nomor Member</th><th>Alamat</th><th>Tgl Mendaftar</th><th>Tgl Terakhir Bayar</th><th>Aksi</th>
        </tr>
        <?php foreach ($members as $row): ?>
        <tr>
            <td><?= $row['id_member'] ?></td>
            <td><?= htmlspecialchars($row['nama_member']) ?></td>
            <td><?= htmlspecialchars($row['nomor_member']) ?></td>
            <td><?= htmlspecialchars($row['alamat']) ?></td>
            <td><?= $row['tgl_mendaftar'] ?></td>
            <td><?= $row['tgl_terakhir_bayar'] ?></td>
            <td>
                <a href="FormMember.php?id=<?= $row['id_member'] ?>">Edit</a> | 
                <a href="Member.php?delete_id=<?= $row['id_member'] ?>" onclick="return confirm('Hapus data?');">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>