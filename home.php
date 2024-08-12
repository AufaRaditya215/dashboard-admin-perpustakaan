<!-- Koneksi Database -->
<?php
$koneksi = new mysqli("localhost", "root", "", "db_perpus");

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil total anggota
$result = $koneksi->query("SELECT COUNT(*) AS total_members FROM tb_anggota");
if (!$result) {
    die("Query gagal: " . $koneksi->error);
}
$totalMembers = $result->fetch_assoc()['total_members'];

// Ambil total buku
$result = $koneksi->query("SELECT COUNT(*) AS total_books FROM tb_buku");
if (!$result) {
    die("Query gagal: " . $koneksi->error);
}
$totalBooks = $result->fetch_assoc()['total_books'];

// Ambil total transaksi bulan ini
$currentMonth = date('Y-m');
$result = $koneksi->query("SELECT COUNT(*) AS total_transactions FROM tb_transaksi WHERE DATE_FORMAT(tgl_pinjam, '%Y-%m') = '$currentMonth'");
if (!$result) {
    die("Query gagal: " . $koneksi->error);
}
$totalTransactions = $result->fetch_assoc()['total_transactions'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Perpustakaan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Font Awesome CSS (untuk ikon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Dashboard Content -->
    <div class="container-fluid">
        <!-- Current Date -->
        <div class="mb-4">
            <h4 class="mb-3">Tanggal</h4>
            <p class="lead"><?php echo date('d-m-Y'); ?></p>
        </div>
        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-users"></i> Total Members</h5>
                        <p class="card-text"><?php echo $totalMembers; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-book"></i> Total Books</h5>
                        <p class="card-text"><?php echo $totalBooks; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-exchange-alt"></i> Transactions This Month</h5>
                        <p class="card-text"><?php echo $totalTransactions; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Example Table -->
        <div class="mb-4">
            <h4 class="mb-3">Recent Transactions</h4>
            <table id="data-table" class="container table table-striped table-hover" style="width:100%">
            <thead class="text-center align-middle">
                <tr>
                    <th>ID Anggota</th>
                    <th>Nama</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = $koneksi->query("SELECT * FROM tb_transaksi");
                while ($data = $sql->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $data['id_anggota']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['judul']; ?></td>
                        <td class="tgl_pinjam"><?php echo $data['tgl_pinjam']; ?></td>
                        <td class="tgl_kembali"><?php echo $data['tgl_kembali']; ?></td>
                        <td class="status"><?php echo $data['status']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
