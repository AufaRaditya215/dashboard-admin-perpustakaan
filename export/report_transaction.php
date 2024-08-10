<!-- Export to Excel -->
<?php

$koneksi = new mysqli("localhost", "root", "", "db_perpus");
$filename = "Data_Transaksi_Perpustakaan-" . date('d-m-Y') . ".xls";

header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/vnd.ms-excel");

function hitungDenda($tglPinjam, $tglKembali) {
    $datePinjam = new DateTime($tglPinjam);
    $dateKembali = new DateTime($tglKembali);
    $interval = $datePinjam->diff($dateKembali);
    $daysDiff = $interval->days;

    if ($daysDiff > 31) {
        $denda = ($daysDiff - 31) * 500;
        return "Denda: Rp." . $denda;
    } else {
        return "Tidak ada denda";
    }
}

?>

<!-- Tabel Laporan Transaksi -->
<h2>Laporan Data Transaksi</h2>

<table border="1">
    <tr>
        <th>ID Anggota</th>
        <th>Nama</th>
        <th>Judul Buku</th>
        <th>Tanggal Peminjaman</th>
        <th>Tanggal Pengembalian</th>
        <th>Denda</th>
        <th>Status</th>
    </tr>

    <?php
    $sql = $koneksi->query("SELECT * FROM tb_transaksi");
    while ($data = $sql->fetch_assoc()) {
        $denda = hitungDenda($data['tgl_pinjam'], $data['tgl_kembali']);
    ?>
        <tr>
            <td><?php echo $data['id_anggota']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['judul']; ?></td>
            <td><?php echo $data['tgl_pinjam']; ?></td>
            <td><?php echo $data['tgl_kembali']; ?></td>
            <td><?php echo $denda; ?></td>
            <td><?php echo $data['status']; ?></td>
        </tr>
    <?php } ?>
</table>
