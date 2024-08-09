<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota Perpustakaan</title>
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
        <h3 class="mb-4 fw-bold">Data Anggota Perpustakaan</h3>
        <hr style="border: 1px solid;">
        <a href="?page=member&aksi=add" class="btn btn-success mb-4">Add Data</a>
        <table id="data-table" class="table table-striped table-hover" style="width:100%">
            <thead class="text-center align-middle">
                <tr>
                    <th>ID Anggota</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No. Telepon</th>
                    <th>email</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
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
                        <td>
                            <a href="?page=member&aksi=edit&id_anggota=<?php echo $data['id_anggota']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a onclick="confirm('Apakah anda yakin ingin menghapus data ini?')" href="?page=member&aksi=delete&id_anggota=<?php echo $data['id_anggota']; ?>" class="btn btn-danger btn-sm">Delete</a>
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
