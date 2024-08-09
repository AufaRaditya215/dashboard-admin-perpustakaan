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
        <h3 class="fw-bold">Form Tambah Anggota</h3>
        <hr>
        <form method="post">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="Laki-Laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">No. Telepon</label>
                        <input type="text" class="form-control" name="telepon" inputmode="numeric" maxlength="15" oninput="this.value = this.value.replace(/[^0-9, +]/g, '')" placeholder="Masukkan Nomor Telepon" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="mb-2">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan Email" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label class="mb-2">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" required>
                    </div>
                </div>
                <button class="btn btn-primary mt-2" type="submit" name="simpan" value="Simpan" style="width: 100px;">Submit</button>
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
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
$telepon = isset($_POST['telepon']) ? $_POST['telepon'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
$simpan = isset($_POST['simpan']) ? $_POST['simpan'] : '';

if ($simpan) {
    $sql = $koneksi->query("INSERT INTO tb_anggota (nama, jenis_kelamin, telepon, email, alamat) VALUES ('$nama', '$jenis_kelamin', '$telepon', '$email', '$alamat')");
    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Tersimpan");
            window.location.href = "?page=member";
        </script>
<?php
    }
}

?>