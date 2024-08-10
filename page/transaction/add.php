<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>

<body>
    <!-- Tambah Anggota Form Start -->
    <main class="container-fluid">
        <h3 class="fw-bold">Form Peminjaman Buku</h3>
        <hr>
        <form method="post">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">ID Anggota <span class="fst-italic">(Optional)</span></label>
                        <input type="text" class="form-control" name="id_anggota" placeholder="Masukkan ID" inputmode="numeric" maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '')" >
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Judul</label>
                        <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Buku" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Tanggal Peminjaman</label>
                        <input type="date" class="form-control" name="tgl_pinjam" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label class="mb-2">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="Dipinjam">Dipinjam</option>
                            <option value="Dikembalikan">Dikembalikan</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary mt-2 me-2" type="submit" name="simpan" value="Simpan" style="width: 100px;">Submit</button>
                <button class="btn btn-danger mt-2" type="button" name="batal" value="Batal" onclick="window.location.href='?page=transaction'" style="width: 100px;">Cancel</button>
            </div>
        </form>
    </main>
</body>

</html>
<!-- Tambah Anggota Form End -->

<!-- Koneksi untuk post form -->
<?php
$koneksi = new mysqli("localhost", "root", "", "db_perpus");
?>

<?php

$idAnggota = isset($_POST['id_transaksi']) ? $_POST['id_transaksi'] :'';
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$judul = isset($_POST['judul']) ? $_POST['judul'] : '';
$tgl_pinjam = isset($_POST['tgl_pinjam']) ? $_POST['tgl_pinjam'] : '';
$status = isset($_POST['status']) ? $_POST['status'] : '';
$simpan = isset($_POST['simpan']) ? $_POST['simpan'] : '';

if ($simpan) {
    $sql = $koneksi->query("INSERT INTO tb_transaksi (nama, judul, tgl_pinjam, tgl_kembali, status) VALUES ('$nama', '$judul', '$tgl_pinjam', '$tgl_kembali', '$status')");
    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Tersimpan");
            window.location.href = "?page=transaction";
        </script>
<?php
    }
}

?>