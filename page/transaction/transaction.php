<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi Perpustakaan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <!-- Koneksi Database -->
    <?php
    $koneksi = new mysqli("localhost", "root", "", "db_perpus");
    ?>

    <!-- Table Start -->
    <div class="container-fluid">
        <h3 class="mb-4 fw-bold">Data Transaksi Perpustakaan</h3>
        <hr style="border: 1px solid;">
        <a href="?page=transaction&aksi=add" class="btn btn-success mb-4">Add Data</a>
        <table id="data-table" class="container table table-striped table-hover" style="width:100%">
            <thead class="text-center align-middle">
                <tr>
                    <th>ID Anggota</th>
                    <th>Nama</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Denda</th>
                    <th>Status</th>
                    <th>Aksi</th>
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
                        <td class="denda"></td>
                        <td class="status"><?php echo $data['status']; ?></td>
                        <td>
                            <div class="d-flex flex-column gap-2">
                                <a href="?page=transaction&aksi=edit&id_transaksi=<?php echo $data['id_transaksi']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="?page=transaction&aksi=delete&id_transaksi=<?php echo $data['id_transaksi']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <p class="fst-italic mt-3">Note : Denda akan dikenakan jika buku yang dipinjam terlambat dikembalikan melebihi dari 30 hari.</p>
    </div>
    <!-- Table End -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <!-- Inisialisasi DataTables -->
    <script>
        $(document).ready(function() {
            $('#data-table').DataTable();
            
            // Membuat fungsi untuk menghitung denda
            $('tbody tr').each(function() {
                // Ambil tanggal pinjam dan kembali
                let tglPinjam = $(this).find('.tgl_pinjam').text().trim();
                let tglKembali = $(this).find('.tgl_kembali').text().trim();
                let dendaElement = $(this).find('.denda');
                let statusElement = $(this).find('.status');
                
                // Convert dates to JavaScript Date objects
                let datePinjam = new Date(tglPinjam);
                let dateKembali = new Date(tglKembali);
                
                // Menghitung selisih hari
                let timeDiff = dateKembali - datePinjam;
                let daysDiff = timeDiff / (1000 * 3600 * 24);
                
                // Menghitung Denda jika lebih dari 7 hari
                if (daysDiff > 31) {
                    let denda = (daysDiff - 31) * 500; 
                    dendaElement.html(`<p>Denda: Rp.${denda}</p>`);
                    dendaElement.css("color", "red");
                    statusElement.css("color", "red");
                } else {
                    dendaElement.html("<p>Tidak ada denda</p>");
                    statusElement.css("color", "black");
                }
            });
        });
    </script>
</body>

</html>
