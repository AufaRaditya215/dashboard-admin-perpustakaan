<!-- Export to Excel -->
<?php

$koneksi = new mysqli("localhost", "root", "", "db_perpus");
$filename = "Data_Buku_Perpustakaan-" . date('d-m-Y') . ".xls";

header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/vnd.ms-excel");


?>

<!-- Tabel Laporan Buku -->
<h2>Laporan Data Buku</h2>

<table border="1">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Tahun Terbit</th>
        <th>Jumlah Buku</th>
        <th>Tanggal Input</th>
    </tr>

    <?php
    $sql = $koneksi->query("SELECT * FROM tb_buku");
    while ($data = $sql->fetch_assoc()) {
    ?>
        <tr>
            <td><?php echo $data['id_buku']; ?></td>
            <td><?php echo $data['judul']; ?></td>
            <td><?php echo $data['pengarang']; ?></td>
            <td><?php echo $data['penerbit']; ?></td>
            <td><?php echo $data['tahun_terbit']; ?></td>
            <td><?php echo $data['jumlah_buku']; ?></td>
            <td><?php echo $data['tgl_input']; ?></td>
        </tr>
    <?php } ?>

</table>