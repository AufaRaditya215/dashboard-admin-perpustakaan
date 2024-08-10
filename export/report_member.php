<!-- Export to Excel -->
<?php

$koneksi = new mysqli("localhost", "root", "", "db_perpus");
$filename = "Data_Anggota_Perpustakaan-" . date('d-m-Y') . ".xls";

header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/vnd.ms-excel");
?>

<!-- Tabel Laporan Anggota -->
<h2>Laporan Data Anggota</h2>

<table border="1">
    <tr>
        <th>ID Anggota</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>No. Telepon</th>
        <th>email</th>
        <th>Alamat</th>
    </tr>
    <?php
    $sql = $koneksi->query("SELECT * FROM tb_anggota");
    while ($data = $sql->fetch_assoc()) {
    ?>
        <tr>
            <td><?php echo $data['id_anggota']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['jenis_kelamin']; ?></td>
            <td><?php echo $data['telepon']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><?php echo $data['alamat']; ?></td>
        </tr>
    <?php } ?>
</table>