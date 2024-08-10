<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku Perpustakaan</title>
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
        <h3 class="mb-4 fw-bold">Data Buku Perpustakaan</h3>
        <hr style="border: 1px solid;">
        <a href="?page=book&aksi=add" class="btn btn-success mb-4">Add Data</a>
        <table id="data-table" class="table table-striped table-hover" style="width:100%">
            <thead class="text-center align-middle">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Jumlah Buku</th>
                    <th>Tanggal Input</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
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
                        <td>
                            <div class="d-flex flex-column gap-2">
                                <a href="?page=book&aksi=edit&id_buku=<?php echo $data['id_buku']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="?page=book&aksi=delete&id_buku=<?php echo $data['id_buku']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
          </table>
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
        $(document).ready(function () {
            $('#data-table').DataTable();
        });
    </script>   
</body>

</html>
